<?php 
ob_start(); 
require("hazardAssets/connection.php");
require("hazardAssets/sessions.php");
get_header();
session_start();

  if (isset($_SESSION["email"])) { 
    success();
   }

  if (!isset($_SESSION["email"])) {
    //Unregistered users and un logged_in users
    function register_login(){
      echo '
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

        <form class="w3-container w3-card-4" action="" method="POST">

          <h2>Volunteer Application</h2>

          <p>      
          <label><b>Email</b></label>
          <input class="w3-input w3-border w3-animate-input w3-animate-input" style="width:30%" name="email" type="email">
          </p>

          <p>      
          <label><b>Full Names</b></label>
          <input class="w3-input w3-border w3-animate-input" name="fullName" type="text" style="width:30%">
          </p>

          <p>      
          <label><b>Date Of Birth</b></label>
          <input class="w3-input w3-border w3-animate-input" name="DOB" type="date" style="width:30%">
          </p>

          <p>      
          <label><b>Country</b></label>
          <select class="w3-select w3-border" name="nationality">
            <option value="kenya">Kenya</option>
            <option value="tanzania">Tanzania</option>
            <option value="uganda">Uganda</option>
          </select>          
          </p>

          <p>      
          <label><b>Gender</b></label>
          <input class="w3-input w3-border w3-animate-input" name="gender" type="text" style="width:30%">
          </p>

          <p>      
          <label><b>Password</b></label>
          <input class="w3-input w3-border w3-animate-input" name="password_1" type="password" style="width:30%">
          </p>

          <p>      
          <label><b>Confirm Password</b></label>
          <input class="w3-input w3-border w3-animate-input" name="password_2" type="password" style="width:30%">
          </p>

          <p>      
          <button class="w3-btn w3-yellow" style="color: white" name="register">Register</button>
          </p>

        </form>
      ';
    }

    //Function call for the user to enter info incase he's not created a session with us
    register_login();

  }     

    //Logged in users
    function success(){
      echo "Welcome back".$_SESSION["email"];      
      header("Location: http://localhost/voluculture/profile-2/");
      exit;

    }


  if (isset($_POST["register"])) {
    $email =  $_POST['email']; 
    $username = $_POST['fullName'];
    $date = $_POST['DOB'];
    $gender = $_POST['gender'];
    $registrationPass_1 = $_POST['password_1'];
    $registrationPass_2 = $_POST['password_2'];

    if($registrationPass_1 !== $registrationPass_2){
    $_SESSION["ErrorMessage"] = "Password and password confirm do not match";
    header("Location: http://localhost/voluculture/volunteer-application/");
    exit;
    }
    else {
    $password = $registrationPass_1;

    $data = register($connection,$username,$password,$email,$gender,$date,$nationality);

    if(!$data){

      $_SESSION["ErrorMessage"] = "Please check your internet connection";
      header("Location: http://localhost/voluculture/volunteer-application/");
      exit;

    }else{

    $_SESSION['email'] = $email;
    success();
    }

  }
}
  

  function register($connection,$username,$pass,$email,$gender,$dob,$nationality){

      $sql = "INSERT INTO wp_user_details(userName,password,email,gender,DOB,nationality)VALUES('$username','$pass','$email','$gender','$dob','$nationality')";

      $result = mysqli_query($connection,$sql);
    
      if(!$result){

        return "Please Check your Internet connection";

      }else{

        $link = "http://localhost/voluculture/";

        $subject ="VOLUCULTURE REGISTRATION";

        $body = "<div style='background-color:orange;text-align:center'><h3>You have successfuly registered login to apply</h3>

        <div style='inline-block'><a href='$link'><button style='background-color:white ; color:black'>Click to login</button></a></div>

        ";
        $headers = array('Content-Type: text/html; charset=UTF-8');
 

     return $email;
    
      }
    }

   

    get_footer();

 ?>