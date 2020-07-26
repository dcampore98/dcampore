<?php
require_once('../config/database.php');

if(isset($_POST['query']))
{
  if($_POST['query'] == 'loadMyMeetings')
  {

    // get user team from session
    $user_team=2 ;
    
    $data = array();

    $query = "SELECT meeting.meeting_id, meeting.meeting_title, meeting.start_date, meeting.end_date, meeting_participants.meeting_id, meeting_participants.team_id FROM meeting JOIN meeting_participants ON meeting.meeting_id = meeting_participants.meeting_id WHERE meeting_participants.team_id =$user_team";

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


  if($_POST['query'] == 'load_user_meeting_history')
  {
    $member_id = $_POST['member_id'];  

    $member_id = (int)$member_id;

    
    $data = array();

    $query = "SELECT meeting.meeting_id, meeting.meeting_title, meeting.start_date, meeting.end_date, meeting_participants.meeting_id, meeting_participants.team_id, team.team_id, team_members.team_id, team_members.student_id, meeting_attendance.meeting_id, meeting_attendance.student_id, meeting_attendance.status, student.student_id, student.username FROM meeting LEFT JOIN meeting_participants ON meeting_participants.meeting_id = meeting.meeting_id LEFT JOIN team_members ON meeting_participants.team_id =team_members.team_id LEFT JOIN meeting_attendance ON meeting_attendance.meeting_id = meeting.meeting_id LEFT JOIN student ON student.student_id =meeting_attendance.student_id LEFT JOIN team ON team_members.team_id= team.team_id WHERE end_date < CURRENT_TIMESTAMP() AND team_members.student_id = $member_id";

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


  if($_POST['query'] == 'getAllMeetings')
  {
    
    $data = array();

    $query = "SELECT * FROM meeting WHERE end_date > CURRENT_TIMESTAMP() ORDER BY meeting_id";

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



  if($_POST['query'] == 'loadTeam'){
    // get user details from session 
    $user_id = 1;  //doing this temporarily
    
    $data = array();

    $query = "SELECT student.student_id, student.username, team_members.team_id, team.team_name FROM student JOIN team_members ON student.student_id = team_members.student_id JOIN team ON team_members.team_id = team.team_id WHERE team.team_id= 2 ";


    $statement= $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();

    foreach($result as $row)
    {
      $data[] = array(
        'student_id'  => $row['student_id'],
        'username'  => $row['username'], 
        'tean_id'  => $row['team_id'],
        'team_name'  => $row['team_name']
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
      INSERT INTO meeting_participants(meeting_id, student_id, username) VALUES(:meeting_id, :student_id, :username)";

      $statement = $connect->prepare($query);
      $statement->execute(
      array(
      ':meeting_id' => $member['meeting_id'], 
      ':student_id' => $member['userID'], 
      ':username' => $member['username']));
    }
  }


  if($_POST['query'] == 'createMeeting')
  {


    $meeting_id = $_POST['meeting_id'];
    $team_id = 2;   //hardcoded for now, would be retrieved from user session
    

    $query = "
    INSERT INTO meeting_participants(meeting_id, team_id) VALUES(:meeting_id, :team_id)";

    $statement = $connect->prepare($query);
    $statement->execute(
      array(


        ':meeting_id' => $meeting_id, 
        ':team_id' => $team_id, 

      )
      );


  }
  
}

?>