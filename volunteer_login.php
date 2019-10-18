<?php 
ob_start();
/**
 * Template Name: Volunteer login
 *
 * @package flatsome
 */
get_header();

require("hazardAssets/connection.php");

	if (isset($_SESSION["email"])) {
		$_SESSION["SuccessMessage"] = "Welcome ". $_SESSION["email"];
	    	header("Location: http://localhost/voluculture/profile-2/");
	    	exit;
		}

	login_form();

	if (isset($_POST["login"])) {

	    $email = $_POST['email'];
	    $password = $_POST['password'];

	    if (!empty($email) && !empty($password)) {
	      login($connection,$email,$password);

	    }
	    echo "Error somewhere";
	  } 

	  function login_form(){
	  	echo '
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

        <form class="w3-container w3-card-4" action="" method="POST">

          <h2>Volunteer Login</h2>

          <p>      
          <label><b>Email</b></label>
          <input class="w3-input w3-border w3-animate-input w3-animate-input" style="width:30%" name="email" type="email">
          </p>

          <p>      
          <label><b>Password</b></label>
          <input class="w3-input w3-border w3-animate-input" name="password" type="password" style="width:30%">
          </p>

          <p>      
          <button class="w3-btn w3-yellow" style="color: white" name="login">Login</button>
          </p>

        </form>
      ';
	  }


 function login($conn,$email_login,$password_login){

      $sql = "SELECT * FROM wp_user_details WHERE email = '$email_login' AND password ='$password_login'";

      $result = mysqli_query($conn,$sql);

      if(mysqli_num_rows($result) == 1){  
      		$_SESSION["email"] = $email_login;    
        	success();
        
      }else{
        echo "Wrong credentials";
      }

    }

    function success(){
    	$_SESSION["SuccessMessage"] = "Welcome ". $_SESSION["email"];
    	header("Location: http://localhost/voluculture/profile-2/");
    	exit;
    }

get_footer();

?>
