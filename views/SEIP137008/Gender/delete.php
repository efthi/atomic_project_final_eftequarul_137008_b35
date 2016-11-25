<?php
require_once("../../../vendor/autoload.php");

use App\Gender\Gender;

$objPic = new Gender();
$objPic->setData($_GET);
$objPic->delete();