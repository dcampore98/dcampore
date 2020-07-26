<?php
require_once('config/database.php');

if(isset($_POST['query']))
{
  if($_POST['query'] == 'getMeetings')
  {
    
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

    $response = array(
      'result' => $data, 
      'message' => 'Test'
    );

    echo json_encode($response);
  }

  if($_POST['query'] == 'getAllUsers'){


    $data = array();

    $query = "SELECT * FROM student ORDER BY student_id";

    $statement= $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();

    foreach($result as $row)
    {
      $data[] = array(
        'id'  => $row['student_id'],
        'username'  => $row['username'], 
        'first_name'  => $row['fname'],
        'last_name'  => $row['lname']
      );
    }

    $response = array(
      'result' => $data, 
      'message' => 'Test'
    );

    echo json_encode($response);
    
  }

  if($_POST['query'] == 'confirm_participants'){
    $members = $_POST['members'];

    // add each member to the database 
    
    foreach($members as $member)
    {
     
      
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
    }
  }

}

?>