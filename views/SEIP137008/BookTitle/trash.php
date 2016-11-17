<?php
include_once ('../../../vendor/autoload.php');

use App\BookTitle\BookTitle;

$makeTrash = new BookTitle();
$makeTrash->setData($_GET);
$makeTrash->trash();