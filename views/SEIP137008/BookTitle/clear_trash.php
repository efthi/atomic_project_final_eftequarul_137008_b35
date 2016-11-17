<?php
include_once ('../../../vendor/autoload.php');

use App\BookTitle\BookTitle;

$clearTrash = new BookTitle();
$clearTrash->setData($_GET);
$clearTrash->reset_trash();