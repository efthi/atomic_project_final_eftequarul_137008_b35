<?php
require_once '../../../vendor/autoload.php';


use App\BookTitle\BookTitle;

$objBookInfo = new BookTitle();

$objBookInfo->setData($_POST);

$objBookInfo->update();