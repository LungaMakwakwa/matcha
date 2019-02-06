<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Chat</title>


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

	<link rel="stylesheet" href="css/chat_style.css">

	<script
  src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous">
  </script>

</head>
<body>


	    <!-- Navbar -->
<div class="w3-top">
 <div class="w3-bar w3-theme-d2 w3-left-align w3-large">
 <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
  <a href="home.php" class="w3-bar-item w3-button w3-padding-large w3-theme-d4"><i class="fa fa-home w3-margin-right"></i>Logo</a>
  <a href="matches.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="News"><i class="fa fa-globe"></i></a>
  <a href="update_profile.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Account Settings"><i class="fa fa-user"></i></a>
  <a href="chat.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Messages"><i class="fa fa-envelope"></i></a>
  <div class="w3-dropdown-hover w3-hide-small">
    <button id = "Notifications_icon" class="w3-button w3-padding-large" title="Notifications"><i class="fa fa-bell"></i><span class="w3-badge w3-right w3-small w3-green" id = "notes_count"></span></button>     
    <div class="w3-dropdown-content w3-card-4 w3-bar-block" style="width:300px" id = "Notifications_icon">
        <p id = "Notifications"></p>
        <p class="w3-bar-item w3-button" style = "color:black;" id = "NotificationsBtn"> Clear </p>
    </div>
  </div>
  
  <a href="#" class="w3-bar-item w3-button w3-hide-small w3-right w3-padding-large w3-hover-white" title="My Account">
    <!-- image-->
  </a>
 </div>
</div>

<!-- Navbar on small screens -->
<div id="navDemo" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium w3-large">
  <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 1</a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 2</a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 3</a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large">My Profile</a>
</div>

	
    <!-- END section -->

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

				$sql = "SELECT * FROM likes WHERE likee_id = $user_id OR liker_id = $user_id AND likee_stat = '1' AND liker_stat = '1' ";
				$db->query($sql);
				$chaters = $db->results();
				// var_dump ($chaters);
				foreach ($chaters as $charter => $value) {
					if ($value->liker_id === $user_id)
					{
						$sql = "SELECT * FROM users WHERE user_id = $value->likee_id";
						$db->query($sql);
						$usernames = $db->first();

						echo "<button  class='w3-button w3-block w3-green w3-section chat_user'  data-user_id = '$value->likee_id'>$usernames->username </button>";
					}
					else if ($value->likee_id === $user_id)
					{
						$sql = "SELECT * FROM users WHERE user_id = $value->liker_id";
						$db->query($sql);
						$usernames = $db->first();

						echo "<button id = 'chat_user' class='w3-button w3-block w3-green w3-section chat_user' data-user_id = '$value->liker_id'>$usernames->username</button>";
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


	<script src="js/chat.js"></script>
	<script src="js/notification.js"></script>

</body>
</html>