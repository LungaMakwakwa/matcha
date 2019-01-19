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



    <!-- END section -->
    <section class="section bg-light"  id="next">
      <!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">    
  <!-- The Grid -->
  <div class="w3-row">
    <!-- Left Column -->
    <div class="w3-col m3">
      <!-- Profile -->
      <div class="w3-card w3-round w3-white">
        <div class="w3-container">
         <h4 class="w3-center"><span class="dot"
         <?php
            if ($user->data()->status === "1")
            {
                echo ('style="background-color:green;"');
            }
         ?>
         ></span><?php echo $name." ".$surname ?></h4>
         <p class="w3-center"><img src=
         <?php 
            if (count($profile_data->display_picture) > 0)
            {
              echo('"'.$profile_data->display_picture.'"');
            }
            else
            {
              echo ("Avatar_male.png");
            }
          
          ?> class="w3-circle" style="height:106px;width:106px" alt="Avatar"></p>
         <button onclick= hide_choose() class="w3-button w3-block w3-red w3-section" id = "choose_file">Choose Image</button>
         <form action="photo_upload.php" method="post" enctype="multipart/form-data">
            <input type="file" name= "fileToUpload" id="fileToUpload" class="w3-button w3-block w3-red w3-section" style = "display:none">
           <input type="submit" value="Upload Image" name="submit" class="w3-button w3-block w3-green w3-section" id = "upload_image" style = "display:none">
        </form>
        <script>
          function hide_choose() {
            //preventdefault();
            y = document.getElementById("fileToUpload");
            z = document.getElementById("choose_file");
            y.click();
            var x = document.getElementById("upload_image");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
        </script>
         <hr>
         <p><i class="fa fa-at fa-fw w3-margin-right w3-text-theme"></i><?php echo($username) ?></p>
         <p><i class="fa fa-<?php echo(strtolower($profile_data->gender)) ?> fa-fw w3-margin-right w3-text-theme"></i><?php echo($profile_data->gender) ?></p>
         <p><i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i><?php echo ($profile_data->location) ?></p>
         <p><i class="fa fa-birthday-cake fa-fw w3-margin-right w3-text-theme"></i><?php echo($profile_data->DOB) ?></p>
         <p><i class="fa fa-hourglass fa-fw w3-margin-right w3-text-theme"></i><?php echo(age_cal($profile_data->DOB))?> Years old</p>
         <H6 style="color:Red">UPLOAD PROFILE PICTURE TO START DATING!</H6>
        </div>
      </div>
      <br>
      
      
     
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
    <script src="one_page_js/submit.js"></script>
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
<!----------------------------------------------------------------------------------------->-

<?php
  }
  else
  {
    Redirect::to("index.php");
  }
?>


  </body>
</html>