<?php
/*
Template Name: EventDescription
*/
get_header();

// if(isset($_GET['id'])){
//
//   $part = $wpdb->get_row("SELECT * FROM X WHERE id ={$GET['id']}");
//
// if(!$part){
//   echo "no such event";
// }else{

echo '


   <link rel="stylesheet" href="css/display.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <div class="bar1" style ="background-image: url('."http://localhost/voluculture/wp-content/themes/goodwish/img/mchele.jpg".')">
    <h1 style="color: #ffffff;text-align:center;">
    <span>Film Screenings</span>
    </h1>
  </div>
  <div style="height:30px;"></div>
   <div class="topnav">
     <input type="text" placeholder="Type here..">
     <div class="search-container">
     <button type="submit"><i class="fa fa-search"></i></button>
     </div>
  </div>




    <div>
    <h3 style="color: #000000;text-align:center;">
    <span>Film Screenings</span>
    </h3>
    <div>
    </div>
    <div class="bar2">
   <img src="'.get_template_directory_uri().'/img/SOMO.png" style="width:120px;height:120px;margin-left: 400px;">
  </div>
    <div>
    <p style="width: 70%;text-indent: 50px;">We believe the potential and talent that exists in low income areas.Do you have a socially focused business idea and want to start your business?</p>
  </div>

  <div style="height: 30px;">

  </div>

  </div>


   <!-- The sidebar -->
<div class="sidebar">
  <h3>info</h3>

  <div class="content1">

<div>
<h4>category:</h4>
<p>kids</p>

</div>
<div>
<h4>Location:</h4>
<p>Kaloleni Makadara and Mcmillan memorial library</p>
</div>

<div>
<h4>Type:</h4>
<p>Education</p>
</div>
<div>
<h4>Entrance:</h4>
<p>All screenings are open and free to the public</p>
</div>

</div>

</div>

 <div>
    <h3>Related Events</h3>
    </div>

  <section class="class3" >


  <div class="container1">

    <div>
   <img src="'.get_template_directory_uri().'/img/mcmillan.jpg" id="eventimage1">

    </div>
    </div>

    <div >
    <a id="eventlink" href="http://localhost/voluculture/?page_id=1221"><h3 id="eventname">Film Screenings</h3></a>
    </div>



    <div class="eventtime">
    <p>6:00am - 6:00pm</p>
    </div>

    <div class="eventdescription">
    <p>Kaloleni,Madaraka and Mcmillan Memorial Library Nairobi CBD</p>
    </div>







 <a href="http://localhost/voluculture/?page_id=1221" ><button type="button" class="btn" style="width: 50%;color:#ffffff;">Read More</button></a>







</section>








';

?>
