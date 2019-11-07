<?php

session_start();
ob_start();

class Ngodetails

{

//global $wpdb;

 function ngo_login($Ngo_email,$Ngo_password){
    global $wpdb;
    $result = $wpdb->get_row("SELECT * FROM  wp_ngo_details WHERE ngo_email = '$Ngo_email' AND ngo_password = '$Ngo_password'");


    if($result-> ngo_status != "Active"){


        echo"Hey {$result->ngo_name} please activate your account through the email you registered with";


    }elseif($result-> ngo_status == "Active"){



      $_SESSION['NGO_ID'] = $result->ID;
        echo"Hey {$result->ngo_name} welcome to voluculture";

        $_SESSION['ngo_profile_set'] = $result-> ngo_profile_set;
        $_SESSION['ngo_email'] = $result-> ngo_email;
        $_SESSION['ngo_opportunity_set_yn'] = $result-> ngo_opportunity_set_yn;
        $_SESSION['ngo_activity_set_yn'] = $result-> ngo_activity_set_yn;
        //$email = $_SESSION['ngo_email'];
        $value = $_SESSION['ngo_profile_set'];

        // echo($value);

         $url = 'http://localhost/voluculture/ngo-profile/';
         wp_redirect($url);
    }



    }





   function ngo_signup($Ngo_email, $Ngo_name,$ngo_country,$Ngo_password,$Ngo_password_confirm){

$code = rand(2000000000,4000000000);
global $wpdb;

 if($Ngo_password != $Ngo_password_confirm){

            echo"Password do not match";

        }else{

            $result = $wpdb->insert('wp_ngo_details',array(



                'ngo_email'=> $Ngo_email,

//      'ngo_username'=> $Ngo_username,

                'ngo_name'=>$Ngo_name,

                'ngo_country'=>$ngo_country,

                'ngo_password' =>$Ngo_password,

                'ngo_code' => $code,

        'ngo_status'=>'notactive'




            ));



            if(!$result){

                echo"Not registered with voluculture";

            }

            else{





                $link = "http://localhost/voluculture/verify/?id=$code&user=$Ngo_name";

                $subject ="VOLUCULTURE NGO REGISTRATION";

                $body = "<div style='text-align:center'><h3> Hi <b class='color:blue'>$Ngo_name</b> We are glad having you on board. Your account have been successfully set up.<br/> Please use the link below to Activate your account.</h3>

                <p>$code<hr></p>

                <div style='inline-block'><a href='$link'><button style='background-color:cyan; color:black'>Click to login</button></a></div>

                ";

                $headers = array('Content-Type: text/html; charset=UTF-8');



                wp_mail($Ngo_email,$subject,$body,$headers);

                echo"Thank you for choosing voluculture. You are Now registered";

          $url = 'http://localhost/voluculture/ngo-verification/';
           wp_redirect($url);
//header("Location: http://localhost/voluculture/index.php/log-in/");
//      exit;

//      echo '<script>window.location.href = " http://localhost/voluculture/index.php/log-in/";</script>';

               // wp_redirect( 'http://localhost/voluculture/index.php/log-in/' );
    //  exit;

         }

        }



    }



function Ngo_verification($code,$Ngo_name){
    global $wpdb;

   $result = $wpdb->update('wp_ngo_details',array(

        'ngo_status'=>"Active"

    ),array(

        'ngo_code'=>$code

    ));

    if($result){

        echo"Hey {$name} your account has been verified";
        $url = 'http://localhost/voluculture/ngo-verification/';
        wp_redirect($url);

    }else{

        echo"Account not verified";
        $url = 'http://localhost/voluculture/ngo-sign-up/';
        wp_redirect($url);

    }

}


//Getting NGO Profile details
function ngo_profile_setup($org_name,$ngo_email,$ngo_org_director,
                            $ngo_fyear,$ngo_address,$ngo_description,
                            $ngo_vision,$ngo_mission,$ngo_we_do,$ngo_we_are
                            ){
     global $wpdb;
                    if(
                        $org_name != '' || $ngo_email != '' || $ngo_org_director != ''||
                        $ngo_fyear != ''|| $ngo_address != ''|| $ngo_description != ''||
                        $ngo_vision != ''|| $ngo_mission != ''||$ngo_we_do != ''|| $ngo_we_are != ''
                      ){
                            $result = $wpdb->insert('wp_ngo_info',array(
                                                                'ngo_email'=>$ngo_email,'org_name'=>$org_name,
                                                                'ngo_org_director'=>$ngo_org_director,'ngo_fyear'=>$ngo_fyear,
                                                                'ngo_address'=>$ngo_address,'ngo_description'=>$ngo_description,
                                                                'ngo_vision'=>$ngo_vision,'ngo_mission'=>$ngo_mission,
                                                                'ngo_we_do'=>$ngo_we_do,'ngo_we_are'=>$ngo_we_are
                                                    ));
                                if(!$result){
                                            echo"Error Posting Your Data";
                                             }
                                    else{
                                            $_SESSION['ngo_profile_set'] = 'Y';

                                        }
                        }
                    else{
                            echo"Please fill all the fields";
                         }

           }
// posting opportunity
function ngo_opportunity_post(
                                $ngo_opp_name, $ngo_opp_description,
                                $ngo_opp_location, $ngo_opp_skills,
                                $ngo_opp_start_date, $ngo_opp_end_date
                            ){
    global $wpdb;
                        if(
                        $ngo_opp_name != '' || $ngo_opp_description != '' ||
                        $ngo_opp_location != '' || $ngo_opp_skills != '' ||
                        $ngo_opp_start_date != '' || $ngo_opp_end_date != ''
                        ){
                                        $result = $wpdb->insert('wp_ngo_opportunity',array(
                                                                'ngo_opp_name'=> $ngo_opp_name,
                                                                 'ngo_email'=> $_SESSION['ngo_email'],
                                                                'ngo_opp_description'=>  $ngo_opp_description,
                                                                'ngo_opp_location'=>  $ngo_opp_location,
                                                                'ngo_opp_skills'=>  $ngo_opp_skills,
                                                                'ngo_opp_start_date'=> $ngo_opp_start_date,
                                                                'ngo_opp_end_date'=> $ngo_opp_end_date
                                                                ));
                                            if(!$result){
                                                        echo"Error Posting Your Opportunity data";
                                                         }
                                                else{
                                                        echo"Oppportunity succesfully Added";

                                                        $_SESSION['ngo_opportunity_set_yn'] = 'Y';
                                                    }
                                    }
                                else{
                                        echo"Please fill all the fields";
                                     }
                            }

