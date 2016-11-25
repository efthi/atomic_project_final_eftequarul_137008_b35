<?php
require_once("../../../vendor/autoload.php");

use App\City\City;

$objcity = new City;
$objcity->setData($_GET);
$objcity->clear_trash();