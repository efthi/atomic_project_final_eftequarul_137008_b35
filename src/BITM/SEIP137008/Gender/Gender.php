<?php
namespace App\Gender;

use App\Model\Database as DB;


class Gender extends DB
{
    public $id;
    public $name;
    public $gender;


    public function index(){
        echo "Im inside index method of Gender!";
    }

}

