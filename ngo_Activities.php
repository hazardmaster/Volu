
<?php
/*
Template Name:  NGO Activities/Events
*/
get_header();

session_start();

include('ngoDbfunctions.php');

if (isset($_POST['ngo_event_name'])) {
$result = new Ngodetails();
$result-> ngo_activity_post($_POST['ngo_event_name'],$_POST['ngo_event_location'],
                               $_POST['ngo_event_description'],$_POST['ngo_event_start'],
                               $_POST['ngo_event_end'], $_POST['ngo_event_start_time'],
                               $_POST['ngo_event_end_time']
                              );
}
 // unwinding the form for adding new activity
        function add_new_activity(){
            $_SESSION['ngo_activity_set_yn'] = 'N';
        }
    if(isset($_POST['submit'])){
             add_new_activity();
           }
           // unwinding for the editing purpose
           function edit_activity(){
            $_SESSION['ngo_activity_set_yn'] = 'E';
           }
           if (isset($_POST['submit_edit'])) {
            edit_activity();
            $identifier = $_POST['id_holder'];
            $_SESSION['unique_activity_id'] = $identifier;

              $result = new Ngodetails();
              $result_by_id  = $result-> activity_by_id($identifier);
               echo $identifier;

             # code...
           }
         if (isset($_POST['submit_delete'])) {
            edit_activity();
            $identifier = $_POST['id_holder'];
            $_SESSION['unique_activity_id'] = $identifier;

              $result = new Ngodetails();
              $result_by_id  = $result->  delete_activity_by_id($identifier);

             $_SESSION['ngo_activity_set_yn'] = 'Y';
             echo'Data deleted';
             # code...
    }

if (isset($_POST['activityEditBtn'])) {

   $editId = $_POST['edit_id_holder'];

    $updateActivity = new Ngodetails();

    $updateActivity-> update_ngo_activity($editId,
                                $_POST['ngo_edit_event_name'],
                                $_POST['ngo_edit_event_description'],
                                $_POST['ngo_edit_event_location'],
                                $_POST['ngo_edit_event_start'],
                                $_POST['ngo_edit_event_end'], $_POST['$ngo_edit_event_start_time'],
                                $_POST['ngo_edit_event_end_time']);

    $_SESSION['ngo_activity_set_yn'] = 'Y';
  }

