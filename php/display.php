<?php

session_start();
class displayopp{


        /*If user is not logged in but access this page this will be the fucntion to display all opportunities */
        function displayOpportunitiesDescription($id){
            global $wpdb;
            $all_events = $wpdb-> get_row("SELECT * FROM wp_ngo_opportunity WHERE id='$id' ");
    
    
            echo '
            
        <div class="bar1" style ="background-image: url('."http://localhost/voluculture/wp-content/themes/goodwish/assets/img/mchele.jpg".')">
        <h1 style="color: #ffffff">
            <span>'.$all_events -> ngo_opp_name .' </span>
        </h1>
    </div>

        <div style="height:30px;"></div>
            <div class="topnav">
             <input type="text" placeholder="Type here..">
             <div class="search-container">
             <button type="submit"><i class="fa fa-search"></i></button>
             </div>
        </div>
        <div class="bar2">
           <img style="width:80%" src="'.get_template_directory_uri().'/assets/img/caring.jpg">
        </div>
        <div>
            <h1 style="color: #000000;">
                <span>'.$all_events -> ngo_opp_name .' </span>
            </h1>
            <p style="width: 70%;text-indent: 50px;">
            '.$all_events -> ngo_opp_description .'
            </p>
        </div>
      <div style="height: 30px;"></div>
       <!-- The sidebar -->
        <div class="nav">
            <div>
                <img src="'.get_template_directory_uri().'/img/image1.jpg" id="oppimage">
                <p>'.$all_events -> ngo_opp_name .' </p>
                <div >
                    <p>August 13 2019</p>
                </div>
            </div>
        </div>
    <div class="content">
        <div>
            <ul>
                <li>
                <h2>Best  for</h2>
    
                </li>
            </ul>
            <p>'.$all_events -> target_audience .' </p>
        </div>
        <div>
            <ul>
                <li>
                <h2>Skills Needed</h2>
    
                </li>
            </ul>
            <p>'.$all_events -> ngo_opp_skills .' </p>
        </div>
        <div>
            <ul>
                <li>
                    <h2>When</h2>
                </li>
            </ul>
            <p>'.$all_events -> ngo_opp_start_date .' to '.$all_events -> ngo_opp_end_date .'  </p>
        </div>
        <div>
            <ul>
                <li>
                    <h2>Where</h2>
                </li>
            </ul>
            <p>'.$all_events -> ngo_opp_location .'</p>
        </div>
    </div>
    <div>
        <h2 style="color: #000000;text-align:center;">
            <span>Post A Comment</span>
        </h2>
        <textarea class="textarea"rows="10" cols="50"></textarea>
    </div>
    <button class="apply"style="color:#ffffff;"><a href="'.get_template_directory_uri().'/application-confirmation/?opportunity_id='.$id.'&usermail='.$_SESSION['email'].'">Apply Now</a> </button>
    
    <!-- jQuery 1.7.2+ or Zepto.js 1.0+ -->
    ';
    exit;
        }
        /*Oppotunities Description */
        function displayOpportunities(){
            global $wpdb;
            $all_events = $wpdb->get_results("SELECT * FROM wp_ngo_opportunity");
    
    
    
            echo '
                <div class="bar1" style ="background-image: url('.get_template_directory_uri().'/assets/img/mchele.jpg); width:100%;height:200px; margin-bottom:50px" >
    
                <h2 style="color: #ffffff">
    
                 Opportunities
    
                </h2>
            </div>
    
            ';
            foreach($all_events as $event){
    
    
    if(empty($event -> ngo_opp_description)){
        $desc = "Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum";
    }else{
    if( str_word_count($event -> ngo_opp_description) < 7){
        $desc = $event -> ngo_opp_description;
    }else{
        $desc = $event -> ngo_opp_description;
    }
    
    
    
    
    }
    
    
                echo'
    
    <div >
    
    
        <section class="class1" >
    
            <div class="container">
                <div class="container1">
                    <div class="projectimage">
                     <img src="'.get_template_directory_uri().'/assets/img/caring.jpg" style="width:100%;height:auto;">
                     <br>
                    </div>
                </div>
    
                <div class="projectname">
                    <h3>
                        <a href="?oppID='.$event -> id .'"  style="
                                text-decoration:none;
                                color:black; "><h3>
                            '.$event -> ngo_opp_name .'<hr></h3>
                        </a>
    
                    </h3>
                    <br>
                </div>
                <div class="opp_description" >
    
    
                    <p style="text-align:justify;max-height:50px;overflow:hidden">'.$desc.' </p>
                    <br>
                </div>
                <br>
    
                <div style="display:flex; justify-content: center;">
            <a type="button" href="http://localhost/voluculture/application-confirmation/?oppID='.$event -> id .'&email='.$_SESSION['email'].'" style="
                                    background-color:orange;
                                    color:white;
    
                                    height:35px;
                                    border-radius:3px;
                                    padding-left:10% ;
                                    padding-right:10%;
                                    padding-top:2% ;
    
                                    ">
                        Volunteer</a></div>
    
    
            </div>
    
    
    
        </section>
    
    
    
    </div>
    
    
            ';
            }
        }
        /*If user is logged in we take any prefference available and use it to get custom events */
        function displayOpportunitiesFiltered($filters){
            global $wpdb;
    
        $all_events = $wpdb->get_results("SELECT * FROM wp_ngo_opportunities WHERE x=$filters[0] OR y=$filters[1] OR z = $filters[2]");
        foreach($all_events as $event){
            echo'
            ';
    }}
          
      
}



?>