<?php
  require_once 'core/init.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Matcha</title>
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
    
    <!----- STYLE FOR PASSWORD PATTERN ----->
    <style>
            /* The message box is shown when the user clicks on the password field */
            #message {
                display:none;
                background: #f1f1f1;
                color: #000;
                position: relative;
                padding: 20px;
                margin-top: 10px;
            }

            #message p {
                padding: 10px 35px;
                font-size: 18px;
            }

            /* Add a green text color and a checkmark when the requirements are right */
            .valid {
                color: green;
            }

            .valid:before {
                position: relative;
                left: -35px;
                content: "✔";
            }

            /* Add a red text color and an "x" when the requirements are wrong */
            .invalid {
                color: red;
            }

            .invalid:before {
                position: relative;
                left: -35px;
                content: "✖";
            }
        </style>

    <!-- Theme Style -->
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    
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
              <button id = "login_button" class = "w3-btn  w3-border w3-border-orange w3-round-large" style = "width:40%"> Login </button>
              <button id = "register_button" class = "w3-btn  w3-border w3-border-orange w3-round-large" style = "width:40%">Register </button>
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

    <!-------------------------------------------------------------->
    <!------------------------- Banner Div ------------------------->
    <!-------------------------------------------------------------->



    <!-------------------------------------------------------------->
    <!------------------------- Login Div -------------------------->
    <!-------------------------------------------------------------->
    <div id = "login" style = 'display:none'>
    <section class="section bg-light"  id="next">
      <div class="container">
        <div class="row">
          <div class="col-md-7 mx-auto text-center mb-5" data-aos="fade-up" data-aos-delay="100">
            <h2 class="heading">Login</h2>
          </div>
        </div>
        <div class="row">
          <div class="block-32" data-aos="fade-up" data-aos-delay="100">

            <form action="login.php" method = "post">

              <!-- --->
              <div class="row">
                <div class="col-md-6 form-group">
                  <label for="username2" align = "center">Username</label>
                  <input type="text" name = "username2" id="username2" class="form-control" style = "width:200%">
                </div>
              </div>

              <!-- --->
              <div class="row">
                <div class="col-md-6 form-group">
                  <label for="password2">Password</label>
                  <input type="password" name = "password2" id="password2" class="form-control" style = "width:200%">
              </div>
              </div>

              <input type= "hidden" name= "token2" value= "<?php echo Token::generate(); ?>">

              <!-- --->
                <div align = "center">
                  <button type = "submit" class="btn btn-primary btn-block text-white" style = "width:25%">Login</button>
                  <a href="#">Forgot Password</a>
                </div>
              </div>

            </form>
          </div>


        </div>
      </div>
    </section>
    </div>
    <!-------------------------------------------------------------->
    <!------------------------- Login Div -------------------------->
    <!-------------------------------------------------------------->

    <!-------------------------------------------------------------->
    <!---------------------- Register Div -------------------------->
    <!-------------------------------------------------------------->
    <div id= "register" style = 'display:none'>
    <section class="section bg-light"  id="next">
      <div class="container">
        <div class="row">
          <div class="col-md-7 mx-auto text-center mb-5" data-aos="fade-up" data-aos-delay="100">
            <h2 class="heading">Register</h2>
          </div>
        </div>
        <div class="row">
          <div class="block-32" data-aos="fade-up" data-aos-delay="100">

            <form action="register.php" method = "post">
            
            <!---------------------- Username -------------------------->

            <div class="row">
                <div class="col-md-6 form-group">
                  <label for="username" align = "center">Username</label>
                  <input type="text" name = "username" id="username" class="form-control" style = "width:200%" required>
                </div>
            </div>
            <input type = "hidden" name = "location" id="location" value = "">

            <!---------------------- Name/last Name -------------------------->

            <div class="row">
                <div class="col-md-6 form-group">
                  <label for="first_name" align = "center">First Name</label>
                  <input type="text" name ="first_name" id="first_name" class="form-control" style = "width:100%" required>
                </div>
                <div class="col-md-6 form-group">
                  <label for="last_name" align = "center">Last Name</label>
                  <input type="text" name ="last_name" id="last_name" class="form-control" style = "width:95%" required>
                </div>
            </div>

            <!---------------------- Password -------------------------->

            <div class="row">
                <div class="col-md-6 form-group">
                  <label for="password" align = "center">Password</label>
                  <input type="password" name ="password" id="password" class="form-control" style = "width:200%" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                  <div id="message">
                    <h3 style = "color:	#808080">Password must contain the following:</h3>
                      <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                      <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                      <p id="number" class="invalid">A <b>number</b></p>
                      <p id="length" class="invalid">Minimum <b>8 characters</b></p>
                  </div>
                </div>
            </div>



            <!---------------------- Password -------------------------->

            <div class="row">
                <div class="col-md-6 form-group">
                  <label for="re-password" align = "center">Re-Type Password</label>
                  <input type="password" name = "re-password" id="re-password" class="form-control" style = "width:200%" required>
                </div>
            </div>

            <!---------------------- DOB/email address -------------------------->

            <div class="row">
                <div class="col-md-6 mb-3 mb-lg-0 col-lg-3">
                  <label for="checkin_date">Date Of Birth</label>
                  <div class="field-icon-wrap">
                    <div class="icon"><span class="icon-calendar"></span></div>
                    <input type="text" name = "checkin_date" id="checkin_date" class="form-control" style = "width:425%" required>
                    <p></p>
                  </div>
                </div>
            </div>

            <!---------------------- Email address -------------------------->

            <div class="row">
                <div class="col-md-6 form-group">
                  <label for="email" align = "center">Email Address</label>
                  <input type="text" name ="email" id="email" class="form-control" style = "width:200%" required>
                </div>
            </div>

            <!---------------------- Profile Picture -------------------------->

            

            <!---------------------- Gender and intrest -------------------------->

            <div class="row">
                <div class="col-md-6 form-group">
                  <label for="gender" align = "center">I Am</label>
                  <select id="gender" name ="gender" class="form-control" required>
                    <option></option>
                    <option>Male</option>
                    <option>Female</option>
                    <option>Transgender(M-F)</option>
                    <option>Transgender(F-M)</option>
                  </select>
                </div>
                <div class="col-md-6 form-group">
                  <label for="intrest_gender" align = "center">Intrested In</label>
                  <select type="text" name = "intrest_gender" id="intrest_gender" class="form-control" style = "width:95%" required>
                    <option></option>
                    <option>Male</option>
                    <option>Female</option>
                    <option>Male / Female</option>
                    <option>Transgender(M-F)</option>
                    <option>Transgender(F-M)</option>
                  </select>
                </div>
            </div>
            <input type= "hidden" name= "token" value= "<?php echo Token::generate(); ?>">
            <!---------------------- Register button -------------------------->
                <div align = "center">
                  <button type = "submit" class="btn btn-primary btn-block text-white" style="width:25%">Register</button>
                  <a href="#">Already have an account? Login</a>
                </div>
            </div>
            </form>
          </div>
        </div>
    </section>
    </div>


    <!-------------------------------------------------------------->
    <!---------------------- Register Div -------------------------->
    <!-------------------------------------------------------------->



    
    <footer class="section footer-section">
      <div class="container">
        <div class="row mb-4">
          <div class="col-md-3 mb-5">
            <ul class="list-unstyled link">
              <li><a href="#">About Us</a></li>
              <li><a href="#">Terms &amp; Conditions</a></li>
              <li><a href="#">Privacy Policy</a></li>
              <li><a href="#">Help</a></li>
             <li><a href="#">Rooms</a></li>
            </ul>
          </div>
          <div class="col-md-3 mb-5">
            <ul class="list-unstyled link">
              <li><a href="#">Our Location</a></li>
              <li><a href="#">The Rooms &amp; Suites</a></li>
              <li><a href="#">About</a></li>
              <li><a href="#">Contact</a></li>
              <li><a href="#">Restaurant</a></li>
            </ul>
          </div>
          <div class="col-md-3 mb-5 pr-md-5 contact-info">
            <p><span class="d-block"><span class="ion-ios-location h5 mr-3 text-primary"></span>Address:</span> <span> 98 West 21th Street, Suite 721 New York NY 10016</span></p>
            <p><span class="d-block"><span class="ion-ios-telephone h5 mr-3 text-primary"></span>Phone:</span> <span> (+1) 435 3533</span></p>
            <p><span class="d-block"><span class="ion-ios-email h5 mr-3 text-primary"></span>Email:</span> <span> info@yourdomain.com</span></p>
          </div>
          <div class="col-md-3 mb-5">
            <p>Sign up for our newsletter</p>
            <form action="#" class="footer-newsletter">
              <div class="form-group">
                <input type="email" class="form-control" placeholder="Your email...">
                <button type="submit" class="btn"><span class="fa fa-paper-plane"></span></button>
              </div>
            </form>
          </div>
        </div>
        <div class="row bordertop pt-5">
          <p class="col-md-6 text-left">
            
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            <!--Copyright &copy;<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="ion-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            
          </p>
            
          <p class="col-md-6 text-right social">
            <a href="#"><span class="fa fa-tripadvisor"></span></a>
            <a href="#"><span class="fa fa-facebook"></span></a>
            <a href="#"><span class="fa fa-twitter"></span></a>
          </p>
        </div>
      </div>
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

    <!----- SCRIPT FOR LOAD JQUERY ----->
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="one_page_js/div_call.js"></script>
    <script src="one_page_js/location.js"></script>

  <!----- STYLE FOR PASSWORD PATTERN ----->

    <script>
      
      var myInput = document.getElementById("password");
        var letter = document.getElementById("letter");
        var capital = document.getElementById("capital");
        var number = document.getElementById("number");
        var length = document.getElementById("length");

        // When the user clicks on the password field, show the message box
        myInput.onfocus = function() {
            document.getElementById("message").style.display = "block";
        }

        // When the user clicks outside of the password field, hide the message box
        myInput.onblur = function() {
            document.getElementById("message").style.display = "none";
        }

        // When the user starts to type something inside the password field
        myInput.onkeyup = function() {
          // Validate lowercase letters
          var lowerCaseLetters = /[a-z]/g;
          if(myInput.value.match(lowerCaseLetters)) {  
            letter.classList.remove("invalid");
            letter.classList.add("valid");
          } else {
            letter.classList.remove("valid");
            letter.classList.add("invalid");
          }

          // Validate capital letters
          var upperCaseLetters = /[A-Z]/g;
          if(myInput.value.match(upperCaseLetters)) {  
            capital.classList.remove("invalid");
            capital.classList.add("valid");
          } else {
            capital.classList.remove("valid");
            capital.classList.add("invalid");
          }
      
          // Validate numbers
          var numbers = /[0-9]/g;
          if(myInput.value.match(numbers)) {  
            number.classList.remove("invalid");
            number.classList.add("valid");
          } else {
            number.classList.remove("valid");
            number.classList.add("invalid");
          }

          // Validate length
          if(myInput.value.length >= 8) {
            length.classList.remove("invalid");
            length.classList.add("valid");
          } else {
            length.classList.remove("valid");
            length.classList.add("invalid");
          }
        }
    </script>

  </body>
</html>