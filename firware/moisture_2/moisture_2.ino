#include <WiFi.h>
#include <PubSubClient.h>  
#include <esp_wifi.h>  
#include <ArduinoJson.h>
#include "DHT.h"
#include <esp_now.h>

// Set the custom MAC address in case your ESP32 is not regsitered with the acts network - wifi spoofing
//uint8_t newMACAddress[] = {0xc8, 0xb2, 0x9b, 0x70, 0x8a, 0xeb};  // a8:6d:aa:0e:61:f9



#define LED 2

//DHT dht(DHTPIN,DHTTYPE);

DynamicJsonDocument sensor_data_payload(10724);

char sensor_data_format_for_mqtt_publish[1024];

const char* ssid =   "acts";                          //ssid - service set Identifier (Replace it with your ssid name)

const char* password =  "";                     // replace with ssid paasword

const char* mqttBroker = "192.168.77.164";                  // broker address - replace it with your broker address/cloud broker - test.mosquitto.org

const int   mqttPort = 1883;                            // broker port number

const char* clientID = "iotnode-01";                   // client-id --> replace it in case willing to connect with same broker
 
const char* mqtt_topic_for_publish = "cdac/room/data/bed2"; // topic names

uint8_t broadcastAddress[] = {0xCC,0x50,0xE3,0xAB,0xB5,0x74}; // Receivers MAC address, where the data should be sent for further calculations and triggering the actuators.

WiFiClient MQTTclient;

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
  WiFi.mode(WIFI_STA);
  pinMode(LED,OUTPUT);      
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

  if(esp_now_init() != ESP_OK){
    Serial.println("Error initializing ESP-NOW");
  }
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
//    sensor_value.id = 1;
  
    Serial.println("Connected to Broker --- !!");
    client.loop();
    float sensor_analog = analogRead(sensor_pin);
    float moisture2 = (100 -((sensor_analog/4095.00)*100));

    sensor_data_payload["moisture2"] = moisture2;
    
//    if (isnan(sensor_value.humidity) || isnan(sensor_value.temp)) {
//    Serial.println(F("Failed to read from DHT sensor!"));
//    return;
//    
//  }

//    esp_err_t result = esp_now_send(broadcastAddress, (uint8_t *) &sensor_value, sizeof(sensor_value));

//    if(result == ESP_OK){
//      Serial.println("Sent with success");
//    }
//    else{
//      Serial.println("Error sending the data");
//    }
    
    serializeJson(sensor_data_payload, sensor_data_format_for_mqtt_publish);
    
    delay(2000);
//    Serial.println(sensor_value.temp);
//    Serial.println(sensor_value.humidity);   
    Serial.println(moisture2);
    client.publish(mqtt_topic_for_publish,sensor_data_format_for_mqtt_publish);  //(topicname, payload)
    Serial.println("sensor data sent to broker");
    delay(5000);
  }
}
