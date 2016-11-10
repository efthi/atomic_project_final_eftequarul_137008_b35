<?php
use App\SummaryOfOrganization\SummaryOfOrganization;
require_once("../../../vendor/autoload.php");


$orginfo = new SummaryOfOrganization;
$orginfo->index();
