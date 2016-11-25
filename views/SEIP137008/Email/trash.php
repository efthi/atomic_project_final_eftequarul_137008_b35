<?php
include_once('../../../vendor/autoload.php');
use App\Email\Email;

$objMail = new Email;

$objMail->setData($_GET);

$objMail->trash();



?>