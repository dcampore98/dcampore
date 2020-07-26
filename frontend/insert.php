<?php

require_once('config/database.php');


  $query = "
    INSERT INTO meeting(meeting_title, start_date, end_date) VALUES(:title, :start_event, :end_event)";

    $statement = $connect->prepare($query);
    $statement->execute(
      array(


        ':title' => $_POST['title'], 
        ':start_event' => $_POST['start'], 
        ':end_event' => $_POST['end']

      )
      );

      




?>