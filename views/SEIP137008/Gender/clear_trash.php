<?php
require_once("../../../vendor/autoload.php");
use App\Gender\Gender;

$objGend = new Gender;
$objGend->setData($_GET);
$allData =  $objGend->clear_trash();

?>
