<?php
include_once('../../../vendor/autoload.php');
use App\Birthday\Birthday;
use App\Message\Message;
use App\Utility\Utility;

if(empty($_POST['name']) && empty($_POST['bdate'])){
    Message::setMessage("<div class=\"alert alert-danger\" id=\"alertmsg\"> <button type=\"button\" class=\"close\" data-dismiss=\"alert\">x</button><strong>Failed! </strong> Data not stored!
            </div>");
    Utility::redirect('create.php');
}
else {
    $objbirthday = new Birthday();

    $objbirthday->setData($_POST);

    $objbirthday->store();
}
