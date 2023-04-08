<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "authentication";

$conn = mysqli_connect($servername,$username,$password,$database);

if(!$conn){
    die("Unable to connect");
}
