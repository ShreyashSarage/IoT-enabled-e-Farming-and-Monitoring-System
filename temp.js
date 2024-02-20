var utcSeconds = 1708098057;
var d = new Date(0); // The 0 there is the key, which sets the date to the epoch
d.setUTCSeconds(utcSeconds);

var myarray = d.split(':');
console.log(myarray);