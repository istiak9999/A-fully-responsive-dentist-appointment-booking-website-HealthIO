<?php

$servername="127.0.0.1:3307";
$username="root";
$password="";
$db="database2";
$conn = mysqli_connect($servername,$username,$password,$db) or die('connection failed');
$insert = mysqli_query($conn, "INSERT INTO `contact_form`(name, email, number, date) VALUES('Akash','ahmed@gamail.com','192918918','5/2/2022')") or die('query failed');

?>