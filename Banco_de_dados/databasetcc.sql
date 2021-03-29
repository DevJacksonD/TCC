create database datatcc;
use datatcc;

CREATE TABLE SensorData (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    accx VARCHAR(10),
    accy VARCHAR(10),
    accz VARCHAR(10),
	minaccx VARCHAR(10),
    minaccy VARCHAR(10),
    minaccz VARCHAR(10),
	maxaccx VARCHAR(10),
    maxaccy VARCHAR(10),
    maxaccz VARCHAR(10),
	rmsx VARCHAR(10),
    rmsy VARCHAR(10),
    rmsz VARCHAR(10),
    reading_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
