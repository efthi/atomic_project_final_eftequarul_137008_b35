<?php
require_once("../../../vendor/autoload.php");

use App\Hobbies\Hobbies;

$objHobb = new Hobbies();
$objHobb->setData($_GET);
$objHobb->trash();