if ($_SESSION['ngo_activity_set_yn'] == 'N') {
    # code...

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
<section >
            <div id="activities-form">
                    <div class="container">
                        <form action="" method="post">

                        <div class="orgname">
                        <label for="fname">Event Name</label><span class="required">*</span>
                        <input type="text" id="oname" name="ngo_event_name" placeholder="Eventname..">
                        </div>

                        <div class="file-field">
                        <div class="5-4">
                        <img src="https://mdbootstrap.com/img/Photos/Others/placeholder-avatar.jpg"
                        class="rounded-circle z-depth-1-half avatar-pic" alt="example placeholder avatar" style="max-width:50%;">
                        </div>
                        <div class="d-flex justify-content-center">
                        <div class="btn btn-mdb-color btn-rounded float-left">
                        <span>Add photo</span>
                        <input type="file">
                        </div>
                        </div>
                        </div>

                        </div>
                        </section>

                        <section >

                        <div class="container">

                        <p class="formfield">
                        <label for="fname">Event description</label><span class="required">*</span>
                        <textarea id="subject" name="ngo_event_description" placeholder="Write something.." style="height:140px" rows="3"></textarea>
                        </p>

                        <p class="formfield">
                        <label for="lname">Location description</label><span class="required">*</span>
                        <textarea id="subject" name="ngo_event_location" placeholder="Write something.." style="height:140px"></textarea>
                        </p>

                        </div>
                        </section>

                        <section style="padding-bottom: 50px" >

                        <div class="container" >
                        <p class="formfield">
                        <label for="fname">Start Date</label><span class="required">*</span>
                        <input type="date" data-date="" name="ngo_event_start" data-date-format="DD MMMM YYYY" >
                        </p>

                        <p class="formfield">
                        <label for="fname">End Date</label><span class="required">*</span>
                        <input type="date" data-date="" name="ngo_event_end" data-date-format="DD MMMM YYYY">
                        </p>
                        <p class="formfield">
                        <label for="input_starttime">Start time</label><span class="required">*</span>
                        <input type="text" id="time2" name="ngo_event_start_time"/>

                        </p>
                        <p class="formfield">
                        <label for="fname">End time</label><span class="required">*</span>
                        <input type="text" id="time3" name="ngo_event_end_time">
                        </p>

                        </div>
                        <div >
      <div style=margin-top:25px;>
               <input name="btnLogin" id="btnLogin" type="submit" value="Submit"style=margin-left:75px;>


      </div>

                        </div>
                        </form>
                        </section>
                        </section>
            </div>
';
}
elseif ($_SESSION['ngo_activity_set_yn'] == 'Y') {
    $ngoActivity = new Ngodetails();
    $ngoFecthedActivities = $ngoActivity->get_ngo_activities($_SESSION['ngo_email']);

    # code...
    echo '
    <a href="http://localhost/voluculture/ngo-profile/"  class="btn active">Organization information</a>
    <a href="http://localhost/voluculture/ngo-opportunities/" class="btn active">Opportunities</a>
    <a href=" http://localhost/voluculture/ngo-contact-details/" class="btn active">Contact Details</a>
    <a href="http://localhost/voluculture/ngo-activities/"  class="btn active">Activities/Events</a>
      <a href="http://localhost/voluculture/volunteers/"  class="btn active">Volunteers</a>
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
      <i class="fa fa-bars"></i>
    </a>
</div>
                    <div class="table-responsive table-responsive-data2" id="activities-table">
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
                                                <th>Event Location</th>
                                                <th>Event description</th>
                                                <th>date</th>
                                                <th>Time</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>';

      if(!empty($ngoFecthedActivities)){
        foreach ($ngoFecthedActivities as $ngoEvent) {

            echo'

                           <tr class="tr-shadow">

                            <form action="" method="post">
                                         <td>
                                                    <label class="au-checkbox">
                                                        <input type="checkbox">
                                                        <span class="au-checkmark"></span>
                                                    </label>
                                                </td>
                                                <td>'.$ngoEvent-> ngo_event_name.'</td>
                                                <td>
                                                    <span class="block-location">'.$ngoEvent-> ngo_event_location.'</span>
                                                </td>
                                                <td class="desc">'.$ngoEvent-> ngo_event_description.'</td>
                                                <td>'.$ngoEvent -> ngo_event_start.'</td>
                                                <td>'.$ngoEvent -> ngo_event_start_time.'-'.$ngoEvent-> ngo_event_end_time.'</td>
                                                <td>
                                            <div class="table-data-feature">
                                            <div class="profile-userbuttons">
                     <input type="text" name="id_holder" hidden value="'.$ngoEvent -> id.'" name="id" id="id">
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

                echo   '
                         </tbody>
            <form action="" method="post">
      <input type="submit" class="btn btn-success btn-sm" name="submit" value="Add New">
         </form>
                 </div>';
}
elseif ($_SESSION['ngo_activity_set_yn']= 'E'){

    echo '
       <div class="topnav" id="myTopnav">
       <a href="http://localhost/voluculture/ngo/"  class="btn active">Organization information</a>
       <a href="http://localhost/voluculture/ngo-opportunities/" class="btn active">Opportunities</a>
       <a href=" http://localhost/voluculture/ngo-contact-details/" class="btn active">Contact Details</a>
       <a href="http://localhost/voluculture/ngo-activities/"  class="btn active">Activities/Events</a>
    <a href="http://localhost/voluculture/volunteers/"  class="btn active">Volunteers</a>
       <a href="javascript:void(0);" class="icon" onclick="myFunction()">
         <i class="fa fa-bars"></i>
       </a>
        </div>

    <form action="" method="post">
        <div>
            <section>
                <div id="activities-form">
                    <div class="container">
                        <div class="orgname">
                            <label for="fname">Event Name</label><span class="required">*</span>
                            <input type="text" id="oname" name="ngo_edit_event_name" placeholder="Eventname.." value="'.$result_by_id-> ngo_event_name.'">
                        </div>

                        <div class="file-field">
                            <div class="5-4">
                                <img src="https://mdbootstrap.com/img/Photos/Others/placeholder-avatar.jpg"
                                class="rounded-circle z-depth-1-half avatar-pic" alt="example placeholder avatar" style="max-width:50%;">
                            </div>
                            <div class="d-flex justify-content-center">
                                <div class="btn btn-mdb-color btn-rounded float-left">
                                    <span>Add photo</span>
                                    <input type="file">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section>
                <div class="container">
                    <p class="formfield">
                        <label for="fname">Event description</label><span class="required">*</span>
                        <textarea id="subject" name="ngo_edit_event_description" placeholder="Write something.." style="height:140px" rows="3">'.$result_by_id-> ngo_event_description.'</textarea>
                    </p>

                    <p class="formfield">
                        <label for="lname">Location description</label><span class="required">*</span>
                        <textarea id="subject" name="ngo_edit_event_location" placeholder="Write something.." style="height:140px">'.$result_by_id-> ngo_event_location.'</textarea>
                    </p>
                </div>
            </section>
            <section style="padding-bottom: 50px">
                <div class="container" >
                    <p class="formfield">
                        <label for="fname">Start Date</label><span class="required">*</span>
                        <input type="date" data-date="" name="ngo_edit_event_start" data-date-format="DD MMMM YYYY" value="'.$result_by_id-> ngo_event_start.'">
                    </p>

                    <p class="formfield">
                        <label for="fname">End Date</label><span class="required">*</span>
                        <input type="date" data-date="" name="ngo_edit_event_end" data-date-format="DD MMMM YYYY" value="'.$result_by_id -> ngo_event_end.'">
                    </p>

                    <p class="formfield">
                        <label for="input_starttime">Start time</label><span class="required">*</span>
                        <input type="text" id="time2" name="ngo_edit_event_start_time" value="'.$result_by_id-> ngo_event_start_time.'">

                    </p>

                    <p class="formfield">
                        <label for="fname">End time</label><span class="required">*</span>
                        <input type="text" id="time3" name="ngo_edit_event_end_time" value="'.$result_by_id-> ngo_event_end_time.'">
                    </p>

                    <div >
                        <div style=margin-top:25px;>
                          <input type="text" name="edit_id_holder" hidden value="'.$result_by_id -> id.'">
                           <input type="submit" name="activityEditBtn" id="btnLogin"  value="Submit" style=margin-left:75px;>
                        </div>

                    </div>

                </div>
            </section>
        </div>
    </form>
    ';
}
?>
