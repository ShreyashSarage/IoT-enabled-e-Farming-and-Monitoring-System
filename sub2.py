import paho.mqtt.client as mqtt
import uuid
import time
import json 
import broker_config
import mysql.connector
import time    

def on_connect(client,userdata,flags,rc,properties):
    try:
        print("Connected with result code"+str(rc))
        #Subscribing in on_connect means that if we lose the connection and 
        #reconnect then subscriptions wil be renewed.
        #subscribe(topic,qos=0)
        client.subscribe(broker_config.publisher_topic_name_2)
        # client.subscribe("cdac/room/data/bed2")
        # client.subscribe("cdac/docker/t2")
    except Exception as e:
        print("Exception in Subscriber block",e)

#The callback for when a PUBLISH message is received from the server. 
def on_message(client,userdata,msg):
    try:
        print(msg.topic+" "+str(msg.payload))
        print("data received",msg.payload.decode())
        data_cleaning = msg.payload.decode()
        print(type(data_cleaning))
        data_in_json_format = json.loads(data_cleaning)
        print(data_in_json_format)
        print(type(data_in_json_format))

        moisture_data2 = data_in_json_format['moisture2']
        print(moisture_data2)
        epoch_time = int(time.time())
        print(epoch_time)

        conn = mysql.connector.connect(
            user='project',password='diot',host='localhost',database='esp32')

        cursor = conn.cursor()
        val = (moisture_data2,epoch_time)


        
        # cursor.execute("INSERT INTO sensor_value(temperature,humidity,moisture_bed_1,epoch_time) VALUES(%s,%s,%s,%s);",val)
        cursor.execute("INSERT INTO sensor_value_2 (moisture_bed_2,epoch_time) VALUES(%s,%s);",val)
        conn.commit()


    except Exception as e:
        print("Exception on messsage block",e)




def main_handler():

    try:
        mqtt_client_id=uuid.uuid4().hex
        print(mqtt_client_id)
        """
        Client(client_id="",clean_session=True,userdata=None, protocol=MQTTv3.1.1,transport=tc[])
        """
        mqttc = mqtt.Client(mqtt.CallbackAPIVersion.VERSION2)
        #client = mqtt.Client(mqtt.CallbackAPIVersion.VERSION2)
        mqttc.on_connect = on_connect
        mqttc.on_message = on_message
        #set username and password based authentication with broker 
        #client.username_pw_set(username="",password="diot")
        #client.on_connect=on_connect
        #client.on_message=on_message
        mqttc.connect(broker_config.broker_address, broker_config.mqtt_port, broker_config.keep_alive)

    #blocking call that processes network traffic, dipatches callbacks and 
    #handles reconnecting.
    #other loop*() functions are available that give threaded interface and manual interface
        mqttc.loop_forever()
    except Exception as e:
        print("Exception in main",e)

#call main_function
main_handler()
