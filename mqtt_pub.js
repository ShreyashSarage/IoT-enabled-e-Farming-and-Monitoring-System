const mqtt = require('mqtt')
const mysql = require('mysql')
const topic = "esp32/output"
const message = "Hello"
const mqtt_port = 1883
const publisher_topic_name_1 = "esp32/output"
const publisher_topic_name_2 = "esp32/output" 
const keep_alive=60
const mqtt_subscriber_topic = "esp32/output"
const sample_unit = 40
const client = mqtt.connect("mqtt://localhost")


const con  = mysql.createConnection({host: "localhost",user: "project",password: "diot",database: "esp32"})

client.on('connect',()=>{
	con.connect(function(err) {
	console.log("Connected to Broker!")

	setInterval(function(){

		var result = ""
		var status_values = ""
		let status_values_str = ""
		  if (err) throw err;
		  con.query("SELECT * FROM trigger_sensor", function (err, result, fields) {
		    if (err) throw err;
		    console.log(JSON.stringify(result[0].status));
		     status_values = JSON.stringify(result[0].status)

		     if(status_values == '1' || status_values=='0'){
		     	client.publish(topic,`${status_values}`)
		     }
		     con.query("update trigger_sensor set status=2 where sensor like 'sensor1';")
		     
		  });		

		},1000)
		});

})








