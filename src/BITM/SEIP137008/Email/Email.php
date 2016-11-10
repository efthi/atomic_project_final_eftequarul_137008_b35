<?php
namespace App\Email;

use App\Model\Database as DB;


class Email extends DB
{
    public $id;
    public $name;
    public $emailaddress;


    public function index(){
        echo "Im inside index method of Email!";
    }

}
