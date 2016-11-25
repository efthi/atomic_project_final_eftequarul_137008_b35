<?php
namespace App\City;

use App\Model\Database as DB;
use App\Message\Message;
use App\Utility\Utility;
use PDO;

class City extends DB
{
    public $id;
    public $name;
    public $city;

    public function __construct()
    {
        parent::__construct();
        if (!isset($_SESSION)) session_start();
    }


    public function setData($postVariableData = NULL)
    {
        if (array_key_exists('id', $postVariableData)) {
            $this->id = $postVariableData['id'];
        }
        if (array_key_exists('name', $postVariableData)) {
            $this->name = $postVariableData['name'];
        }

        if (array_key_exists('city', $postVariableData)) {
            $this->city = $postVariableData['city'];
        }

    }


    public function store()
    {

        $arrData = array($this->name, $this->city);
        $sql = "Insert INTO city(name, city) VALUES (? , ?)";

        $result = $STH = $this->DBH->prepare($sql); //$STH=Statement Handler

        $STH->execute($arrData);

        if ($result)
            Message::setMessage("<div class=\"alert alert-info\" id=\"alertmsg\"> <button type=\"button\" class=\"close\" data-dismiss=\"alert\">x</button><strong>Success! </strong> Data stored!
</div>");
        else
            Message::setMessage("<div class=\"alert alert-danger\" id=\"alertmsg\"> <button type=\"button\" class=\"close\" data-dismiss=\"alert\">x</button><strong>Failed! </strong> Data not stored!
</div>");

        Utility::redirect('create.php');

        // end of store method
    }
    public function index($mode='ASSOC'){
        $sql = "SELECT * FROM city WHERE visible=1";
        $STH = $this->DBH->query($sql);

        $mode = strtoupper($mode);
        if(substr_count($mode, 'OBJ') > 0)
            $STH->setFetchMode(PDO::FETCH_OBJ);
        else
            $STH->setFetchMode(PDO::FETCH_ASSOC);
        $allData = $STH->fetchAll();
        return $allData;
    }


    public function view($mode='ASSOC'){
        $sql = "SELECT * FROM city WHERE id=".$this->id;
        $STH = $this->DBH->query($sql);

        $mode = strtoupper($mode);
        if(substr_count($mode,'OBJ')>0)
            $STH->setFetchMode(PDO::FETCH_OBJ);
        else
            $STH->setFetchMode(PDO::FETCH_ASSOC);
        $oneData = $STH->fetch();
        return $oneData;
    }

    public function update(){

        $arrData = array($this->name, $this->city);

        $sql = "UPDATE city SET name=?, city=? WHERE id=".$this->id;



        $STH = $this->DBH->prepare($sql);
        $STH->execute($arrData);

        Utility::redirect('index.php');

    }


    public function delete(){
        $sql ="DELETE from city WHERE id=".$this->id;
        $STH=$this->DBH->prepare($sql);
        $STH->execute();
        Utility::redirect('index.php');
    }

    public function trash(){
        $sql = "UPDATE city SET visible= 0 WHERE id=".$this->id;
        $STH = $this->DBH->prepare($sql);
        $STH->execute();
        Utility::redirect('index.php');
    }

    public function trashitem($mode='ASSOC'){
        $sql = "SELECT * FROM city WHERE visible=0";
        $STH = $this->DBH->query($sql);

        $mode = strtoupper($mode);
        if(substr_count($mode, 'OBJ') > 0)
            $STH->setFetchMode(PDO::FETCH_OBJ);
        else
            $STH->setFetchMode(PDO::FETCH_ASSOC);
        $allData = $STH->fetchAll();
        return $allData;
    }

    public function clear_trash(){
        $sql = "UPDATE city SET visible= 1 WHERE id=".$this->id;
        $STH = $this->DBH->prepare($sql);
        $STH->execute();
        Utility::redirect('index.php');
    }



    public function indexPaginator($page=1,$itemsPerPage=5){

        $start = (($page-1) * $itemsPerPage);

        $sql = "SELECT * from city  WHERE visible ='1' LIMIT $start,$itemsPerPage";

        $STH = $this->DBH->query($sql);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $arrSomeData  = $STH->fetchAll();
        return $arrSomeData;

    }// end of indexPaginator();



    public function trashedPaginator($page=1,$itemsPerPage=5){

        $start = (($page-1) * $itemsPerPage);

        $sql = "SELECT * from city  WHERE visible ='0' LIMIT $start,$itemsPerPage";

        $STH = $this->DBH->query($sql);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $arrSomeData  = $STH->fetchAll();
        return $arrSomeData;

    }// end of trashedPaginator();




    public function search($requestArray){
        $sql = "";
        if( isset($requestArray['byName']) && isset($requestArray['byCity']) )  $sql = "SELECT * FROM `city` WHERE `visible` ='1' AND (`name` LIKE '%".$requestArray['search']."%' OR `city` LIKE '%".$requestArray['search']."%')";
        if(isset($requestArray['byName']) && !isset($requestArray['byCity']) ) $sql = "SELECT * FROM `city` WHERE `visible` ='1' AND `name` LIKE '%".$requestArray['search']."%'";
        if(!isset($requestArray['byName']) && isset($requestArray['byCity']) )  $sql = "SELECT * FROM `city` WHERE `visible` ='1' AND `city` LIKE '%".$requestArray['search']."%'";

        $STH  = $this->DBH->query($sql);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $allData = $STH->fetchAll();

        return $allData;

    }// end of search()



    public function getAllKeywords()
    {
        $_allKeywords = array();
        $WordsArr = array();
        $sql = "SELECT * FROM `city` WHERE `visible` =1";

        $STH = $this->DBH->query($sql);
        $STH->setFetchMode(PDO::FETCH_OBJ);

        // for each search field block start
        $allData= $STH->fetchAll();
        foreach ($allData as $oneData) {
            $_allKeywords[] = trim($oneData->name);
        }

        $STH = $this->DBH->query($sql);
        $STH->setFetchMode(PDO::FETCH_OBJ);

        $allData= $STH->fetchAll();
        foreach ($allData as $oneData) {

            $eachString= strip_tags($oneData->name);
            $eachString=trim( $eachString);
            $eachString= preg_replace( "/\r|\n/", " ", $eachString);
            $eachString= str_replace("&nbsp;","",  $eachString);
            $WordsArr = explode(" ", $eachString);

            foreach ($WordsArr as $eachWord){
                $_allKeywords[] = trim($eachWord);
            }
        }
        // for each search field block end




        // for each search field block start
        $STH = $this->DBH->query($sql);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $allData= $STH->fetchAll();
        foreach ($allData as $oneData) {
            $_allKeywords[] = trim($oneData->city);
        }
        $STH = $this->DBH->query($sql);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $allData= $STH->fetchAll();
        foreach ($allData as $oneData) {

            $eachString= strip_tags($oneData->city);
            $eachString=trim( $eachString);
            $eachString= preg_replace( "/\r|\n/", " ", $eachString);
            $eachString= str_replace("&nbsp;","",  $eachString);
            $WordsArr = explode(" ", $eachString);

            foreach ($WordsArr as $eachWord){
                $_allKeywords[] = trim($eachWord);
            }
        }
        // for each search field block end


        return array_unique($_allKeywords);


    }// get all keywords




}
