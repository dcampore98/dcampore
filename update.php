<?php
require_once('config/database.php');

// var_dump($_POST); 
// return;

  $query ="
  UPDATE meeting
  SET  meeting_title=:title, 
  start_date=:start_event, end_date=:end_event WHERE meeting_id=:id
  ";

  $statement = $connect->prepare($query); 
  $statement->execute(

    array(
      ':title' => $_POST['title'], 
      ':start_event'=> $_POST['start'], 
      ':end_event' => $_POST['end'], 
      ':id' =>$_POST['id']
    )
  );




?>