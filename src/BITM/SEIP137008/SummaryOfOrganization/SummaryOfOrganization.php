<?php
namespace App\SummaryOfOrganization;

use App\Model\Database as DB;


class SummaryOfOrganization extends DB
{
    public $id;
    public $name;
    public $summary;


    public function index(){
        echo "Im inside index method of Summary of Organization!";
    }

}

