<?php
require_once('../config/database.php');

if(isset($_POST['query']))
{
  if($_POST['query'] == 'getMeetings')
  {
    
    $data = array();

    $query = "SELECT * FROM meeting WHERE end_date > CURRENT_TIMESTAMP() ORDER BY meeting_id";

    $statement= $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();

    foreach($result as $row)
    {


      $start = $row['start_date']; 
      


      $end = $row['end_date'];
      


      $data[] = array(
        'id'  => $row['meeting_id'],
        'title'  => $row['meeting_title'], 
        'start'  => $start ,
        'end'  => $end
      );
    }

    $response = array(
      'result' => $data, 
      'message' => 'Test'
    );

    echo json_encode($response);
  }




  if($_POST['query'] == 'get_meeting_details'){

    $meeting_id = $_POST['meeting_id'];
    $data = array();

    $query = "SELECT meeting.meeting_id, meeting.meeting_title, meeting.start_date, meeting.end_date, meeting.description FROM meeting WHERE meeting.meeting_id=$meeting_id";

    $statement= $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();

    foreach($result as $row)
    {


      $start = $row['start_date']; 
      $end = $row['end_date'];

      $data[] = array(
        'id'  => $row['meeting_id'],
        'title'  => $row['meeting_title'], 
        'start'  => $start ,
        'end'  => $end, 
        'description' => $row['description']
      );
    }

    $response = array(
      'result' => $data, 
      'message' => 'Test'
    );

    echo json_encode($response);

  
  }



  if($_POST['query'] == 'create_meeting'){



    

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

  if($_POST['query'] == 'get_meeting_participants'){

    $meeting_id = $_POST['meeting_id'];
    $data = array();

    $query = "SELECT meeting_participants.meeting_id, meeting_participants.team_id, team.team_id, team.team_name, team_members.team_id, team_members.student_id, student.username, meeting_attendance.meeting_id, meeting_attendance.meeting_id, meeting_attendance.status FROM meeting_participants LEFT JOIN team ON team.team_id = meeting_participants.team_id LEFT JOIN team_members ON team_members.team_id = team.team_id LEFT JOIN student ON student.student_id=team_members.student_id LEFT JOIN meeting_attendance ON meeting_attendance.student_id= student.student_id WHERE meeting_participants.meeting_id=$meeting_id

    ";

    $statement= $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();

    foreach($result as $row)
    {


      

      $data[] = array(
        'meeting_id'  => $row['meeting_id'],
        'team_id'  => $row['team_id'], 
        'team_name'  => $row['team_name'], 
        'student_id'  => $row['student_id'],
        'username' => $row['username'], 
        'status' => $row['status']
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


  if($_POST['query'] == 'grade_student'){

    $result = $_POST['result']; 
    
    $student_id = $_POST['student_id'];
    $meeting_id = $_POST['meeting_id'];

    
    


    $query = "
    INSERT INTO meeting_attendance(meeting_id, student_id, status) VALUES(:meeting_id, :student_id, :result)";

    $statement = $connect->prepare($query);
    $statement->execute(
      array(


        ':meeting_id' => $_POST['meeting_id'], 
        ':student_id' => $_POST['student_id'], 
        ':result' => $_POST['result']

      )
      );

    

  }
 




  if($_POST['query'] == 'load_meeting_history')
  {



    $data = array();

    $query = "SELECT meeting.meeting_id, meeting.meeting_title, meeting.start_date, meeting.end_date, meeting_participants.meeting_id, meeting_participants.team_id, team.team_id, team_members.team_id, team_members.student_id, meeting_attendance.meeting_id, meeting_attendance.student_id, meeting_attendance.status, student.student_id, student.username FROM meeting LEFT JOIN meeting_participants ON meeting_participants.meeting_id = meeting.meeting_id LEFT JOIN team_members ON meeting_participants.team_id =team_members.team_id LEFT JOIN meeting_attendance ON meeting_attendance.meeting_id = meeting.meeting_id LEFT JOIN student ON student.student_id =meeting_attendance.student_id LEFT JOIN team ON team_members.team_id= team.team_id WHERE end_date < CURRENT_TIMESTAMP()";

    $statement= $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();

    foreach($result as $row)
    {
      $data[] = array(
        'id'  => $row['meeting_id'],
        'title'  => $row['meeting_title'], 
        'start'  => $row['start_date'],
        'end'  => $row['end_date'], 
        'team_id' =>$row['team_id'], 
        'student_id' => $row['student_id'], 
        'status' => $row['status']
      );
    }

    $response = array(
      'result' => $data, 
      'message' => 'Test'
    );

    echo json_encode($response);

  }

}

?>