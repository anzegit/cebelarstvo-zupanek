<?php
//SYSTEM SETTINGS
$base_url = 'http://' . $_SERVER['SERVER_NAME'];
//$base_url = 'http://' . $_SERVER['zupanek.7palckov.si'];
$signin_url = substr($base_url . $_SERVER['PHP_SELF'], 0, -(6 + strlen(basename($_SERVER['PHP_SELF']))));

//DO NOT CHANGE
$ip_address = $_SERVER['REMOTE_ADDR'];
