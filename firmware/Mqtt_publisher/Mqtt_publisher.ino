#include <WiFi.h>
#include <PubSubClient.h>  
#include <esp_wifi.h>  
#include <ArduinoJson.h>
#include "DHT.h"
#include <esp_now.h>

// Set the custom MAC address in case your ESP32 is not regsitered with the acts network - wifi spoofing
//uint8_t newMACAddress[] = {0xc8, 0xb2, 0x9b, 0x70, 0x8a, 0xeb};  // a8:6d:aa:0e:61:f9

#define DHTPIN 4

#define DHTTYPE DHT22

#define LED 2

DHT dht(DHTPIN,DHTTYPE);

DynamicJsonDocument sensor_data_payload(10724);

char sensor_data_format_for_mqtt_publish[1024];

const char* ssid =   "acts";                          //ssid - service set Identifier (Replace it with your ssid name)

const char* password =  "";                     // replace with ssid paasword

const char* mqttBroker = "192.168.77.164";                  // broker address - replace it with your broker address/cloud broker - test.mosquitto.org

const int   mqttPort = 1883;                            // broker port number

const char* clientID = "iotnode-01";                   // client-id --> replace it in case willing to connect with same broker
 
const char* mqtt_topic_for_publish = "cdac/room/1/data/"; // topic names

const char* topic = "esp32/output";

const int ledPin = 2; // Replace with your actual LED pin

uint8_t broadcastAddress[] = {0xCC,0x50,0xE3,0xB0,0x7E,0xF8}; // Receivers MAC address, where the data should be sent for further calculations and triggering the actuators.

WiFiClient MQTTclient;

WiFiClient espClient;

PubSubClient client(MQTTclient);


//float sensor_analog;

const int sensor_pin = 34;

long lastReconnectAttempt = 0;
boolean reconnect()
{
  //boolean connect (clientID, [username, password], [willTopic, willQoS, willRetain, willMessage], [cleanSession])
  if (client.connect(clientID)) {

    Serial.println("Attempting to connect broker");
    
  }
  return client.connected();
}



void setup() {
  Serial.begin(115200);
  Serial.println("Attempting to connect...");
  dht.begin();
  WiFi.mode(WIFI_STA);
//  pinMode(LED,OUTPUT);      
//  esp_wifi_set_mac(WIFI_IF_STA, &newMACAddress[0]); // for wifi spoofing
  WiFi.begin(ssid, password); // Connect to WiFi.
  if (WiFi.waitForConnectResult() != WL_CONNECTED)
  {
    Serial.println("Couldn't connect to WiFi.");
  }
  Serial.print("ESP32 IP ADDRESS : ");
  Serial.println(WiFi.localIP());
  //Add details for MQTT Broker
  client.setServer(mqttBroker, mqttPort); // Connect to broker
  lastReconnectAttempt = 0;
  
//    SUBSCRIBER CODE STARTS HERE....


  delay(1000);

  // Connect to WiFi
  WiFi.begin(ssid, password);
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }
  Serial.println("");
  Serial.print("Connected to WiFi with IP: ");
  Serial.println(WiFi.localIP());

  // Connect to MQTT broker
  client.setServer(mqttBroker, mqttPort);
  client.setCallback(callback);
  if (!client.connect("ESP32Client")) {
    Serial.print("MQTT connection failed, rc=");
    Serial.print(client.state());
    Serial.println(" retrying in 5 seconds");
    delay(5000);
  }

  // Subscribe to the topic
  client.subscribe(topic);

  // Configure LED pin as output
  pinMode(ledPin, OUTPUT);


}
void loop() {
  if (!client.connected())
  {
    long now = millis();  // Returns the number of milliseconds passed since the Arduino board began running the current program
    if (now - lastReconnectAttempt > 5000) { // Try to reconnect.
      lastReconnectAttempt = now;
      if (reconnect())
      { 
        lastReconnectAttempt = 0;
      }
    }
  }
  else 
  { 
//    int sensor_value.id = 1;
  
    Serial.println("Connected to Broker --- !!");
    client.loop();
    float sensor_analog = analogRead(sensor_pin);
//    float h = dht.readHumidity();
    float temp = dht.readTemperature();
    float humidity = dht.readHumidity();
    float moisture = (100 -((sensor_analog/4095.00)*100));

    sensor_data_payload["temperature"] = temp;
    sensor_data_payload["humidity"]   = humidity;
    sensor_data_payload["moisture"] = moisture;
    if (isnan(humidity) || isnan(temp)) {
    Serial.println(F("Failed to read from DHT sensor!"));
    return;
    
  }

    
    serializeJson(sensor_data_payload, sensor_data_format_for_mqtt_publish);
    
    delay(2000);
    Serial.println(temp);
    Serial.println(humidity);   
    Serial.println(moisture);
    client.publish(mqtt_topic_for_publish,sensor_data_format_for_mqtt_publish);  //(topicname, payload)
    Serial.println("sensor data sent to broker");
    delay(5000);
  }
}


void callback(char* topic, byte* payload, unsigned int length) {
  Serial.print("Message arrived on topic: ");
  Serial.println(topic);
  Serial.print("Message payload: ");
  for (int i = 0; i < length; i++) {
    Serial.print((char)payload[i]);
    
    if(*payload == 49){
      digitalWrite(ledPin,HIGH);
    }
    else if(*payload == 48){
      digitalWrite(ledPin,LOW);
    }
    else{
      Serial.println("Invalid Message");
    }
  }
  Serial.println();
  Serial.println(*payload);
  Serial.println(length);

}
void reconnectMQTT() {
  // Attempt to reconnect to the MQTT broker
  while (!client.connect("ESP32Client")) {
    Serial.print("MQTT connection failed, rc=");
    Serial.print(client.state());
    Serial.println(" retrying in 5 seconds");
    delay(5000);
  }
}
