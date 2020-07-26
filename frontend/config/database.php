<?php
$hostname = "localhost";
$username = "root";
$project  = "daniel";
$password = "";


// $db = mysqli_connect($hostname,$username, $password ,$project);










try {
  $connect = new PDO("mysql:host=$hostname;dbname=$project", $username, $password);
  // set the PDO error mode to exception
  $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>