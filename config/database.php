<?php
$hostname = "db.sice.indiana.edu";
$username = "i491u20_dcampore";
$project  = "i491u20_dcampore";
$password = "my+sql=i491u20_dcampore";


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