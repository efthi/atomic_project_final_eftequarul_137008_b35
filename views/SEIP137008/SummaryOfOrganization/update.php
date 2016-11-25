<?php
require_once '../../../vendor/autoload.php';


use App\SummaryOfOrganization\SummaryOfOrganization;
//print_r($_POST);die;
$objSumm = new SummaryOfOrganization();

$objSumm->setData($_POST);

$objSumm->update();