<?php
session_start();
ob_start();


  /**
   * Template Name: Client Account
   *
   * @package flatsome
   */
  get_header();

  session_start();

  //User registration manenos
  if (isset($_POST["client_registration_form"])) {

      //Basic Log in details
      $firstName = $_POST["firstName"];
      $surname = $_POST["surname"];
      $phone = $_POST["phone"];
      $email = $_POST["email"];
      $linkedInURL = $_POST["linkedInURL"];
      $gender = $_POST["gender"];
      $nationality = $_POST["nationality"];
      $password_1 = $_POST["password_1"];
      $password_2 = $_POST["password_2"];

      //Focus groups
      $focusGroups = $_POST["focus_group"];
      $focus_group_db = serialize($focusGroups);
      // $focus = unserialize($focus_group_db);

      //Causes
      $passionate_causes = $_POST["passionate_causes"];
      $passionate_causes_db = serialize($passionate_causes);

      //Partner Location
      $partner_location = $_POST["partner_locations"];
      $partner_location_db = serialize($partner_location);

      if ($password_1 !== $password_2) {
        echo "Passwords don't match";
        exit;
      }
      Volunteer_signUp($firstName, $surname, $phone, $email, $password_1,$linkedInURL,$gender,$nationality,$focus_group_db,$passionate_causes_db,$partner_location_db);
  }

  function Volunteer_signUp($firstName, $surname, $phone, $email, $password_1,$linkedInURL,$gender,$nationality,$focus_group_db,$passionate_causes_db,$partner_location_db){

    //hash password
     $hashed_password = password_hash($password_1, PASSWORD_DEFAULT);
     $userName = $firstName. " ".$surname;
       global $wpdb;
         $result = $wpdb->insert(
                'wp_user_details',
                array(
                        'userName'=>$userName,
                        'password'=>$hashed_password,
                        'email'=>$email,
                        'gender'=>$gender,
                        'phone'=>$phone,
                        'nationality'=>$nationality,
                        'linkedInURL'=>$linkedInURL,
                        'focusGroups'=>$focus_group_db,
                        'passionate_causes'=>$passionate_causes_db,
                        'partner_locations'=>$partner_location_db
                      )
         );
         if (!$result) {
             wp_die('Database Insertion failed');
         }
         echo "Registration for ". $userName . " was successful";
  }

  //User Login part
  if (isset($_POST["login_user"])) {
      $email_login = $_POST["login_email"];
      $password_login = $_POST["login_password"];

      Volunteer_login($email_login, $password_login);

  }
  //Volunteer Login
    function Volunteer_login($email_login,$password_login){

       if(!empty($email_login) || !empty($password_login)){

         global $wpdb;

         echo $email_login;
         $user_login_credentials = $wpdb -> get_row("SELECT * FROM wp_user_details WHERE email ='$email_login' ");

         $db_pass = $user_login_credentials->password;

          if (!$user_login_credentials) {
             echo "User not found";
             exit;
           }

           if (!password_verify($password_login, $db_pass)) {
             echo "passwords dont match";
             exit;
           }


        if($user_login_credentials -> status_binary != 'active'){
            echo"Activate Your account";
            exit;

        }else{

            $_SESSION['ID'] =$user_login_credentials->ID;
            client_profile();

        }
       }else{

           echo"There are empty field(s)";

       }

    }

  function client_profile(){

    echo $currentID = $_SESSION['ID'];

    global $wpdb;

      $results = $wpdb -> get_row("SELECT * FROM wp_user_details WHERE ID ='$currentID' ");

    echo '

    <!--My Styles-->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

      <div class="w3-container">

       <div class="row">

        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">

          <img class="w3-image w3-card-4" alt="Smiley face" style="margin: 10px;" src="'.get_template_directory_uri().'/assets/img/profile.jpg" width=100% height=120%>

        </div>
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
        </div>

        <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
              <h3><u>Profile Info</u></h3><br>
                <p>
                  Name: '. $results->userName. '
                  <br><br>
                </p>
                <p>
                  Email: '. $results->email.'
                  <br><br>
                </p>
                <p>
                  Phone: 0'. $results->phone.'
                  <br><br>
                </p>

        </div>

      <br><br>

      <!--Navigation bar with w3.css-->

        <div class="w3-bar w3-light-grey w3-border w3-large w3-card-4">

          <button style="text-decoration: none; " class="w3-bar-item w3-button w3-hover-grey w3-text-black w3-hover-text-grey w3-padding-16">Update Profile</button>

          <button style="text-decoration: none;" class="w3-bar-item w3-button w3-hover-grey w3-text-black w3-hover-text-grey w3-padding-16">Show History</button>

        </div>
        <br><br><br>
      <div class="w3-container w3-light-grey w3-card-4 w3-block">

          <br>
          <h2>Update Personal Info</h2>

        <!--Form with w3.css-->

      <form class="w3-container w3-light-grey" action="" method="POST" enctype="multipart/form-data">


        <p><label>Image</label>

        <input class="w3-input w3-border" name="update_userImage" type="file"></p>



        <!--Using row padding-->
        <div class="w3-row">

          <div class="w3-third" style="margin-right:200px">

            <p><label>First Name</label>

              <input class="w3-input w3-border" style="color:black" type="text" value = "" name="update_firstName" placeholder="First Name" ></p>

          </div>



          <div class="w3-third">

            <p><label>Last Name</label>

              <input class="w3-input w3-border" style="color:black" type="text" name="update_lastName" value = ""></p>

          </div>

        </div>

        <p><label>Email</label>

        <input class="w3-input w3-border" type="email" value = " '. $results->email.' "  name="update_email" ></p>



        <p><label>Phone Number</label>

        <input class="w3-input w3-border" style="color:black" type="text" value = " '. $results->phone.' " name="update_phone" ></p>



        <p><label>Password</label>

        <input class="w3-input w3-border" style="color:black" type="password" name="password_update_1" placeholder="Change Password"></p>


        <p><label>Confirm Password</label>

        <input class="w3-input w3-border" style="color:black" type="password" name="password_update_2" placeholder="Confirm New Password"></p>

        <input type="hidden" value = " '. $results->ID.' " name="user_id" >

    <br>

        <!--Submit button-->

      <p><button type="submit" class="w3-btn w3-ripple w3-text-white" style="background-color:maroon" name="update_profile">&#10004; Submit</button></p>

      </form>
    </div>


    </div>
    ';
    exit;
  }

  function show_reg_log_form(){
    echo '
      <!--My Styles-->
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

<div class="w3-container container">

  <div class="row" style="margin-top: 0px">

      <div class="col-md-7 mx-auto">

        <div class="card card-body mt-5 " style="text-align: center;">

            <div class="form-group">
               <img class="img" src="'.get_template_directory_uri().'/assets/img/logoc.png" width="200px" height="auto" alt="" >
            </div>
          <form action="" method="POST" name="myForm" class="login_form" >

              <hr>

            <div class="form-group" ng-show="edit">
<!--
              <label for="userName"><b>User Name:</b></label>
-->
              <input type="email" name="login_email"  ng-model="email" placeholder="Email" class="form-control form-control-lg" value="" required>

            </div>

            <div class="form-group" ng-show="edit">
<!--
              <label for="password"><b>Password</b></label>
-->
              <input type="password" name="login_password" ng-model="passw1" placeholder="Password" class="form-control form-control-lg <?php echo (!empty($password_err)) ? \'is-invalid\' : \'\'; ?>" value="" required>

            </div>

            <div class="form-group" ng-show="edit">

              <input type="submit" class="form-control form-control-lg w3-btn w3-block w3-large w3-text-white"  name="login_user" value="Login" style="background-color: #800000">

            </div>

            <p>
            <br>
              <a class="create_account" >Don\'t have an account? <span style="color:red">Create Account</span></a>
            </p>
            <br><br><br><br>


          </form>

          <!--Form for Registration-->
          <form action="" method="POST" class="registration_form w3-container" >

              <hr>
            <div class="form-group" ng-show="edit">

              <label for="surname" style="float: left"><b>Surname:</b></label>

              <input type="text" name="surname"  ng-model="surname" placeholder="Surname" class="form-control form-control-lg" value="" required>

            </div>


            <div class="form-group" ng-show="edit">

              <label for="firstName" style="float: left"><b>First Name(s):</b></label>

              <input type="text" name="firstName"  ng-model="firstName" placeholder="First Name(s)" class="form-control form-control-lg" value="" required>

            </div>

            <div class="form-group" ng-show="edit">

              <label for="phone" style="float: left"><b>Mobile Number:</b></label>

              <input type="text" name="phone"  ng-model="phone" placeholder="Mobile Number" class="form-control form-control-lg" value="" required>

            </div>

            <div class="form-group" ng-show="edit">

              <label for="email" style="float: left"><b>Email Adress:</b></label>

              <input type="email" name="email"  ng-model="email" placeholder="Email Adress" class="form-control form-control-lg" value="" required>

            </div>

            <div class="form-group" ng-show="edit">

              <label for="linkedInURL" style="float: left"><b>Please add your LinkedIn url:</b></label>

              <input type="text" name="linkedInURL"  ng-model="linkedInURL" placeholder="linkedInURL" class="form-control form-control-lg" value="" required>

            </div>

            <div class="form-group" ng-show="edit" style="text-align:left">

              <label for="gender" style="float: left"><b>Gender:</b></label><br>
              <p></p>
              <p>
              <input class="w3-radio" type="radio" name="gender" value="male" checked>
              <label>Male</label></p>
              <p>
              <input class="w3-radio" type="radio" name="gender" value="female">
              <label>Female</label></p>
              <p>
              <input class="w3-radio" type="radio" name="gender" value="" disabled>
              <label>Don\'t know (Disabled)</label></p>

            </div>


            <div class="form-group" ng-show="edit">

              <label for="nationality" style="float: left"><b>Nationality</b></label>

              <select class="w3-select w3-border" name="nationality">
                <option value="" disabled selected>Choose your Nationality</option>
                <option value="Afghanistan">Afghanistan</option>
                                      <option value="Åland Islands">Åland Islands</option>
                                      <option value="Albania">Albania</option>
                                      <option value="Algeria">Algeria</option>
                                      <option value="American Samoa">American Samoa</option>
                                      <option value="Andorra">Andorra</option>
                                      <option value="Angola">Angola</option>
                                      <option value="Anguilla">Anguilla</option>
                                      <option value="Antarctica">Antarctica</option>
                                      <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                      <option value="Argentina">Argentina</option>
                                      <option value="Armenia">Armenia</option>
                                      <option value="Aruba">Aruba</option>
                                      <option value="Australia">Australia</option>
                                      <option value="Austria">Austria</option>
                                      <option value="Azerbaijan">Azerbaijan</option>
                                      <option value="Bahamas">Bahamas</option>
                                      <option value="Bahrain">Bahrain</option>
                                      <option value="Bangladesh">Bangladesh</option>
                                      <option value="Barbados">Barbados</option>
                                      <option value="Belarus">Belarus</option>
                                      <option value="Belgium">Belgium</option>
                                      <option value="Belize">Belize</option>
                                      <option value="Benin">Benin</option>
                                      <option value="Bermuda">Bermuda</option>
                                      <option value="Bhutan">Bhutan</option>
                                      <option value="Bolivia">Bolivia</option>
                                      <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                      <option value="Botswana">Botswana</option>
                                      <option value="Bouvet Island">Bouvet Island</option>
                                      <option value="Brazil">Brazil</option>
                                      <option value="British Indian Ocean Territory">British Indian Ocean Territory
                                      </option>
                                      <option value="Brunei Darussalam">Brunei Darussalam</option>
                                      <option value="Bulgaria">Bulgaria</option>
                                      <option value="Burkina Faso">Burkina Faso</option>
                                      <option value="Burundi">Burundi</option>
                                      <option value="Cambodia">Cambodia</option>
                                      <option value="Cameroon">Cameroon</option>
                                      <option value="Canada">Canada</option>
                                      <option value="Cape Verde">Cape Verde</option>
                                      <option value="Cayman Islands">Cayman Islands</option>
                                      <option value="Central African Republic">Central African Republic</option>
                                      <option value="Chad">Chad</option>
                                      <option value="Chile">Chile</option>
                                      <option value="China">China</option>
                                      <option value="Christmas Island">Christmas Island</option>
                                      <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                      <option value="Colombia">Colombia</option>
                                      <option value="Comoros">Comoros</option>
                                      <option value="Congo">Congo</option>
                                      <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic
                                          of The</option>
                                      <option value="Cook Islands">Cook Islands</option>
                                      <option value="Costa Rica">Costa Rica</option>
                                      <option value="Cote D\'ivoire">Cote D\'ivoire</option>
                                      <option value="Croatia">Croatia</option>
                                      <option value="Cuba">Cuba</option>
                                      <option value="Cyprus">Cyprus</option>
                                      <option value="Czech Republic">Czech Republic</option>
                                      <option value="Denmark">Denmark</option>
                                      <option value="Djibouti">Djibouti</option>
                                      <option value="Dominica">Dominica</option>
                                      <option value="Dominican Republic">Dominican Republic</option>
                                      <option value="Ecuador">Ecuador</option>
                                      <option value="Egypt">Egypt</option>
                                      <option value="El Salvador">El Salvador</option>
                                      <option value="Equatorial Guinea">Equatorial Guinea</option>
                                      <option value="Eritrea">Eritrea</option>
                                      <option value="Estonia">Estonia</option>
                                      <option value="Ethiopia">Ethiopia</option>
                                      <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                                      <option value="Faroe Islands">Faroe Islands</option>
                                      <option value="Fiji">Fiji</option>
                                      <option value="Finland">Finland</option>
                                      <option value="France">France</option>
                                      <option value="French Guiana">French Guiana</option>
                                      <option value="French Polynesia">French Polynesia</option>
                                      <option value="French Southern Territories">French Southern Territories</option>
                                      <option value="Gabon">Gabon</option>
                                      <option value="Gambia">Gambia</option>
                                      <option value="Georgia">Georgia</option>
                                      <option value="Germany">Germany</option>
                                      <option value="Ghana">Ghana</option>
                                      <option value="Gibraltar">Gibraltar</option>
                                      <option value="Greece">Greece</option>
                                      <option value="Greenland">Greenland</option>
                                      <option value="Grenada">Grenada</option>
                                      <option value="Guadeloupe">Guadeloupe</option>
                                      <option value="Guam">Guam</option>
                                      <option value="Guatemala">Guatemala</option>
                                      <option value="Guernsey">Guernsey</option>
                                      <option value="Guinea">Guinea</option>
                                      <option value="Guinea-bissau">Guinea-bissau</option>
                                      <option value="Guyana">Guyana</option>
                                      <option value="Haiti">Haiti</option>
                                      <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands
                                      </option>
                                      <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                                      <option value="Honduras">Honduras</option>
                                      <option value="Hong Kong">Hong Kong</option>
                                      <option value="Hungary">Hungary</option>
                                      <option value="Iceland">Iceland</option>
                                      <option value="India">India</option>
                                      <option value="Indonesia">Indonesia</option>
                                      <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                                      <option value="Iraq">Iraq</option>
                                      <option value="Ireland">Ireland</option>
                                      <option value="Isle of Man">Isle of Man</option>
                                      <option value="Israel">Israel</option>
                                      <option value="Italy">Italy</option>
                                      <option value="Jamaica">Jamaica</option>
                                      <option value="Japan">Japan</option>
                                      <option value="Jersey">Jersey</option>
                                      <option value="Jordan">Jordan</option>
                                      <option value="Kazakhstan">Kazakhstan</option>
                                      <option value="Kenya">Kenya</option>
                                      <option value="Kiribati">Kiribati</option>
                                      <option value="Korea, Democratic People\'s Republic of">Korea, Democratic People\'s
                                          Republic of</option>
                                      <option value="Korea, Republic of">Korea, Republic of</option>
                                      <option value="Kuwait">Kuwait</option>
                                      <option value="Kyrgyzstan">Kyrgyzstan</option>
                                      <option value="Lao People\'s Democratic Republic">Lao People\'s Democratic Republic
                                      </option>
                                      <option value="Latvia">Latvia</option>
                                      <option value="Lebanon">Lebanon</option>
                                      <option value="Lesotho">Lesotho</option>
                                      <option value="Liberia">Liberia</option>
                                      <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                      <option value="Liechtenstein">Liechtenstein</option>
                                      <option value="Lithuania">Lithuania</option>
                                      <option value="Luxembourg">Luxembourg</option>
                                      <option value="Macao">Macao</option>
                                      <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former
                                          Yugoslav Republic of</option>
                                      <option value="Madagascar">Madagascar</option>
                                      <option value="Malawi">Malawi</option>
                                      <option value="Malaysia">Malaysia</option>
                                      <option value="Maldives">Maldives</option>
                                      <option value="Mali">Mali</option>
                                      <option value="Malta">Malta</option>
                                      <option value="Marshall Islands">Marshall Islands</option>
                                      <option value="Martinique">Martinique</option>
                                      <option value="Mauritania">Mauritania</option>
                                      <option value="Mauritius">Mauritius</option>
                                      <option value="Mayotte">Mayotte</option>
                                      <option value="Mexico">Mexico</option>
                                      <option value="Micronesia, Federated States of">Micronesia, Federated States of
                                      </option>
                                      <option value="Moldova, Republic of">Moldova, Republic of</option>
                                      <option value="Monaco">Monaco</option>
                                      <option value="Mongolia">Mongolia</option>
                                      <option value="Montenegro">Montenegro</option>
                                      <option value="Montserrat">Montserrat</option>
                                      <option value="Morocco">Morocco</option>
                                      <option value="Mozambique">Mozambique</option>
                                      <option value="Myanmar">Myanmar</option>
                                      <option value="Namibia">Namibia</option>
                                      <option value="Nauru">Nauru</option>
                                      <option value="Nepal">Nepal</option>
                                      <option value="Netherlands">Netherlands</option>
                                      <option value="Netherlands Antilles">Netherlands Antilles</option>
                                      <option value="New Caledonia">New Caledonia</option>
                                      <option value="New Zealand">New Zealand</option>
                                      <option value="Nicaragua">Nicaragua</option>
                                      <option value="Niger">Niger</option>
                                      <option value="Nigeria">Nigeria</option>
                                      <option value="Niue">Niue</option>
                                      <option value="Norfolk Island">Norfolk Island</option>
                                      <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                      <option value="Norway">Norway</option>
                                      <option value="Oman">Oman</option>
                                      <option value="Pakistan">Pakistan</option>
                                      <option value="Palau">Palau</option>
                                      <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied
                                      </option>
                                      <option value="Panama">Panama</option>
                                      <option value="Papua New Guinea">Papua New Guinea</option>
                                      <option value="Paraguay">Paraguay</option>
                                      <option value="Peru">Peru</option>
                                      <option value="Philippines">Philippines</option>
                                      <option value="Pitcairn">Pitcairn</option>
                                      <option value="Poland">Poland</option>
                                      <option value="Portugal">Portugal</option>
                                      <option value="Puerto Rico">Puerto Rico</option>
                                      <option value="Qatar">Qatar</option>
                                      <option value="Reunion">Reunion</option>
                                      <option value="Romania">Romania</option>
                                      <option value="Russian Federation">Russian Federation</option>
                                      <option value="Rwanda">Rwanda</option>
                                      <option value="Saint Helena">Saint Helena</option>
                                      <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                      <option value="Saint Lucia">Saint Lucia</option>
                                      <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                      <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines
                                      </option>
                                      <option value="Samoa">Samoa</option>
                                      <option value="San Marino">San Marino</option>
                                      <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                      <option value="Saudi Arabia">Saudi Arabia</option>
                                      <option value="Senegal">Senegal</option>
                                      <option value="Serbia">Serbia</option>
                                      <option value="Seychelles">Seychelles</option>
                                      <option value="Sierra Leone">Sierra Leone</option>
                                      <option value="Singapore">Singapore</option>
                                      <option value="Slovakia">Slovakia</option>
                                      <option value="Slovenia">Slovenia</option>
                                      <option value="Solomon Islands">Solomon Islands</option>
                                      <option value="Somalia">Somalia</option>
                                      <option value="South Africa">South Africa</option>
                                      <option value="South Georgia and The South Sandwich Islands">South Georgia and The
                                          South Sandwich Islands</option>
                                      <option value="Spain">Spain</option>
                                      <option value="Sri Lanka">Sri Lanka</option>
                                      <option value="Sudan">Sudan</option>
                                      <option value="Suriname">Suriname</option>
                                      <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                      <option value="Swaziland">Swaziland</option>
                                      <option value="Sweden">Sweden</option>
                                      <option value="Switzerland">Switzerland</option>
                                      <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                      <option value="Taiwan, Province of China">Taiwan, Province of China</option>
                                      <option value="Tajikistan">Tajikistan</option>
                                      <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                                      <option value="Thailand">Thailand</option>
                                      <option value="Timor-leste">Timor-leste</option>
                                      <option value="Togo">Togo</option>
                                      <option value="Tokelau">Tokelau</option>
                                      <option value="Tonga">Tonga</option>
                                      <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                      <option value="Tunisia">Tunisia</option>
                                      <option value="Turkey">Turkey</option>
                                      <option value="Turkmenistan">Turkmenistan</option>
                                      <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                      <option value="Tuvalu">Tuvalu</option>
                                      <option value="Uganda">Uganda</option>
                                      <option value="Ukraine">Ukraine</option>
                                      <option value="United Arab Emirates">United Arab Emirates</option>
                                      <option value="United Kingdom">United Kingdom</option>
                                      <option value="United States">United States</option>
                                      <option value="United States Minor Outlying Islands">United States Minor Outlying
                                          Islands</option>
                                      <option value="Uruguay">Uruguay</option>
                                      <option value="Uzbekistan">Uzbekistan</option>
                                      <option value="Vanuatu">Vanuatu</option>
                                      <option value="Venezuela">Venezuela</option>
                                      <option value="Viet Nam">Viet Nam</option>
                                      <option value="Virgin Islands, British">Virgin Islands, British</option>
                                      <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                                      <option value="Wallis and Futuna">Wallis and Futuna</option>
                                      <option value="Western Sahara">Western Sahara</option>
                                      <option value="Yemen">Yemen</option>
                                      <option value="Zambia">Zambia</option>
                                      <option value="Zimbabwe">Zimbabwe</option>
              </select>

            </div>


            <div class="form-group" ng-show="edit">

              <label for="password_1" style="float: left"><b>Password</b></label>

              <input type="password" name="password_1" ng-model="password_1" placeholder="Password" class="form-control form-control-lg <?php echo (!empty($password_err)) ? \'is-invalid\' : \'\'; ?>" value="" required>

            </div>

            <div class="form-group" ng-show="edit">

              <label for="password_2" style="float: left"><b>Confirm Password</b></label>

              <input type="password" name="password_2" ng-model="password_2" placeholder="Confirm Password" class="form-control form-control-lg <?php echo (!empty($password_err)) ? \'is-invalid\' : \'\'; ?>" required>

            </div>

            <div class="form-group" ng-show="edit">

              <label for="focusGroup" style="float: left">
                    <b>What focus group are you passionate about?* (You can select more than one.)</b>
              </label>


              <p style="text-align: left">
                <input class="w3-check" type="checkbox" name="focus_group[]" value="Children">
                <label> Children</label></p>

                <p style="text-align: left">
                <input class="w3-check" type="checkbox" name="focus_group[]" value="Environment">
                <label> Environment</label></p>

                <p style="text-align: left" name="focus_group[]" value="Men">
                <input class="w3-check" type="checkbox">
                <label> Men</label></p>

                <p style="text-align: left" name="focus_group[]" value="Women">
                <input class="w3-check" type="checkbox">
                <label> Women</label></p>

                <p style="text-align: left" name="focus_group[]" value="Wildlife/Animals">
                <input class="w3-check" type="checkbox">
                <label> Wildlife/Animals</label></p>

                <p style="text-align: left">
                <input class="w3-check" type="checkbox" name="focus_group[]" value="Water">
                <label> Water</label></p>

                <p style="text-align: left">
                <input class="w3-check" type="checkbox" name="focus_group[]" value="Youth">
                <label> Youth</label></p>

                <p style="text-align: left">
                <input class="w3-check" type="checkbox" name="focus_group[]" value="other_focus_groups">
                <label> Others</label></p>

            </div>

            <div class="form-group" ng-show="edit">

              <label for="pass
              ionate_causes" style="float: left">
                    <b>What causes are you passionate about?*(You can select more than one.)</b>
              </label>
              <br>

                <p style="text-align: left"></p>

                <p style="text-align: left">
                <input class="w3-check" type="checkbox" name="passionate_causes[]" value="advocacy_and_human_rights">
                <label> Advocacy and Human Rights</label></p>

                <p style="text-align: left">
                <input class="w3-check" type="checkbox" name="passionate_causes[]" value="animal_welfare">
                <label> Animal Welfare</label></p>

                <p style="text-align: left" name="passionate_causes[]" value="board_development">
                <input class="w3-check" type="checkbox">
                <label> Board Development</label></p>

                <p style="text-align: left" name="passionate_causes[]" value="disaster_relief">
                <input class="w3-check" type="checkbox">
                <label> Disaster Relief</label></p>

                <p style="text-align: left">
                <input class="w3-check" type="checkbox" name="passionate_causes[]" value="education">
                <label> Education</label></p>

                <p style="text-align: left">
                <input class="w3-check" type="checkbox" name="passionate_causes[]" value="environment">
                <label> Environment</label></p>

                <p style="text-align: left">
                <input class="w3-check" type="checkbox" name="passionate_causes[]" value="food_and_nutrition">
                <label> Food and Nutrition</label></p>

                <p style="text-align: left">
                <input class="w3-check" type="checkbox" name="passionate_causes[]" value="fundraising">
                <label> Fundraising</label></p>

                <p style="text-align: left">
                <input class="w3-check" type="checkbox" name="passionate_causes[]" value="health">
                <label> Health</label></p>

                <p style="text-align: left">
                <input class="w3-check" type="checkbox" name="passionate_causes[]" value="immigration_and_refugees">
                <label> Immigration and Refugees</label></p>

                <p style="text-align: left">
                <input class="w3-check" type="checkbox" name="passionate_causes[]" value="libraries">
                <label> Libraries</label></p>

                <p style="text-align: left">
                <input class="w3-check" type="checkbox" name="passionate_causes[]" value="Military/Police">
                <label> Military/Police</label></p>

                <p style="text-align: left">
                <input class="w3-check" type="checkbox" name="passionate_causes[]" value="people_with-disabilities">
                <label> People with Disabilities</label></p>

                <p style="text-align: left">
                <input class="w3-check" type="checkbox" name="passionate_causes[]" value="prisons">
                <label> Prisons</label></p>

                <p style="text-align: left">
                <input class="w3-check" type="checkbox" name="passionate_causes[]" value="water_bodies">
                <label> Water Bodies</label></p>

                <p style="text-align: left">
                <input class="w3-check" type="checkbox" name="passionate_causes[]" value="youth_development">
                <label> Youth Development</label></p>

                <p style="text-align: left">
                <input class="w3-check" type="checkbox" name="passionate_causes[]" value="other_passion_causes">
                <label> Others</label></p>

            </div>

            <div class="form-group" ng-show="edit">

              <label for="focusGroup" style="float: left">
                    <b>What location do you prefer to volunteer at?*(You can select more than one.)</b>
              </label>
              <br>
                <p style="text-align: left"></p>

                <p style="text-align: left">
                <input class="w3-check" type="checkbox" name="partner_locations[]" value="onsite_partner_location">
                <label> Onsite at a Nonprofit partner location</label></p>

                <p style="text-align: left">
                <input class="w3-check" type="checkbox" name="partner_locations[]" value="virtual_partner_location">
                <label> Virtually on a phone call or WhatsApp or Skype (Work from any location)</label></p>

                <p style="text-align: left" name="partner_locations[]" value="offsite_partner_location">
                <input class="w3-check" type="checkbox">
                <label> Offsite at an agreed location</label></p>

                <p style="text-align: left" name="partner_locations[]" value="all_onsite_virtual_offsite">
                <input class="w3-check" type="checkbox">
                <label> All Onsite/Virtual/Offsite</label></p>

                <p style="text-align: left">
                <input class="w3-check" type="checkbox" name="partner_locations[]" value="other_partner_locations">
                <label> Others</label></p>

            </div>

            <div class="form-group" ng-show="edit">

              <label for="focusGroup" style="float: left">
                    <b>Any additional questions or comments?</b>
              </label>
              <br>
              <div style="text-align: left">
                <input class="w3-input w3-border" name="" value="" type="text" placeholder="Additional comments">
              </div>

            </div>


            <div class="form-group">

                <input type="submit" name="client_registration_form" value="Sign Up" class="form-control form-control-lg w3-btn w3-block w3-large w3-text-white" style="background-color: #800000" >

            </div>
            <p>
              <a class="login_account">Already have an account? <span style="color: red">Click to Log in</span></a>
            </p>
            <br><br><br><br>


          </form>

        </div>

      </div>

    </div>
  </div>
    ';

  }

  // if (isset($_SESSION["client_id"])) {
  //   $client_id = $_SESSION["client_id"];
  //   client_profile($client_id);
  // }

  if (!isset($_SESSION["client_id"])) {
    show_reg_log_form();
  }
  get_footer();

 ?>

  <script>
    jQuery('.login_form').show();
    jQuery('.create_account').show();
    jQuery('.login_account').hide();
    jQuery('.registration_form').hide();

    jQuery(document).ready(function($) {
      jQuery('.create_account').on("click", function(){
        jQuery('.login_form').hide();
        jQuery('.create_account').hide();
        jQuery('.registration_form').show();
        jQuery('.login_account').show();
      });

      jQuery('.login_account').on("click", function(){
        jQuery('.login_form').show();
        jQuery('.create_account').show();
        jQuery('.registration_form').hide();
        jQuery('.login_account').hide();
      });

    });

  </script>
