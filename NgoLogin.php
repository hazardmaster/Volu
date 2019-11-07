<?php
get_header();
/*
Template Name:NGOLogin
*/ 

// connecting to function
session_start();

include('ngoDbfunctions.php');

$errorMessage = '&nbsp;';



if (isset($_POST['Ngo_email'])) {

//  Ngodetails::ngo_login($_POST['Ngo_email'],$_POST['Ngo_password']);
 $result = new Ngodetails ();

    $result->ngo_login($_POST['Ngo_email'],$_POST['Ngo_password']);




	// $result = ngo_signup();

	

	// if ($result != '') {

	// 	$errorMessage = $result;

	// }

}

echo '

<link href="css/theme1.css" rel="stylesheet" media="all">
<link href="/css/font-face1.css" rel="stylesheet" media="all">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                        <a href="#">
                        <img src="'.get_template_directory_uri().'/volunteerLogo.png" alt="Voluculture" style="max-width:120px; height:70px;">
                    </a>
                        </div>
                        <div class="login-form">
                            <form action="" method="post">
                                
                              <div class="form-group">
                                    <label> Ngo Email Address</label>
                                    <input class="au-input au-input--full" type="email" name="Ngo_email" placeholder=" Ngo Email" style="width:100%;text-align:left;height:40px">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="Ngo_password" placeholder="Password" style="width:100%;text-align:left;height:40px">
                                </div>
                                <div class="login-checkbox">
                                    <label>
                                        <input type="checkbox" name="aggree">Agree the terms and policy
                                    </label>
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">log in</button>
                               
                            </form>
                            <div class="register-link">
                                <p>
                                    Don\'t have an account?
                                    <a href=" http://localhost/voluculture/ngo-sign-up/">Register</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    

';
get_footer();
?>


