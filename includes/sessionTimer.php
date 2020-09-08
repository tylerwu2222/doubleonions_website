<?php
    include 'includes/dbh.php';
    session_start();
	/*
	// not entering here regardless
	if (!isset($_SESSION['start']) && isset($_SESSION['loggedin'])) {
	    echo 'again?<br>';
	    $_SESSION['start'] = time();
	    $userID = $_SESSION['userID'];
	    $startTime = $_SESSION['started'];
	    $sql = "INSERT INTO sessions (user_id,login_time) VALUES ($userID,$startTime)";
	    $conn->query($sql);
	    echo $_SESSION['started'];
	}
	
	// update last activity time stamp
	$_SESSION['LAST_ACTIVITY'] = time();
	// if last activity was 2 hours ago, end session
	if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 7200)) {
        session_unset();     // unset $_SESSION variable for the run-time 
        session_destroy();   // destroy session data in storage
    }
    
    // otherwise, update last_activity in table
    else{
        $lastActivity = $_SESSION['LAST_ACTIVITY'];
        $sql2 = "UPDATE sessions SET last_activity=$lastActivity";
	    $conn->query($sql2);
    }
    */
?>