<?php
namespace App\Hobbies;

use App\Model\Database as DB;


class Hobbies extends DB
{
    public $id;
    public $name;
    public $hobbies;


    public function index(){
        echo "Im inside index method of Hobbies!";
    }

}

