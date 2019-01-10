<?php

require_once 'core/init.php';

$db = DB::getInstance();
$user = new User();

$username = $user->data()->username;

echo "out";
switch( $_REQUEST['action'] ){

	
	case "sendMessage":
		echo "in";
		//global $db;
		//session_start();
		//$query = $db->prepare("INSERT INTO messages SET user=?, message=?");
		$run = $db->insert('messages', array('username' =>  $username, 'message' => $_REQUEST['message']));

		//$run = $query->execute([$_SESSION['username'], $_REQUEST['message']]);

		if( $run ){
			echo 1;
			exit;
		}



	break;

	case "getMessages":

	//	session_start();

		//$query = $db->prepare("SELECT * FROM messages");
		//$run = $query->execute();
		$db->query("SELECT * FROM messages");
		$run = $db->results();

		//$rs = $query->fetchAll(PDO::FETCH_OBJ);

		$chat = '';
		foreach( $run as $message )
		{
			$chat .= '<div class="single-message '.(($username==$message->username)?'right':'left').'">
						<strong>'.$message->username.': </strong><br /> <p>'.$message->message.'</p>
						<br />
						<span>'.date('h:i a', strtotime($message->date)).'</span>
						</div>
						<div class="clear"></div>
						';
		}

		echo $chat;

	break;

}


?>