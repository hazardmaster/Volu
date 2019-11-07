<?php
/*
Template Name: NGO Opportunities
*/
get_header();

session_start();
include('ngoDbfunctions.php');

if (isset($_POST['ngo_opp_name'])) {
$result = new Ngodetails();
$result-> ngo_opportunity_post($_POST['ngo_opp_name'],$_POST['ngo_opp_description'],
                              $_POST['ngo_opp_location'],$_POST['ngo_opp_skills'],
                               $_POST['ngo_opp_start_date'],$_POST['ngo_opp_end_date']
                              );
}

 // unwinding the form for adding new opportunity
        function add_new_opportunity(){
            $_SESSION['ngo_opportunity_set_yn'] = 'N';
        }
        if(isset($_POST['submit'])){
             add_new_opportunity();
           }
           // unwinding for the editing purpose
           function edit_opportunity(){
            $_SESSION['ngo_opportunity_set_yn'] = 'E';
           }
           if (isset($_POST['submit_edit'])) {
            edit_opportunity();
            $identifier = $_POST['id_holder'];
            $_SESSION['unique_opp_id'] = $identifier;

              $result = new Ngodetails();
              $result_by_id  = $result-> opportunity_by_id($identifier);


             # code...
           }
         if (isset($_POST['submit_delete'])) {
            edit_opportunity();
            $identifier = $_POST['id_holder'];
            $_SESSION['unique_opp_id'] = $identifier;

              $result = new Ngodetails();
              $result_by_id  = $result-> opportunity_delete_by_id($identifier);

             $_SESSION['ngo_opportunity_set_yn'] = 'Y';
             echo'Data deleted';
             # code...
           }
           // get back function
           function get_to_list(){
            $_SESSION['ngo_opportunity_set_yn'] = 'Y';
           }
           if (isset($_POST['get_back'])) {
             # code...
            get_to_list();
           }

if (isset($_POST['btnsubmitEdit'])) {
    $editId = $_POST['edit_id_holder'];

    $update = new Ngodetails();
    $update-> update_ngo_opportunity($editId,
                                $_POST['ngo_edit_opp_name'], $_POST['ngo_edit_opp_description'],
                                $_POST['ngo_edit_opp_location'], $_POST['ngo_edit_opp_skills'],
                                $_POST['ngo_edit_opp_start_date'], $_POST['ngo_edit_opp_end_date']);

    $_SESSION['ngo_opportunity_set_yn'] = 'Y';
  }



if($_SESSION['ngo_opportunity_set_yn'] == 'N'){

  echo'

<div class="topnav">
    <a href="http://localhost/voluculture/ngo/"  class="btn active">Organization information</a>
    <a href="http://localhost/voluculture/ngo-opportunities/" class="btn active">Opportunities</a>
    <a href=" http://localhost/voluculture/ngo-contact-details/" class="btn active">Contact Details</a>
    <a href="http://localhost/voluculture/ngo-activities/"  class="btn active">Activities/Events</a>
    <a href="http://localhost/voluculture/volunteers/"  class="btn active">Volunteers</a>
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
      <i class="fa fa-bars"></i>
    </a>
</div>

<div id="opportunities-form">
<section class="mycontainer" id = "First" >


<form action="" method="post">


<div class="container">

 <div class="orgname">
   <label for="fname">Opportunity Name</label><span class="required">*</span>
   <input type="text" id="oemail" name="ngo_opp_name" placeholder="Oppname..">
   </div>

    <div class="orgaddress">
       <label for="lname">Opportunity location</label><span class="required">*</span>
       <textarea id="subject" name="ngo_opp_location" placeholder="Write something.." style="height:130px" rows="3"></textarea>
   </div>
</div>

</section>

<section class="mycontainer1" id="Second" >

<div class="container">
   <p class="formfield">
       <label for="fname">Opportunity description</label><span class="required">*</span>
       <textarea id="subject" name="ngo_opp_description" placeholder="Write something.." style="height:130px"></textarea>
</p>
</div>
<div class="container">
   <p class="formfield">
       <label for="fname">Required Skills if any</label><span class="required">*</span>
       <textarea id="subject" name="ngo_opp_skills" placeholder="Write something.." style="height:130px"></textarea>
</p>
</div>
</section>

<section class="mycontainer2" id="Third" >


</section>
              <section class="mycontainer2" id="Third" style="margin-bottom:10px">

                    <div class="container">
                                <p class="formfield">
                                <label for="fname">Start Date</label><span class="required">*</span>
                                <input type="date" data-date="" name="ngo_opp_start_date" data-date-format="DD MMMM YYYY" >
                                </p>

                                <p class="formfield">
                                <label for="fname">End Date</label><span class="required">*</span>
                                <input type="date" data-date="" name="ngo_opp_end_date" data-date-format="DD MMMM YYYY" >
                                </p>
                            <p>
                                <div style=margin-top:25px;>
                                <input name="btnLogin" id="btnLogin" type="submit" value="Submit"style=margin-left:75px;>
                                <button type="button"  id="back-button">Back</button>
                                </div>
                            </p>
                    </div>

              </section>
              </form>


</div>';
}




