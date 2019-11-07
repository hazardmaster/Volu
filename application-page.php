<?php
/*
Template name: volunteer application for project && Events
*/
get_header();
?>

<div class="application-house">
<?php
if(!empty($_GET['oppID']) && !empty($_GET['email'])){


echo'<div class="choosediv_time ">
<script> 
$(document).ready(function(){
    $(".specific_div").css("display","none");
    $(".timecheck").hide();
    $("#full_time").click(function(){
$("#part_time").prop("checked", false);
$(".specific_div").css("display","none");
           
    });
    $("#part_time").click(function(){
        $("#full_time").prop("checked", false); 
        $(".specific_div").css("display","flex");
          
            });
$("#time_select").click(function(){
   $(".timecheck").toggle();
});


 
});</script>
<form>
<div class="headingdiv_time"><h3 id="heading_opp">Choose Time you might be available</h3></div>
<div class="radio_house">
<div class="full_div"><p id="full_p" style="color:black"><input type="radio" value="Full_time" id="full_time"> Full Time</p></div>
<div class="part_div"><p id="part_p" style="color:black"><input type="radio" value="Part_time" id="part_time"> Part Time</p></div>
</div>
<div class="specific_div">
<select id="time_select">
<option value="" selected>Choose specific time(s)</option>
</select>
<div class="timecheck movedo_timer"><p><input type="checkbox">Morning</p></div>
<div class="timecheck"><p><input type="checkbox">Mid Morning</p></div>
<div class="timecheck"><p><input type="checkbox">Afternoon</p></div>
<div class="timecheck"><p><input type="checkbox">Evening</p></div>
</div>

<div class="submitdiv_time"><button id="submit_button_time" type="submit">Confirm</button></div>
</form>
</div>';

//require('php/Application_for_volunteer.php');

//$app =  new Application();
//$app->Apply($_GET['oppID'],$_GET['email']);



}else{
echo"<div class='logindiv_opp' >
<div class='headingdiv_opp'><h3 id='heading_opp'>Login</h3></div>

<div class='userdiv_opp'>
<input id='username_opp' type='text' placeholder='Username'>
</div>
<div class='passworddiv_opp'>
<input id='password_opp' type='password' placeholder='Password'>
</div>
<div class='submitdiv_opp'>
<button id='submit_button_opp' type='submit'>Login</button>
</div>


</div>";
}


?>
</div>


