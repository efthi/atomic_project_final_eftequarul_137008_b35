<?php
namespace App\City;

use App\Model\Database as DB;


class City extends DB
{
    public $id;
    public $name;
    public $city;


    public function index(){
        echo "Im inside index method of City Class File!";
    }

}
