<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'skills_bit';

$link = mysqli_connect($host, $user, $pass,$dbname);
if(!$link){
  die('Could not connect: '.mysqli_connect_error());
}
