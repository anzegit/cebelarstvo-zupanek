<?php
//DATABASE CONNECTION VARIABLES
//Lokalno
$host = "localhost"; // Host name
$username = "root"; // Mysql username
$password = ""; // Mysql password
$db_name = "zupanek"; // Database name

//Streznik
/*$host = "localhost"; // Host name
$username = "miskesi"; // Mysql username
$password = "2kClZtzzp2"; // Mysql password
$db_name = "miskesi_zupanek"; // Database name*/

//DO NOT CHANGE BELOW THIS LINE UNLESS YOU CHANGE THE NAMES OF THE MEMBERS AND LOGINATTEMPTS TABLES

$tbl_prefix = ""; //***PLANNED FEATURE, LEAVE VALUE BLANK FOR NOW*** Prefix for all database tables
$tbl_members = $tbl_prefix . "members";
$tbl_attempts = $tbl_prefix . "loginAttempts";
