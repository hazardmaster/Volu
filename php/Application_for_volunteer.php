<?php


class Application{
    function Apply($user_email,$project_id){


if(isset($user_email) && isset($project_id)){

    $proj_data = $wpdb->get_row("SELECT * FROM wp_ngo_projects WHERE project_id = $project_id");
    $user_data = $wpdb->get_row("SELECT * FROM wp_user_details WHERE email = $user_email");
    $proj_application = $wpdb ->insert('wp_applied_projects',
     array(
            'user_id' => $user_data->id,
            'user_email'=>$user_data->email,
            'project_email'=>$proj_data->email,
            'prject_name'=>$proj_data->project_name,
            'end_date'=>$proj_data->end_date
     )
    );

    if(!$proj_application){
        echo"Error in project Application";
    }else{

        echo"<div>
                <h4>Application Successful</h4>
                <button>Check on other projects</button>
                </div>";
        $subject ="VOLUCULTURE REGISTRATION";
        $body = "<div style='text-align:center'><h3> Hi <b class='color:blue'>$user_data->username</b> you have succesfully for $proj_data->project_name through voluculture.Accepted applicants will be contacted.</h3>";
        $headers = array('Content-Type: text/html; charset=UTF-8');
        wp_mail($user_data->email,$subject,$body,$headers);


    }



}elseif(!isset($user_email)){

echo"Login or register to apply for a volunteering project";

}elseif(!isset($project_id)){


    echo"Project does not exist";
}
    }
}

class Events{
    function confirmEvents($event_id,$user_email){

    }
}

?>
