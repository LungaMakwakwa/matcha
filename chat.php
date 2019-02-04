<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>


	<link href="https://fonts.googleapis.com/css?family=Mukta+Mahee:200,300,400|Playfair+Display:400,700" rel="stylesheet">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/aos.css">
	<link rel="stylesheet" href="css/bootstrap-datepicker.css">
	<link rel="stylesheet" href="css/jquery.timepicker.css">
	<link rel="stylesheet" href="css/magnific-popup.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/w3.css">
	<link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
	<link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css">
	
	<!--- W3 CSS -->
	<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
	<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	
	
	<!-- Theme Style -->

	<link rel="stylesheet" href="chat_style.css">

	<script
  src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous">
  </script>

</head>
<body>

	<div id="wrapper">
		<p></p>
		<p></p>
		<p></p>
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
						//echo "$usernames->username";
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
	<script src="one_page_js/notification.js"></script>

</body>
</html>