<!doctype html>
<html lang="en">
  <head>
    <title>Casa Hotel Colorlib Website Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
  <?php
	require_once 'core/init.php';
        if (Session::exists('home'))
        {
            echo '<p>' .Session::flash('home').'</p>';
        }

        $db = DB::getInstance();
        $user = new User();

        $name = $user->data()->first_name;
        $surname = $user->data()->last_name;
        $username = $user->data()->username;
        $user_id = $user->data()->user_id;
        $profile_data = json_decode($user->data()->profile);
        
        function age_cal($dob)
        {
            $dateOfBirth = $dob;
            $today = date("Y-m-d");
            $diff = date_diff(date_create($dateOfBirth), date_create($today));
            return $diff->format('%y');
        }
        //$detail_array = $user->data()->profile;
        
        
        //$detail_string = json_decode($profile);
       

		//echo ($user->data()->user_id);
////////////////////////////////////////////////////////////
//          IF USER LOGGED IN!
////////////////////////////////////////////////////////////
        if ($user->isLoggedIn())
        {
    ?>  

    <header class="site-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-4 site-logo" data-aos="fade"><a href="index.html"><em>Cupid</em></a></div>
          <div class="col-8">


            <div class="site-menu-toggle js-site-menu-toggle"  data-aos="fade">
              <span></span>
              <span></span>
              <span></span>
            </div>
            <!-- END menu-toggle -->

            <div class="site-navbar js-site-navbar">
              <nav role="navigation">
                <div class="container">
                  <div class="row full-height align-items-center">
                    <div class="col-md-6 mx-auto text-center">
                      <ul class="list-unstyled menu">
                        <li class="active"><a href="index.html">Home</a></li>
                        <li><a href="#">Profile</a></li>
                        <li><a href="#">Update Profile</a></li>
                        <li><a href="#">Log Out</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- END head -->

    <!-------------------------------------------------------------->
    <!------------------------- Banner Div ------------------------->
    <!-------------------------------------------------------------->

    <section class="site-hero overlay" style="background-image: url(img/test1.jpg)" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row site-hero-inner justify-content-center align-items-center">
          <div class="col-md-10 text-center" data-aos="fade-up">
            <h2 class="heading" style = "font-size:30px">Find Love With</h2><br><h1 class="heading" style = "font-size:190px"><i>Matcha</i></h1>
            <div align = "center">
            <form action = "logout.php">
              <button id = "logout_button" class = "w3-btn  w3-border w3-border-orange w3-round-large" style = "width:100%"> Log Out </button>
            </form>
            </div>
          </div>
        </div>
      </div>

      <a class="mouse smoothscroll" href="#next">
        <div class="mouse-icon">
          <span class="mouse-wheel"></span>
        </div>
      </a>
    </section>


    <!-- Navbar -->
<div class="w3-top">
 <div class="w3-bar w3-theme-d2 w3-left-align w3-large">
  <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large w3-theme-d4"><i class="fa fa-home w3-margin-right"></i>Logo</a>
  <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="News"><i class="fa fa-globe"></i></a>
  <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Account Settings"><i class="fa fa-user"></i></a>
  <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Messages"><i class="fa fa-envelope"></i></a>
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

    <!-------------------------------------------------------------->
    <!------------------------- Banner Div ------------------------->
    <!-------------------------------------------------------------->
      <?php

      ?>
    <!-- START CONTENT AREA-->
    <div align = "center">
    <div>
    <form action = "update.php" method="post" class="w3-container w3-card-4 w3-animate-left">
        <h2 align="center">Personal Details</h2>

        <!-- START PERSONAL DETAILS AREA-->
        <div class = "field">
            <p class="w3-animate-left">
                <input class="w3-input" name="name" id = "name" type="text" style="width:90%">
                <label>Name</label>
            </p>
        </div>
        <div class = "field">
            <p class="w3-animate-left">
                <input class="w3-input" name="last_name" id = "last_name" type="text" style="width:90%">
                <label>Last Name</label>
            </p>
        </div>
        <div class = "field">
            <p class="w3-animate-left">
                <input class="w3-input" name="username" id = "username" type="text" style="width:90%">
                <label>Username</label>
            </p>
        </div>
                <div class = "field">
            <p class="w3-animate-left">
                <input class="w3-input" name="email" id = "email" type="text" style="width:90%">
                <label>E-mail</label>
            </p>
        </div>
        <div>
            <button class="w3-button w3-section w3-teal w3-ripple"> Update </button>
        </div>
    </form>
    </div>
    <p> </p>
    <?php
        require_once "core/init.php";
        if(Session::exists('Details'))
        {
            $details = Session::flash('Details');
            echo "<p align = 'center'>$details</p>";
        }
    ?>


    <div align = "center">
    <div>
    <form action = "dating_details.php" method="post" class="w3-container w3-card-4 w3-animate-left">
        <h2 align="center">Dating Details</h2>

        <!-- START PERSONAL DETAILS AREA-->
        <div class = "field">
            <p class="w3-animate-left">
                <select class="w3-input" name="gender" id = "gender" style="width:90%">
                    <option></option>
                    <option>Male</option>
                    <option>Female</option>
                    <option>Transgender(M-F)</option>
                    <option>Transgender(F-M)</option>
                </select>
                <label>Gender</label>
            </p>
        </div>
        <div class = "field">
            <p class="w3-animate-left">
                <select class="w3-input" name="sexual_p" id = "sexual_p" style="width:90%">
                    <option></option>
                    <option>Male</option>
                    <option>Female</option>
                    <option>Bi-sexual</option>
                    <option>Transgender(M-F)</option>
                    <option>Transgender(F-M)</option>
                </select>
                <label>Sexual Preference</label>
            </p>
        </div>
        <div class = "field">
            <p class="w3-animate-left">
                    <div class="icon"><span class="icon-calendar"></span></div>
                    <input type="text" name = "checkin_date" id="checkin_date" class="form-control" style = "width:425%" required>
                    <p></p>
                <label>Date of Birth</label>
            </p>
        </div>
        <div>
            <button class="w3-button w3-section w3-teal w3-ripple"> Update </button>
        </div>
    </form>
    </div>
    <p> </p>
    <?php
        require_once "core/init.php";
        if(Session::exists('dating_Details'))
        {
            $details = Session::flash('dating_Details');
            echo "<p align = 'center'>$details</p>";
        }
    ?>



    

    <!-- START NOTIFICATION DETAILS AREA-->
    <div>
    <form action = "notification.php" method="post" class="w3-container w3-card-4 w3-animate-right">
        <h2 align="center">Notifications</h2>
        <input class="w3-animate-left" type="checkbox" name="notify" value="notify" 
            <?php
                require_once "core/init.php";
                $user = new User();
                $user_id = $user->data()->user_id;
                $db = DB::getInstance();
                $db->get("users",array('user_id', '=', $user_id));
                $notify = $db->results();
                $notify_no = $notify[0]->notification;
                if ($notify_no === '1')
                {
                    echo ("checked");
                }
                else if ($notify_no === '0')  
                {
                    echo ("");
                }
            ?> 
        > Send Notification Emails<br>
        <div>
            <button class="w3-button w3-section w3-teal w3-ripple"> Update </button>
        </div>
    </form>
    </div>
    <p> </p>

    <!-- START PASSWORD DETAILS AREA-->
    <div>
    <form action = "update_password.php" method="post" class="w3-container w3-card-4 w3-animate-left">
        <h2 align="center">Password</h2>

        <div class = "field">
            <p class="w3-animate-left">
                <input class="w3-input" name="current_password" id = "current_password" type="password" style="width:90%" required>
                <label>Current Password</label>
            </p>
        </div>

        <div class = "field">
            <p class="w3-animate-left">
                <input class="w3-input" name="password" id = "password" type="password" style="width:90%" required>
                <label>New Password</label>
            </p>
        </div>

        <div class = "field">
            <p class="w3-animate-left">
                <input class="w3-input" name="password_again" id = "password_again" type="password" style="width:90%" required>
                <label>Re-type New Password</label>
            </p>
        </div>
        <div>
            <button class="w3-button w3-section w3-teal w3-ripple"> Update </button>
        </div>
    </form>
    <p> </p>
    </div>
    </div>
    <?php
        require_once "core/init.php";
        if(Session::exists('new_pw'))
        {
            $details = Session::flash('new_pw');
            echo "<p align = 'center'>$details</p>";
        }
        else if(Session::exists('currPw'))
        {
            $details = Session::flash('currPw');
            echo "<p align = 'center'>$details</p>";
        }
        else if(Session::exists('NewPw'))
        {
            $details = Session::flash('NewPw');
            echo "<p align = 'center'>$details</p>";
        }
    ?>
</div>
</section>
    </footer>
    
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery-migrate-3.0.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    
    
    <script src="js/aos.js"></script>
    
    <script src="js/bootstrap-datepicker.js"></script> 
    <script src="js/jquery.timepicker.min.js"></script> 

    

    <script src="js/main.js"></script>
    <script src="one_page_js/notification.js"></script>
    <!--script src="one_page_js/search.js"></script> 

    <!--- W3 CSS SCRIPT -->
    <script>
// Accordion
function myFunction(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
        x.previousElementSibling.className += " w3-theme-d1";
    } else { 
        x.className = x.className.replace("w3-show", "");
        x.previousElementSibling.className = 
        x.previousElementSibling.className.replace(" w3-theme-d1", "");
    }
}

// Used to toggle the menu on smaller screens when clicking on the menu button
function openNav() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }
}
</script>

<!----------------------------------------------------------------------------------------->
<!----------------------------------------------------------------------------------------->
<!-------------------------------- Hidden intrests div ------------------------------------>
<!----------------------------------------------------------------------------------------->
<!----------------------------------------------------------------------------------------->
<script>
  function hidden_div() {
            var x = document.getElementById("intrests");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }

</script>

<?php
  }
  else
  {
    Redirect::to("index.php");
  }
?>


  </body>
</html>