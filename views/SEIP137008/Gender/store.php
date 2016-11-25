<?php
include_once('../../../vendor/autoload.php');
use App\Gender\Gender;

$objGender = new Gender();

$objGender->setData($_POST);

$objGender->store();