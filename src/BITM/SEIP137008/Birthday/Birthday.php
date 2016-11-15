<?php
namespace App\Birthday;

use App\Model\Database as DB;


class Birthday extends DB
{
    public $id;
    public $name;
    public $birthdate;


    public function index(){
        echo "Im inside index method of Birthday!";
    }

    public function view(){

    }



}




