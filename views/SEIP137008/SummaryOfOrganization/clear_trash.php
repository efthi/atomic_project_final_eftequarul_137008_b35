<?php
require_once("../../../vendor/autoload.php");

use App\SummaryOfOrganization\SummaryOfOrganization;

$objSum = new SummaryOfOrganization;
$objSum->setData($_GET);
$objSum->clear_trash();
