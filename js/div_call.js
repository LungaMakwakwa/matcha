
//////////////////////////////////////////////////
//      LOGIN / REGISTRATION LOAD
//////////////////////////////////////////////////

$(document).ready(function () {

    $("#login_button").click(function() {
        var x = document.getElementById("login");
        var y = document.getElementById("register");
        if (x.style.display === "none") {
            if (y.style.display === "block")
            {
                y.style.display = "none";
            }
            x.style.display = "block";
        } else {
            x.style.display = "none";
      }
    $('html, body').animate({
      scrollTop: $("#login").offset().top
    }, 1000)
  }),

    $("#register_button").click(function (){
        var x = document.getElementById("register");
        var y = document.getElementById("login");
        if (x.style.display === "none") {
            if (y.style.display === "block")
            {
                y.style.display = "none";
            }
            x.style.display = "block";
        } else {
            x.style.display = "none";
      }
      $('html, body').animate({
        scrollTop: $("#register").offset().top
      }, 1000)
    }),

    $("#forgot_pwdBtn").click(function (){

      
        var x = document.getElementById("forgot_pwd");
        var y = document.getElementById("login");
        if (x.style.display === "none") {
            if (y.style.display === "block")
            {
                y.style.display = "none";
            }
            x.style.display = "block";
        } 
        else {
            x.style.display = "none";
        }
      $('html, body').animate({
        scrollTop: $("#forgot_pwd").offset().top
      }, 1000)
    })
  });

//////////////////////////////////////////////////
//      REGISTER LOAD
//////////////////////////////////////////////////

// addEventListener("click",
// $( "#register" ).load( "../index.php", function() {
//     //alert( "Load was performed." );
// }));

// //////////////////////////////////////////////////
// //      ADDITIONAL PAGE LOAD
// //////////////////////////////////////////////////

// addEventListener("click",
// $( "#non-existant" ).load( "../index.php", function() {
//     alert( "Load was performed." );
// }));