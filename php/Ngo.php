<?php
session_start();
class Ngodetails 
{
global $wpdb;
    function ngo_login($Ngo_email,$Ngo_password){
    $result = $wpdb->get_row("SELECT * FROM  wp_ngo_details WHERE ngo_email = {$Ngo_email} AND ngo_password = {$Ngo_password}");
    
    if($result-> ngo_status != "active"){
 
        echo"Hey {$result->ngo_name} please activate your account through the email you registered with";

    }elseif($result-> ngo_status == "active"){

      $_SESSION['NGO_ID'] = $result->ID;

        echo"Hey {$result->ngo_name} welcome to voluculture";
    }
    
    }


    function ngo_signup($Ngo_email,$Ngo_name,$ngo_country,$Ngo_password,$Ngo_password_confirm){
$code = rand(2000000000,4000000000);
 if($Ngo_password != $Ngo_password_confirm){
            echo"Password do not match";
        }else{
            $result = $wpdb->insert('wp_ngo_details',array(

                'ngo_email'=> $Ngo_email,
                'ngo_name'=>$Ngo_name,
                'ngo_country'=>$ngo_country,
                'ngo_password' =>$Ngo_password,
                'ngo_code' => $code


            ));

            if(!$result){
                echo"Not registered with voluculture";
            }
            else{


                $link = "http://localhost/voluculture/volunteer-application?id=$code&user=$Ngo_name";
                $subject ="VOLUCULTURE NGO REGISTRATION";
                $body = "<div style='text-align:center'><h3> Hi <b class='color:blue'>$Ngo_name</b> you have succesfully Registered with Voluculture.We are glad to begging this journey with you, use the code below to activate your account.Welcome to Voluculture where volunteering is appreciated.</h3>
                <p>$code<hr></p>
                <div style='inline-block'><a href='$link'><button style='background-color:orange; color:black'>Click to login</button></a></div>
                ";
                $headers = array('Content-Type: text/html; charset=UTF-8');
         
                wp_mail($email,$subject,$body,$headers); 
                echo"Registered with voluculture";

            }
        }

    }

function Ngo_verification($code,$name){
   $result = $wpdb->update('wp_ngo_details',array(
        'ngo_status'=>"Active"
    ),array(
        'ngo_code'=>$code
    ));
    if($result){
        echo"Hey {$name} your account has been verified";
    }else{
        echo"Account not verified";
    }
}

    
}


?>