    function ngo_activity_post(
                            $ngo_event_name, $ngo_event_location,
                            $ngo_event_description, $ngo_event_start,
                            $ngo_event_end, $ngo_event_start_time,
                            $ngo_event_end_time

                             ){
           global $wpdb;
                                if(
                                    $ngo_event_name != '' || $ngo_event_location != '' ||
                                    $ngo_event_description != '' || $ngo_event_start != '' ||
                                    $ngo_event_end != '' || $ngo_event_start_time != '' ||
                                    $ngo_event_end_time != ''
                                    ){

                                        $result = $wpdb->insert('wp_ngo_activity',array(
                                                                'ngo_event_name'=>  $ngo_event_name,
                                                                'ngo_email' => $_SESSION['ngo_email'],
                                                                'ngo_event_location'=> $ngo_event_location,
                                                                'ngo_event_description'=>  $ngo_event_description,
                                                                'ngo_event_start'=>  $ngo_event_start,
                                                                'ngo_event_end'=> $ngo_event_end,
                                                                'ngo_event_start_time'=> $ngo_event_start_time,
                                                                'ngo_event_end_time'=> $ngo_event_end_time
                                                                ));
                                            if(!$result){
                                                        echo"Error Posting Your Activities data";
                                                        }
                                             else{
                                                      echo"Activities succesfully Added";
                                                      $_SESSION['ngo_activity_set_yn'] = 'Y';
                                                 }
                                    }
                                else{
                                        echo"Please fill all the fields";
                                     }

                         }

        function ngo_contact_post(
                                $ngo_phone,
                                $ngo_address_zip,
                                $ngo_city,
                                $ngo_facbook,
                                $ngo_linkedin,
                                $ngo_twitter,
                                $ngo_intagram
                                ){
            global $wpdb;
                            if(
                                $ngo_phone != '' ||
                                $ngo_address_zip != '' ||
                                $ngo_city != ''
                                ){
                                    $result = $wpdb->insert('wp_ngo_contact',array(
                                                            'ngo_phone'=> $ngo_phone,
                                                            'ngo_address_zip'=>  $ngo_address_zip,
                                                            'ngo_city'=> $ngo_city,
                                                            'ngo_facbook'=>  $ngo_facbook,
                                                            'ngo_linkedin'=> $ngo_linkedin,
                                                            'ngo_linkedin'=> $ngo_linkedin,
                                                            'ngo_twitter'=> $ngo_twitter,
                                                            'ngo_intagram'=> $ngo_intagram
                                                            ));
                                    if(!$result){
                                                echo"Error Posting Your Contact data";
                                                }
                                    else{
                                            echo"Contacts succesfully Added";
                                        }

                            }
                            else{
                                echo"Please fill all the fields";
                             }

        }


