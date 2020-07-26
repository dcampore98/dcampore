<?php
require_once('../config/database.php');


$data = array();

$query = "SELECT * FROM meeting ORDER BY meeting_id";

$statement= $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();


 foreach($result as $row)
 {
  $data[] = array(
    'id'  => $row['meeting_id'],
    'title'  => $row['meeting_title'], 
    'start'  => $row['start_date'],
    'end'  => $row['end_date']
  );
 }

 echo json_encode($data);

?>