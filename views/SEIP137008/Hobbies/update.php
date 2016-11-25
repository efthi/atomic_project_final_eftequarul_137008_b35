<?php
require_once '../../../vendor/autoload.php';


use App\Hobbies\Hobbies;
//print_r($_POST);die;
$objSumm = new Hobbies();

$objSumm->setData($_POST);

$objSumm->update();