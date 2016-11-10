<?php
namespace App\ProfilePicture;

use App\Model\Database as DB;


class ProfilePicture extends DB
{
    public $id;
    public $name;
    public $gender;


    public function index(){
        echo "Im inside index method of Profile Picture!";
    }

}

