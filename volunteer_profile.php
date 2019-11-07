<?php
session_start();
class data{
    
//Volunteer Login
  function Volunteer_login($email_login,$password_login){
     if(!empty($email_login)||!empty($password_login)){
       global $wpdb;
       $user_login_credentials = $wpdb -> get_row("SELECT * FROM wp_user_details WHERE email ='{$email_login}' AND pass ='{$password_login}' ");
       
      if($user_login_credentials -> status_binary != 'active'){
          echo"Activate Your account";
      }else{
          $_SESSION['email'] =$user_login_credentials->ID;
          echo"Welcome {$user_login_credentials->username}";
      }
     }else{
         echo"There are empty field(s)";
     }
  }
//Volunteer SignUp
      function Volunteer_signUp($username,$email,$pass,$con_pass,$gender,$dob,$nationality){
          global $wpdb;
         $code = rand(0,1000000000);
            if(!empty($username)||!empty($email)||!empty($pass)||!empty($con_pass)||!empty($gender)||!empty($dob)||!empty($nationality)){
                if($pass == $con_pass){
                    $result = $wpdb->insert(
                           'wp_user_details',
                           array(
                                   'username' => $username,
                                   'pass' => $pass,
                                   'email' => $email,
                                   'gender' => $gender,
                                   'dob' => $dob,
                                   'nationality'=> $nationality,
                                   'code' => $code 
                                 )
                    );
                    if (!$result) {
                        echo"error";
                        
                    }else{
                        
                        $link = "http://localhost/voluculture/volunteer-application?id=$code&user=$username";
                        $subject ="VOLUCULTURE REGISTRATION";
                        $body = "<div style='text-align:center'><h3> Hi <b class='color:blue'>$username</b> you have succesfully Registered with Voluculture.We are glad to begging this journey with you, use the code below to activate your account.Welcome to Voluculture where volunteering is appreciated.</h3>
                        <p>$code<hr></p>
                        <div style='inline-block'><a href='$link'><button style='background-color:orange; color:black'>Click to login</button></a></div>
                        ";
                        $headers = array('Content-Type: text/html; charset=UTF-8');
                 
                        wp_mail($email,$subject,$body,$headers); 
                       echo "registration done";
                    }
                    
                }else{
                    echo"password do not match";
                }
            
            }else{
                echo"Empty field";
            }
            
        }
        //Volunteer Password Recovery
            function Volunteer_recover_password($email){
                global $wpdb;
                
         $code = rand(0,1000);
               $res = $wpdb -> update('wp_user_details',array('pass'=>$code),array("email"=>$email));
               if($res){
                $link = "http://localhost/voluculture/volunteer-application?id=$code";
                $subject ="VOLUCULTURE Password Update";
                $body = "<div style='text-align:center'><h3>Password Updated</h3>
                <p>$code<hr></p>
                ";
                $headers = array('Content-Type: text/html; charset=UTF-8');
         
                wp_mail($email,$subject,$body,$headers); 
               echo "registration done";
                
               }
            }
              
              
              //Volunteer Update Profile
                function Volunteer_update_profile(){}
                    
                    //Volunteer Application
                    function Volunteer_verification($code,$name){
             
                        global $wpdb;
                        $result = $wpdb->update('wp_user_details',array("status_binary" => 'active'),array("code"=>$code));
                   
                        if(!$result){
                            echo"<script>alert('Account Not activated')</script>";
                        }else{
                          
                            echo"<script>alert('Hey {$name} your account has been activated')</script>";
    
                        }
                    }
                    
                    //Volunteer show profile
                    function Volunteer_show_profile($email){
                        global $wpdb;
                        $user_details = $wpdb -> get_row("SELECT * FROM wp_user_details WHERE email ='{$email}' ");
                        echo "{$user_details->email} , {$user_details->username} , {$user_details->nationality}";
                    }
                    //Volunteer Application
                    function Volunteer_Application($username,$email,$ngo_project_id,$ngo_project_name){
                        global wpdb;
                        $result = $wpdb -> insert('wp_project_applications',array(
                           'email' => $email,
                           'project_id' => $ngo_project_id,
                           'project_name' => $ngo_project_name
                        ));
                        if(!$result){
                            echo"Project Not Applied";
                        }else{
                            echo"{$username} your application to {$ngo_project_name} was recieved";
                        }
                    }
                        
    
}
?>