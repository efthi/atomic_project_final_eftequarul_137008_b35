<?php
require_once("../../../vendor/autoload.php");

use App\Birthday\Birthday;

$objBday = new Birthday;
$objBday->setData($_GET);
$objBday->delete();