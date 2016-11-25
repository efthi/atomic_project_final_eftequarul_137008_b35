<?php
require_once '../../../vendor/autoload.php';


use App\ProfilePicture\ProfilePicture;

$objUp = new ProfilePicture();
$objUp->setData($_GET);

$objUp->trash();