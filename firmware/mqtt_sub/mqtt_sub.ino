#include <WiFi.h>
#include <PubSubClient.h>

const char* ssid = "acts";
const char* password = "";

const char* mqtt_server = "192.168.77.164";
const int mqtt_port = 1883;

const char* topic = "esp32/output";

const int ledPin = 2; // Replace with your actual LED pin

WiFiClient espClient;
PubSubClient client(espClient);

void setup() {
  Serial.begin(115200);
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
  client.setServer(mqtt_server, mqtt_port);
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
  if (!client.connected()) {
    reconnectMQTT();
  }
  client.loop();
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
