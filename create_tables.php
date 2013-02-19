<?php
require_once "conf.php";

//user
$q = $db->prepare("CREATE TABLE UserTable (
  id int(11) NOT NULL AUTO_INCREMENT,
  created timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  modified timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  name varchar(255) NOT NULL,
  password varchar(255) NOT NULL,
  admin tinyint(4) NOT NULL,
  PRIMARY KEY (id)
)");
$q->execute();

//memo
$q = $db->prepare("CREATE TABLE Memo (
  id int(11) NOT NULL AUTO_INCREMENT,
  created timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  modified timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  parentid int(11) DEFAULT NULL,
  ownerid int(11) NOT NULL,
  name varchar(255) DEFAULT NULL,
  content text,
  PRIMARY KEY (id)
)");
$q->execute();

//category
$q = $db->prepare("CREATE TABLE Category (
  id int(11) NOT NULL AUTO_INCREMENT,
  created timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  modified timestamp NULL DEFAULT '0000-00-00 00:00:00',
  parentid int(11) DEFAULT NULL,
  ownerid int(11) NOT NULL,
  name varchar(255) DEFAULT NULL,
  PRIMARY KEY (id)
)");
$q->execute();