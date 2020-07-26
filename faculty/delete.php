<?php

require_once('../config/database.php');


$query = "
DELETE FROM meeting WHERE meeting_id= :id";

$statement = $connect->prepare($query);

$statement->execute(
  array(
    ':id' => $_POST['id']
  )
  );



?>