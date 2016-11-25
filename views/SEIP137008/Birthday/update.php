<?php
require_once '../../../vendor/autoload.php';


use App\Birthday\Birthday;

//var_dump($_POST);die;

$objBday = new Birthday();

$objBday->setData($_POST);

$objBday->update();