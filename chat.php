<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>

	<link rel="stylesheet" href="chat_style.css">

	<script
  src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous">
  </script>

</head>
<body>

	<div id="wrapper">
		<center><h1>Welcome <?php
		 require_once 'core/init.php';

		 $user = new User();
		 $username = $user->data()->username;
		 $user_id = $user->data()->user_id;

		echo $username; 
		 
		 ?> to my website</h1></center>	

	
		
		<div class="chat_wrapper">
			
			<div><?php 
				$db = DB::getInstance();

				$sql = "SELECT * FROM likes WHERE likee_id = $user_id OR liker_id = $user_id";
				$db->query($sql);
				$chaters = $db->results();
				// var_dump ($chaters);
				foreach ($chaters as $charter => $value) {
					if ($value->liker_id === $user_id)
					{
						$sql = "SELECT * FROM users WHERE user_id = $value->likee_id";
						$db->query($sql);
						$usernames = $db->first();
						//var_dump($usernames->username);
						echo "<button id = 'chat_user' data-user_id = '$value->likee_id'>$usernames->username</button>";
					}
					else if ($value->likee_id === $user_id)
					{
						$sql = "SELECT * FROM users WHERE user_id = $value->liker_id";
						$db->query($sql);
						$usernames = $db->first();
						echo "$usernames->username";
						echo "<button id = 'chat_user' data-user_id = '$value->liker_id'>$usernames->username</button>";
					}
				}

			?></div>
			<div id="abc"></div>
			<div id="chat"></div>

			<form method="POST" id="messageFrm">
				<textarea id="textarea" name="message" cols="30" rows="7" class="textarea" placeholder="Please Type a message to send"></textarea>
			</form>

		</div>


	</div>


	<script src="test_rahul3chat.js"></script>


</body>
</html>