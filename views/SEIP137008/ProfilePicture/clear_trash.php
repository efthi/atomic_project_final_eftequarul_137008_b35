<?php
require_once '../../../vendor/autoload.php';


use App\ProfilePicture\ProfilePicture;
//print_r($_POST);die;
$objUp = new ProfilePicture();

$objUp->setData($_GET);

$objUp->clear_trash();