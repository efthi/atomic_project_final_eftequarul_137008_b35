<?php
include_once ('../../../vendor/autoload.php');

use App\BookTitle\BookTitle;

$objbooktitle = new BookTitle();
$objbooktitle->setData($_GET);
$objbooktitle->delete();