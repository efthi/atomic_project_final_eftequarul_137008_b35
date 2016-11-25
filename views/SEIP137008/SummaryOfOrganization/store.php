<?php
include_once('../../../vendor/autoload.php');
use App\SummaryOfOrganization\SummaryOfOrganization;

$objSummary = new SummaryOfOrganization();

$objSummary->setData($_POST);

$objSummary->store();
