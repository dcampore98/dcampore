<?php
session_start();

// var_dump($_SESSION);
$sid = SID; //Session ID #


if(isset($_SESSION['CAS'])){

	$authenticated = $_SESSION['CAS'];
}


//send user to CAS login if not authenticated
if (!$authenticated) {
  
	header("Location: https://cas.iu.edu/cas/login?cassvc=IU&casurl=http://cgi.soic.indiana.edu/~dcampore/i491/student");
	

	
  exit;
}


if ($authenticated) {
	var_dump($_SESSION);
  
  //validate since authenticated
  if (isset($_GET["casticket"])) {

		echo $_GET["casticket"];
	//set up validation URL to ask CAS if ticket is good
	$_url = 'https://cas.iu.edu/cas/validate/';
	$cassvc = 'IU';  //search kb.indiana.edu for "cas application code" to determine code to use here in place of "appCode"
	$casurl = 'http://cgi.soic.indiana.edu/~dcampore/i491/student'; //same base URLsent
	
  $params = "cassvc=$cassvc&casticket=$_GET[casticket]&casurl=$casurl";
	$urlNew = "$_url?$params";

	//CAS sending response on 2 lines.  First line contains "yes" or "no".  If "yes", second line contains username (otherwise, it is empty).
	$ch = curl_init();
	$timeout = 5; // set to zero for no timeout
	curl_setopt ($ch, CURLOPT_URL, $urlNew);
	curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
	ob_start();
	curl_exec($ch);
	curl_close($ch);
	$cas_answer = ob_get_contents();



	ob_end_clean();
	// echo $cas_answer;
	
  //split CAS answer into access and user
		// echo 'cas answer'. $cas_answer;
  
	list($access,$user) = explode("\n",$cas_answer,2);
	$access = trim($access);
	$user = trim($user);
	echo 'access is ' . $access;
	echo $user;	
	// return;
	//set user and session variable if CAS says YES
	if ($access == "yes") {
        $_SESSION['user'] = $user;
        echo "Welcome to our home page $user, now we can authorize you with our user database.";
	}
	else{
		echo '$access is false';
	}
  }
  else
  {

     $_SESSION['CAS'] = true;
     header("Location: https://cas.iu.edu/cas/login?cassvc=IU&casurl=http://cgi.soic.indiana.edu/~dcampore/i491/student");
     exit;
  }
}
?>

