<?php
/*
Template Name: Applicants
*/ 
get_header();

echo '


<div class="topnav" id="myTopnav">
<a href="#" class="btn active">Organization information</a>
<a href="http://localhost/voluculture/opportunities-2/" class = "btn">Opportunities</a>
<a href=" http://localhost/voluculture/contact-details/"class ="btn">Contact Details</a>
<a href=" http://localhost/voluculture/activities-events/" class ="btn">Activities/Events</a>
<a href="http://localhost/voluculture/ngo-profile/" class="btn"class="btn active">Applicants</a>
<a href="javascript:void(0);" class="icon" onclick="myFunction()">
  <i class="fa fa-bars"></i>
</a>
</div>





<div class="table-responsive table-responsive-data2">
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
                                            <th>email</th>
                                            <th>DOB</th>
                                            <th>location</th>
                                            <th>nationality</th>
                                            <th>gender</th>
                                            <th>opportunity</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="tr-shadow">
                                            <td>
                                                <label class="au-checkbox">
                                                    <input type="checkbox">
                                                    <span class="au-checkmark"></span>
                                                </label>
                                            </td>
                                            <td>Lori Lynch</td>
                                            <td>
                                                <span class="block-email">lori@example.com</span>
                                            </td>
                                            <td class="desc">10-10-1995</td>
                                            <td>Langata</td>
                                            <td>
                                                <span class="status--process">Kenyan</span>
                                            </td>
                                            <td>Male</td>
                                            <td>Become an Entepreneur</td>
                                            <td>
                                                <div class="table-data-feature">
                                           <div class="profile-userbuttons">
                                                      <button type="button" class="btn btn-success btn-sm">Approve</button>
            </div>
                                                       <div class="profile-userbuttons">
                <button type="button" class="btn btn-success btn-sm">Reject</button>
            </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="spacer"></tr>
                                        <tr class="tr-shadow">
                                            <td>
                                                <label class="au-checkbox">
                                                    <input type="checkbox">
                                                    <span class="au-checkmark"></span>
                                                </label>
                                            </td>
                                            <td>Lori Lynch</td>
                                            <td>
                                                <span class="block-email">john@example.com</span>
                                            </td>
                                            <td class="desc">10-10-1995</td>
                                            <td>Langata</td>
                                            <td>
                                                <span class="status--process">Kenyan</span>
                                            </td>
                                            <td>Male</td>
                                             <td>Become An entepreneur</td>
                                            <td>
                                                <div class="table-data-feature">
                                            <div class="profile-userbuttons">
                                                      <button type="button" class="btn btn-success btn-sm">Approve</button>
                                              </div>
                                        <div class="profile-userbuttons">
                <button type="button" class="btn btn-success btn-sm">Reject</button>
            </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="spacer"></tr>
                                        <tr class="tr-shadow">
                                            <td>
                                                <label class="au-checkbox">
                                                    <input type="checkbox">
                                                    <span class="au-checkmark"></span>
                                                </label>
                                            </td>
                                            <td>Lori Lynch</td>
                                            <td>
                                                <span class="block-email">lyn@example.com</span>
                                            </td>
                                            <td class="desc">10-10-1995</td>
                                            <td>Langata</td>
                                            <td>
                                                <span class="status--denied">Kenyan</span>
                                            </td>
                                            <td>Male</td>
                                             <td>Become an Entepreneur</td>
                                            <td>
                                                <div class="table-data-feature">
                                                     <div class="profile-userbuttons">
                                                      <button type="button" class="btn btn-success btn-sm">Approve</button>
                                                                </div>
                                                       <div class="profile-userbuttons">
                            <button type="button" class="btn btn-success btn-sm">Reject</button>
                                                                </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="spacer"></tr>
                                        <tr class="tr-shadow">
                                            <td>
                                                <label class="au-checkbox">
                                                    <input type="checkbox">
                                                    <span class="au-checkmark"></span>
                                                </label>
                                            </td>
                                            <td>Lori Lynch</td>
                                            <td>
                                                <span class="block-email">doe@example.com</span>
                                            </td>
                                            <td class="desc">10-10-1995</td>
                                            <td>Langata</td>
                                            <td>
                                                <span class="status--process">Kenyan</span>
                                            </td>
                                            <td>Female</td>
                                             <td>Become a Member</td>
                                            <td>
                                                <div class="table-data-feature">
                                                        <div class="profile-userbuttons">
                                                      <button type="button" class="btn btn-success btn-sm">Approve</button>
            </div>
                                                       <div class="profile-userbuttons">
                <button type="button" class="btn btn-success btn-sm">Reject</button>
            </div>
                                               
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
<!-- Main JS-->
<script src="js/main.js"></script>
';
get_footer();
?>



