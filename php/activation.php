<?php
$id = $_GET['id'];
$mail = $_SESSION['email'];
$mail_from_acti='';
$sta = 1;


$sql = "SELECT * FROM wp_user_details WHERE code = $id";
$result = mysqli_query($connection,$sql);

if(mysqli_num_rows($result) == 1){
    $row = mysqli_fetch_assoc($result);
$mail_from_acti = $row['email'];
}


if($$mail_from_acti == $mail){
    $std = "INSERT INTO wp_user_details(status_binary)VALUES('$sta')";
}

?>