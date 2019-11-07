<?php
get_header();
/*
Template Name:NGO
*/
include('ngoDbfunctions.php');

session_start();
$_SESSION['ngo_profile_set'];


if (isset($_POST['ngo_email'])) {
 $result = new Ngodetails();
 //echo($_POST['ngo_email']);
    $result->ngo_profile_setup($_POST['org_name'],$_POST['ngo_email'],$_POST['ngo_org_director'],
                                $_POST['ngo_fyear'],$_POST['ngo_address'],$_POST['ngo_description'],
                                $_POST['ngo_vision'],$_POST['ngo_mission'],$_POST['ngo_we_do'],$_POST['ngo_we_are']
);
}

// new profile setup

if($_SESSION['ngo_profile_set'] == 'N'){
  echo '
  <div class="topnav" id="myTopnav">
      <a href="http://localhost/voluculture/ngo-profile/" class="btn active">Organization information</a>
      <a href="http://localhost/voluculture/opportunities-2/" class = "btn">Opportunities</a>
      <a href=" http://localhost/voluculture/contact-details/"class ="btn">Contact Details</a>
      <a href=" http://localhost/voluculture/activities-events/" class ="btn">Activities/Events</a>
      <a href="http://localhost/voluculture/applicants/" class="btn">Applicants</a>
      <a href="javascript:void(0);" class="icon" onclick="myFunction()">
        <i class="fa fa-bars"></i>
      </a>
  </div>

  <section >

   <div class="container">
    <form action="" method="post">

      <div class="orgname">
      <label for="fname">Organization name</label><span class="required">*</span>
      <input type="text" id="oname" name="org_name" placeholder="Org name..">
      </div>

      <div class="yearfounded">
      <label for="country">Year Founded</label><span class="required">*</span>
      <input type="text" name="ngo_fyear" class="yearpicker form-control" value="">

      </div>



  <div class="md-form">
  <div class="file-field">
  <div class="5-4">
    <img src=""  id="photo"
      class="" alt="example placeholder avatar" style="max-width:70%;">
  </div>
  <div class="d-flex justify-content-center">
    <div class="btn btn-mdb-color btn-rounded float-left">
      <span>Add photo</span>
      <input type="file" onchange="postavatar(this);">
    </div>
  </div>
  </div>
      <div class="orgname">
      <label for="fname">Organization email</label><span class="required">*</span>
      <input type="email" id="oemail" name="ngo_email" placeholder="Org email..">
      </div>

      <div class="orghead">
      <label for="fname">Organization Director </label><span class="required">*</span>
      <input type="text" id="ohead" name="ngo_org_director" placeholder="Org Director..">
      </div>

  </div>




  </section>

  <section style="padding-bottom: 20px" >

   <div class="container">

   <p class="formfield">
      <label for="lname">What we do </label><span class="required">*</span>
     <textarea id="subject" name="ngo_we_do" placeholder="Write something.." style="height:150px"></textarea>
   </p>

      <p class="formfield">
       <label for="lname">BriefSummary</label><span class="required">*</span>
     <textarea id="subject" name="ngo_description" placeholder="Write something.." style="height:150px"></textarea>
  </p>

  </div>

  </section>

  <section style="padding-bottom: 10px">

   <div class="container">


    <p class="formfield">
      <label for="fname" class="list-inline-item text-primary">Who we are </label><span class="required">*</span>
     <textarea id="subject" name="ngo_we_are" placeholder="Write something.." style="height:150px"></textarea>
  </p>

      <p class="formfield">
      <label for="fname">Our mission</label><span class="required">*</span>
     <input type ="text" id="subject" name="ngo_mission" placeholder="Write something.."style=height:75px;>
  </p>

       <p class="formfield">
      <label for="lname">Our vision</label><span class="required">*</span>
     <input type="text" id="subject" name="ngo_vision" placeholder="Write something.."style=height:75px;>
  </p>

  </div>

  <div style=margin-top:25px;>
  <input name="btnLogin" id="btnLogin" type="submit" value="Submit"style=margin-left:75px;>
  </div>
  </form>
  </section>
  </div>

    <script type="text/javascript" src="js/yearpicker.js"></script>
    <script type="text/javascript" src="js/moment.js"></script>
     <script type="text/javascript" src="js/custom.js"></script>

<script type="text/javascript">
function postavatar(input) {
  // body...
  if(input.files && input.files[0]){
  var reader = new FileReader();
  reader.onload = function(e){
  $("#photo")
  .attr("src", e.target.result);
  };
  reader.readAsDataURL(input.files[0]);
  }
  }

</script>





  ';

}

elseif($_SESSION['ngo_profile_set'] == 'Y'){
  $getResults = new Ngodetails();
  $ngoProfile = $getResults-> get_ngo_profile($_SESSION['ngo_email']);

  echo'
  <div class="topnav" id="myTopnav">
  <a href="http://localhost/voluculture/ngo-profile/"  class="btn active">Organization information</a>
  <a href="http://localhost/voluculture/ngo-opportunities/" class="btn active">Opportunities</a>
  <a href=" http://localhost/voluculture/ngo-contact-details/" class="btn active">Contact Details</a>
  <a href="http://localhost/voluculture/ngo-activities/"  class="btn active">Activities/Events</a>
    <a href="http://localhost/voluculture/volunteers/"  class="btn active">Volunteers</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>
  <div id ="profile">


<section >

 <div class="container">
  <form action="action_page.php">

    <div class="orgname">
    <label for="fname">Organization name</label>
    <p>'.$ngoProfile->org_name.'</p>
    </div>

    <div class="yearfounded">
    <label for="country">Year Founded</label>
    <p>'.$ngoProfile->ngo_fyear.'</p>

    </div>

  <div class="file-field">
    <div class="5-4">
      <img src="img/SOMO.png"
        class="rounded-circle z-depth-1-half avatar-pic" alt="example placeholder avatar" style="max-width:50%;">
    </div>
    <div class="d-flex justify-content-center">
      <div class="btn btn-mdb-color btn-rounded float-left">

      </div>
    </div>
  </div>

    <div class="orgname">
    <label for="fname">Organization email</label>
    <p>'.$ngoProfile->ngo_email.'</p>
    </div>

    <div class="orghead">
    <label for="fname">Organization Director </label>
    <p>'.$ngoProfile->ngo_org_director.'</p>
    </div>

     <div class="orgaddress">
    <label for="fname">Organization address </label>
    <p>'.$ngoProfile->ngo_address.'</p>
    </div>

</div>




</section>


<section >

 <div class="container">


    <div class="orgname">
    <label for="fname">Who we are </label>
    <p>'.$ngoProfile->ngo_we_are.'</p>
    </div>

    <div class="orghead">
    <label for="fname"><label for="fname">What we do</label> </label>
    <p>'.$ngoProfile->ngo_we_do.'</p>
    </div>

     <div class="orgaddress">
    <label for="fname">Brief Summary </label>
     <p>'.$ngoProfile->ngo_description.'</p>
    </div>

</div>

</section>

<section >

 <div class="container">

    <div class="orgname">
    <label for="fname">Our mission</label>
    <p>'.$ngoProfile->ngo_mission.'</p>
    </div>

    <div class="orghead">
    <label for="fname"><label for="fname">Our vission</label> </label>
    <p>'.$ngoProfile->ngo_vision.'</p>
    </div>

     <div class="orgaddress">
    <label for="fname">Organization address </label>
    <p>Somo</p>
    </div>

</div>

</section>

   <button type="button" href="profile.html" class="btn btn-success btn-sm">Edit</button>

</div>




  ';
}

?>
