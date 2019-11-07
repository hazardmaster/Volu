<?php
session_start();
class data{
    
//Volunteer Login
    function Volunteer_login($email_login,$password_login){
 if(!empty($email_login)&&!empty($password_login)){
    
 global $wpdb;
 $user_login_credentials = $wpdb -> get_row("SELECT * FROM wp_user_details WHERE email ='{$email_login}' AND pass ='{$password_login}' ");
 

if($user_login_credentials -> status_binary != 'active'){
    echo"<div id='display_error' style='background-color:lightblue'><h3 style='text-align:center'>Check your email to activate</h3></div>";

}else{

    $_SESSION['id'] =$user_login_credentials->ID;


//we will use to redirect

    echo"Welcome {$user_login_credentials->username}";
}

 }else{
    echo"<div id='display_error' style='background-color:lightblue'><h3 style='text-align:center'>There Is an Error with your Registration</h3></div>";
                        echo"<script>
                        
                        $(document).ready(function(){
                            $('#display_error').fadeOut(2000);
                        });
                        
                        </script>";
                         }

    }

//Volunteer SignUp
        function Volunteer_signUp($volunteer_email,$volunteer_username,$volunteer_phone_number,$volunteer_linkedln_url,$volunteer_gender,$volunteer_focus_group,$volunteer_passion,$volunteer_location,$comments,$volunteer_password,$volunteer_confirm_password){

            global $wpdb;

//random code to activate
         $code = rand(0,1000000000);

            if(!empty($volunteer_email)&&!empty($volunteer_username)&&!empty($volunteer_phone_number)&&!empty($volunteer_linkedln_url)&&!empty($volunteer_gender)&&!empty($volunteer_focus_group)&&!empty($volunteer_passion)&&!empty($volunteer_location)&&!empty($volunteer_password)&&!empty($volunteer_confirm_password)){


                if($volunteer_password == $volunteer_confirm_password){


                    $result = $wpdb->insert(
                           'wp_user_details',
                           array(
                                   'username' => $volunteer_username,
                                   'email' => $volunteer_email,
                                   'phone' => $volunteer_phone_number,
                                   'linkedln' => $volunteer_linkedln_url,
                                   'gender' => $volunteer_gender,
                                   'focus_group' =>  $volunteer_focus_group,
                                   'passion'=>$volunteer_passion,
                                   'location' => $volunteer_location,
                                   'password' => $volunteer_password,
                                   'code' => $code,
                                   'comments' =>  $comments
                                 )
                    );
                    if (!$result) {
                        echo"<div id='display_error' style='background-color:lightblue'><h3 style='text-align:center'>There Is an Error with your Registration</h3></div>";
                        echo"<script>
                        
                        $(document).ready(function(){
                            $('#display_error').fadeOut(2000);
                        });
                        
                        </script>";
                        
                    }else{
                        
                        $link = "http://localhost/voluculture/volunteer-application?id=$code&user=$volunteer_username";
                        $subject ="VOLUCULTURE REGISTRATION";
                        $body = "<div style='text-align:center'><h3> Hi <b class='color:blue'>$volunteer_username</b> you have succesfully Registered with Voluculture.We are glad to begging this journey with you, use the code below to activate your account.Welcome to Voluculture where volunteering is appreciated.</h3>
                        <p>$code<hr></p>
                        <div style='inline-block'><a href='$link'><button style='background-color:orange; color:black'>Click to login</button></a></div>
                        ";
                        $headers = array('Content-Type: text/html; charset=UTF-8');
                 
                        wp_mail($email,$subject,$body,$headers); 
                       //echo "registration done";
                    }
                    
                }else{
                    echo"<div id='display_error' style='background-color:lightblue'><h3 style='text-align:center'> password do not match </h3></div>";
                    echo"<script>
                    
                    $(document).ready(function(){
                        $('#display_error').fadeOut(2000);
                    });
                    
                    </script>";


                }

            


            }else{
    
                echo"<div id='display_error' style='background-color:lightblue'><h3 style='text-align:center'>There are empty field(s)</h3></div>";
                echo"<script>
                
                $(document).ready(function(){
                    $('#display_error').fadeOut(2000);
                });
                
                </script>";

    
    
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
                      
                            echo"<div id='display_error' style='background-color:lightblue'><h3 style='text-align:center'>There Is an Error with your Activation</h3></div>";
                            echo"<script>
                            
                            $(document).ready(function(){
                                $('#display_error').fadeOut(2000);
                            });
                            
                            </script>";
                          
                        }else{
                            echo"<div id='display_success' style='background-color:lightgreen'><h3 style='text-align:center'>Hi {$name} you have activated your account login to continue</h3></div>";
                        echo"<script>
                        
                        $(document).ready(function(){
                            $('#display_error').fadeOut(2000);
                        });
                        
                        </script>";
                      
    
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
                     global $wpdb;
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