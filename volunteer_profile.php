<?php 
	/**
 * Template Name: Volunteer Profile
 *
 * @package flatsome
 */
require("hazardAssets/connection.php");
require("hazardAssets/sessions.php");

get_header();

//If user is logged in he can access the profile
if (!isset($_SESSION["email"])) {
	$_SESSION["ErrorMessage"] = "Log in first to access profile";
	header("Location: http://localhost/voluculture/volunteer-login/");
	exit;
}

function profile(){
echo '
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!--Import materialize.css remember minified for production-->
  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta charset="utf-8">
</head>
<body>
  <div class="content">

    <div class="card">

      <div class="card-image">
        <img src="'.get_template_directory_uri().'/assets/img/profile.jpg" alt="profile" id="profile_photo">
        <span class="card-title volunteer-name"><strong>I know a guy.</strong></span>
        <a class="btn-floating halfway-fab waves-effect waves-light yellow darken-3">
          <i class="material-icons">camera_alt</i>
        </a>
      </div>

      <div class="card-content">

        <form class="col s12">

          <div class="row">
            <div class="input-field col s6">
              <input id="first_name" type="text" class="validate">
              <label for="first_name">First Name</label>
            </div>

            <div class="input-field col s6">
              <input id="last_name" type="text" class="validate">
              <label for="last_name">Last Name</label>
            </div>

          </div>

          <div class="row">
            <div class="input-field col s12">
              <input id="email" type="email" class="validate">
              <label for="email">Email</label>
            </div>
          </div>

          <div class="row">
            <div class="input-field col s12">
              <input id="telephone" type="text" class="validate">
              <label for="telephone">Telephone</label>
            </div>
          </div>

          <div class="row">
            <div class="input-field col s12">
              <select name="gender">
                <option value="" disabled selected>Choose your gender</option>
                <option value="F">Female</option>
                <option value="M">Male</option>
              </select>
              <label for="gender">Gender</label>
            </div>
          </div>

          <div class="row">
            <div class="input-field col s12">
              <select name="nationality" class="select-dropdown">
                <option value="" disabled selected>Choose your nationality</option>
              	<option value="AFG">Afghanistan</option>
              	<option value="ALA">Åland Islands</option>
              	<option value="ALB">Albania</option>
              	<option value="DZA">Algeria</option>
              	<option value="ASM">American Samoa</option>
              </select>
              <label for="country">Select country</label>
            </div>
          </div>

          <div class="row">
            <div class="file-field input-field">
              <!--send to uploads dir-->
              <div class="btn">
                <span>Photo</span>
                <input type="file" onchange="readURL(this);">
              </div>
              <div class="file-path-wrapper">
                <input class="file-path validate" type="text">
              </div>
            </div>
          </div>

          <div class="row update" style="float:right">
            <button class="btn waves-effect waves-light" type="submit" name="action">Edit
              <i class="material-icons right">edit</i>
            </button>
            <button class="btn waves-effect waves-light" type="submit" name="action">Save
              <i class="material-icons right">save</i>
            </button>
          </div>

        </form>
      </div>
    </div>

    <div class="history_table">
      <div class="history">
        <table class="striped responsive-table">
          <thead>
            <tr>
              <th>No.</th>
              <th>Opportunity</th>
              <th>NGO</th>
              <th>Status</th>
              <th>Feedback</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>

  </div>
    <!--JavaScript at end of body for optimized loading-->
  <!-- Remember minified for production-->
  </script>
</body>
</html>

		';
	}
	profile();


get_footer();

 ?>