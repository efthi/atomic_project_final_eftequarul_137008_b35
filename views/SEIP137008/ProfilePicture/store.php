<?php
include_once('../../../vendor/autoload.php');
use App\ProfilePicture\ProfilePicture;

$profile_image = time().$_FILES['profile_image']['name'];

$file_path = "../../../resource/assets/profile-picture/";

$temporary_location = $_FILES['profile_image']['tmp_name'];

move_uploaded_file($temporary_location,'../../../resource/assets/profile-picture/'.$profile_image);

$file_path = $file_path.$profile_image;
$_POST['profile_image'] = $file_path;

$objProPic = new ProfilePicture();
// $_POST['image_path']=$_FILES['profilepic']['name'];
$objProPic->setData($_POST);

$objProPic->store();




?>
