<?php
include_once('../../../vendor/autoload.php');
use App\Gender\Gender;

$objGend = new Gender;

$objGend->setData($_POST);

$objGend->update();

?>