<?php
/*
Template Name:NGO Contact Details
*/
include('ngoDbfunctions.php');

if (isset($_POST['ngo_address_zip'])) {

  //  Ngodetails::ngo_login($_POST['Ngo_email'],$_POST['Ngo_password']);
   $result = new Ngodetails ();

      $result->ngo_contact_post($_POST['ngo_phone'], $_POST['ngo_address_zip'],
                                  $_POST['ngo_city'],$_POST['ngo_facbook'],
                                  $_POST['ngo_linkedin'],$_POST['ngo_twitter'],
                                  $_POST['ngo_intagram']
                                );
 }

get_header();
echo '
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

<section style="margin-left:150px">

 <div class="container">
  <form action="" method="post">


  <div class="orgtelephone">
  <label for="fname">Telephone </label><span class="required">*</span>
  <input type="text" id="oaddress" name="ngo_phone" placeholder="Org postal address.." required>
  </div>



    <div class="orghead">
    <label for="fname">Zip code </label><span class="required">*</span>
    <input type="text" id="ohead" name="ngo_address_zip" placeholder="Zip code..">
    </div>

     <div class="orgaddress">
    <label for="fname">City/Town</label><span class="required">*</span>
    <input type="text" id="oaddress" name="ngo_city" placeholder="City..">








</div>




</section>

<section style="margin-left:50px">

 <div class="container">


    <div class="orgfurl">
    <label for="fname">Url</label><span class="required">*</span>
    <input type="text" id="oname" name="ngo_facbook" placeholder="FaceBook Url..">
    </div>



    <div class="orgiurl">
    <label for="fname">Url</label><span class="required">*</span>
    <input type="text" id="ohead" name="ngo_intagram" placeholder="instagram url..">
    </div>

    <div class="orgiurl">
    <label for="fname">Url</label><span class="required">*</span>
    <input type="text" id="ohead" name="ngo_linkedin" placeholder="linkedin url..">
    </div>

     <div class="orgturl">
    <label for="fname">Url</label><span class="required">*</span>
    <input type="text" id="oaddress" name="ngo_twitter" placeholder="twitter url..">



</div>

<div style=margin-top:25px;>
<input name="btnLogin" id="btnLogin" type="submit" value="Submit"style=margin-left:75px;>
</div>
</form>
</section>
</div>


';

?>