        function get_ngo_profile($ngo_email){
            global $wpdb;
            $result = $wpdb->get_row("SELECT * FROM  wp_ngo_info WHERE ngo_email = '$ngo_email'");
                      return $result;
        }

        // reading opportunity posted
        function get_ngo_opportunities($ngo_email){
            global $wpdb;
            $result = $wpdb->get_results("SELECT * FROM wp_ngo_opportunity WHERE ngo_email = '$ngo_email'");
            return $result;
        }

        // update
        function update_ngo_opportunity($id,
                                $ngo_edit_opp_name, $ngo_edit_opp_description,
                                $ngo_edit_opp_location, $ngo_edit_opp_skills,
                                $ngo_edit_opp_start_date, $ngo_edit_opp_end_date){

            global $wpdb;
            $action = $wpdb->update('wp_ngo_opportunity', array(
                        'ngo_opp_name' => $ngo_edit_opp_name,
                        'ngo_opp_description' => $ngo_edit_opp_description,
                        'ngo_opp_location' => $ngo_edit_opp_location,
                        'ngo_opp_skills' => $ngo_edit_opp_skills,
                        'ngo_opp_start_date' => $ngo_edit_opp_start_date,
                        'ngo_opp_end_date' => $ngo_edit_opp_end_date),
                        array('id' => $id));
            if (!$action) {
                # code...
                echo "Error posting your Changes";
            }
            else{
                echo "Succesfully posted you Changes";
                $_SESSION['ngo_opportunity_set_yn'] = 'Y';
            }


        }
        // Update Activity
       function update_ngo_activity($id,
                            $ngo_edit_event_name,
                            $ngo_edit_event_location,
                            $ngo_edit_event_description,
                            $ngo_edit_event_start,
                            $ngo_edit_event_end, $ngo_edit_event_start_time,
                            $ngo_edit_event_end_time){

            global $wpdb;
            if (!$wpdb) {
               echo "No connection";
               exit;
            }

            $action = $wpdb->update('wp_ngo_activity', array(
                        'ngo_event_name' => $ngo_edit_event_name,
                        'ngo_event_location' => $ngo_edit_event_location,
                        'ngo_event_description' => $ngo_edit_event_description,
                        'ngo_event_start' => $ngo_edit_event_start,
                        'ngo_event_end' => $ngo_edit_event_end,
                        'ngo_event_start_time' => $ngo_edit_event_start_time,
                        'ngo_event_end_time' => $ngo_edit_event_end_time),
                        array('id' => $id));

            if (!$action) {
                # code...
                echo "Error posting your Changes";

            }
            else{
                echo "Succesfully posted you Changes";

            }


       }

        // reading activities posted
        function get_ngo_activities($ngo_email){
            global $wpdb;
            $result = $wpdb->get_results("SELECT * FROM wp_ngo_activity WHERE ngo_email = '$ngo_email'");
            return $result;
        }

        // reading contact details
        function get_ngo_contact($ngo_email){
            global $wpdb;
            $result = $wpdb->get_results("SELECT * FROM wp_ngo_contact WHERE ngo_email = '$ngo_email'", ARRAY_A);
            return $result;
        }

        // getting opportunity by id
        function opportunity_by_id($id){
            global $wpdb;
            $result = $wpdb-> get_row("SELECT * FROM wp_ngo_opportunity WHERE id = $id");
            return $result;

        }
         // getting activity by id
        function activity_by_id($id){
            global $wpdb;
            $result = $wpdb-> get_row("SELECT * FROM wp_ngo_activity WHERE id = $id");
            return $result;

        }
       function opportunity_delete_by_id($id)
       {
            global $wpdb;
            $result = $wpdb-> get_row("DELETE  FROM wp_ngo_opportunity WHERE id = $id");

       }
       function  delete_activity_by_id($id){
         global $wpdb;
            $result = $wpdb-> get_row("DELETE  FROM wp_ngo_activity WHERE id = $id");
       }

}

ob_get_clean();
?>