elseif ($_SESSION['ngo_opportunity_set_yn'] == 'Y') {
  $getopportunities = new Ngodetails();
  $ngoOpportunities = $getopportunities-> get_ngo_opportunities($_SESSION['ngo_email']);

  echo '

<link href="css/theme.css" rel="stylesheet" media="all">
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
<div class="table-responsive table-responsive-data2" id="opportunities-table" style="margin-top:50px">
                                     <table class="table table-data2">
                                         <thead>
                                             <tr>
                                                 <th>
                                                     <label class="au-checkbox">
                                                        <input type="checkbox">
                                                         <span class="au-checkmark"></span>
                                                    </label>
                                                 </th>
                                                 <th>name</th>
                                                 <th>Opportunity description</th>
                                                 <th>date</th>
                                                 <th>Opportunity location</th>
                                            <th>Period</th>


                                                 <th></th>
                                             </tr>
                                         </thead>
                                         <tbody>';

if (!empty($ngoOpportunities)) {
   foreach ($ngoOpportunities as $ngo) {

echo '
<tr class="tr-shadow">
<form action="" method="post">
<td>
<label class="au-checkbox">
<input type="checkbox">
<span class="au-checkmark"></span>
</label>
</td>
<td>'.$ngo -> ngo_opp_name.'</td>
<td>
<span class="block-des">'.$ngo -> ngo_opp_description.'</span>
</td>
<td class="desc">'.$ngo -> ngo_opp_start_date.'</td>
<td>'.$ngo -> ngo_opp_location.'</td>
<td></td>
<td>
<input type="hidden" value="'.$ngo ->id.'" name="id" id="id">
<div class="table-data-feature">
<div class="profile-userbuttons">
<input type="text" name="id_holder" hidden value="'.$ngo -> id.'">
<input type="submit" class="btn btn-success btn-sm" value="Edit" name="submit_edit">
</div>
<div class="profile-userbuttons">
<input type="submit" name="submit_delete" class="btn btn-success btn-sm" Value="Delete">
</div>
</div>
</td>
</tr>
</form>';
}}

echo '

    </tbody>

         <form action="" method="post">
<input type="submit" class="btn btn-success btn-sm" name="submit" value="Add New">
         </form>
         </table>
          </div>

<script type="text/javascript">
 $("#opportunities-form").hide();
  $("#opportunities-table").show();

$("#opportunities-add-button").on("click",
function() {
  $("#opportunities-form").show();
  $("#opportunities-table").hide();


});
$("#back-button").on("click",
function() {
  $("#opportunities-table").show();

});
$("#back-button").on("click",
function() {
  $("#opportunities-table").show();
$("#opportunities-form").hide();
});

$("#edit-button").on("click",
function() {
  $("#opportunities-form").show();
$("#opportunities-table").hide();

});
</script>

  ';
}

elseif ($_SESSION['ngo_opportunity_set_yn'] = 'E') {

  echo'

<link href="css/theme.css" rel="stylesheet" media="all">
<div class="topnav" id="myTopnav">
<a href="http://localhost/voluculture/ngo-profile/" >Organization information</a>
<a href="http://localhost/voluculture/ngo-opportunities/" class="btn active">Opportunities</a>
<a href=" http://localhost/voluculture/ngo-contact-details/" >Contact Details</a>
<a href="http://localhost/voluculture/ngo-activities/"  class="btn active">Activities/Events</a>
    <a href="http://localhost/voluculture/volunteers/"  class="btn active">Volunteers</a>
<a href="javascript:void(0);" class="icon" onclick="myFunction()">
  <i class="fa fa-bars"></i>
</a>
</div>

<div id="opportunities-form">
<section class="mycontainer" id = "First" >


<form action="" method="post">


<div class="container">

 <div class="orgname">
   <label for="fname">Opportunity Name</label><span class="required">*</span>
   <input type="text" id="oemail" value="'.$result_by_id-> ngo_opp_name.'" name="ngo_edit_opp_name" placeholder="Edit Oppname..">
   </div>

    <div class="orgaddress">
       <label for="lname">Opportunity location</label><span class="required">*</span>
       <textarea id="subject" value="" name="ngo_edit_opp_location" placeholder="Write something.." style="height:130px" rows="3"> '.$result_by_id-> ngo_opp_location.'</textarea>
   </div>
</div>

</section>

<section class="mycontainer1" id="Second" >

<div class="container">
   <p class="formfield">
       <label for="fname">Opportunity description</label><span class="required">*</span>
       <textarea id="subject"  name="ngo_edit_opp_description" placeholder="Write something.." style="height:130px">'.$result_by_id-> ngo_opp_description.'</textarea>
</p>
</div>
<div class="container">
   <p class="formfield">
       <label for="fname">Required Skills if any</label><span class="required">*</span>
       <textarea id="subject" name="ngo_edit_opp_skills" placeholder="Write something.." style="height:130px">'.$result_by_id-> ngo_opp_skills.'</textarea>
</p>
</div>
</section>

<section class="mycontainer2" id="Third" >


</section>
              <section class="mycontainer2" id="Third" style="margin-bottom:10px">

                    <div class="container">
                                <p class="formfield">
                                <label for="fname">Start Date</label><span class="required">*</span>
                                <input type="date" data-date="" name="ngo_edit_opp_start_date" data-date-format="DD MMMM YYYY" value="'.$result_by_id-> ngo_opp_start_date.'">
                                </p>

                                <p class="formfield">
                                <label for="fname">End Date</label><span class="required">*</span>
                                <input type="date" data-date="" name="ngo_edit_opp_end_date" data-date-format="DD MMMM YYYY" value="'.$result_by_id-> ngo_opp_end_date.'">
                                </p>
                            <p>
                                <div style=margin-top:25px;>
                                <input type="text" name="edit_id_holder" hidden value="'.$result_by_id -> id.'">
                                <input name="btnsubmitEdit" id="btnLogin" type="submit" value="Submit"style=margin-left:75px;>
                                <input type="submit"  id="back-button" name="get_back" value="Back">
                                </div>
                            </p>
                    </div>

              </section>
              </form>


</div>';
  # code...
}

?>
