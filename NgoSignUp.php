<?php

get_header();

/*

Template Name:NGOSignUp

*/

include('ngoDbfunctions.php');



$errorMessage = '&nbsp;';



//if (isset($_POST['email'])) {

//	$result = ngo_signup();



//	if ($result != '') {

//		$errorMessage = $result;

//	}

//}
if (isset($_POST['Ngo_email'])) {

//    Ngodetails::ngo_signup($_POST['Ngo_email'], $_POST['Ngo_username'], $_POST['Ngo_name'], $_POST['Ngo_country'], $_POST['Ngo_password'], $_POST['Ngo_password_confirm']);
	$result = new Ngodetails ();

    $result->ngo_signup($_POST['Ngo_email'], $_POST['Ngo_name'], $_POST['Ngo_country'], $_POST['Ngo_password'], $_POST['Ngo_password_confirm']);


	// $result = ngo_signup();



	// if ($result != '') {

	// 	$errorMessage = $result;

	// }

}


echo '



<link href="css/theme1.css" rel="stylesheet" media="all">





<body class="animsition">

    <div class="page-wrapper">

        <div class="page-content--bge5">

            <div class="container">

                <div draggable="true" class="login-wrap"  style="position: relative; vertical-align: center;cursor: move;">

                    <div class="login-content" style="height: 100%; overflow-y: scroll;overflow-x: hidden;height: 600px;">

                        <div class="login-logo">

                    <a href="#">

                        <img src="'.get_template_directory_uri().'/volunteerLogo.png" alt="Voluculture" style="max-width:120px; height:70px;">

                    </a>

                        </div>

                        <div> <?php echo $errorMessage; ?></div>

                        <div class="login-form">

                            <form action="" method="post">

                                <div class="form-group">

                                    Ngo Name:

                                    <input class="au-input au-input--full" type="text" name="Ngo_name" placeholder="Ngo name"

                                     style="width:60%;text-align:left;height:30px;margin-top:0px;margin-bottom:2px;margin-left:57px">

                                 </div>

                                <div class="form-group">

                                    Ngo Email Address:

                                    <input class="au-input au-input--full" type="email" name="Ngo_email" placeholder=" Ngo Email"

                                     style="width:60%;text-align:left;height:30px;margin-bottom:2px">

                                </div>

                                     <div class="form-group">

                                     Ngo Location:

                                    <input class="au-input au-input--full" type="text" name="Ngo_country" placeholder="Ngo Location"

                                    style="width:60%;text-align:left;height:30px;margin-left:41px">

                                </div>

                                <div class="form-group">

                                    Password:

                                    <input class="au-input au-input--full" type="password" name="Ngo_password"

                                     placeholder="Password"style="width:60%;text-align:left;height:30px;margin-left:63px;margin-bottom:2px">

                                </div>

                                <div class="form-group">

                                   Confirm Password:

                                    <input class="au-input au-input--full" type="password" name="Ngo_password_confirm"

                                     placeholder=" Confirm Password"style="width:60%;text-align:left;
                                     height:30px;margin-left:2px;margin-bottom:2px">

                                </div>

                                <div class="login-checkbox">

                                    <label>

                                        <input type="checkbox" name="aggree">Agree the terms and policy

                                    </label>

                                </div>

                                <button class="au-btn au-btn--block au-btn--green m-b-20" name="btnLogin" id="btnLogin" type="submit">register</button>


                            </form>


                                <div style="margin-top:0px;"class="register-link">
                                <p>Already have account?<a href="http://localhost/voluculture/ngo-verification/">Sign In</a>                               
                                </p>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>



    </div>



';

// get_footer();

?>
