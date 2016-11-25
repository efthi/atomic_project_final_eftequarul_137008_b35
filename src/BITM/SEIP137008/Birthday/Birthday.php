<?php
namespace App\Birthday;

use App\Model\Database as DB;
use App\Message\Message;
use App\Utility\Utility;
use PDO;

class Birthday extends DB
{
    public $id;
    public $name;
    public $birthdate;

    public function __construct(){
        parent::__construct();
        if(!isset($_SESSION)) session_start();
    }

    public function index($fetchMode='ASSOC'){
        $sql = 'SELECT * from birthday';
        $STH =$this->DBH->query($sql);

        $fetchMode = strtoupper($fetchMode);
        if(substr_count($fetchMode,'OBJ') > 0)
            $STH->setFetchMode(PDO::FETCH_OBJ);
        else
            $STH->setFetchMode(PDO::FETCH_ASSOC);
        $tableData = $STH->fetchAll();
        return $tableData;
    }

    public function view($mode='ASSOC'){
        $sql = 'SELECT * from birthday WHERE id='.$this->id;
        $STH = $this->DBH->query($sql);

        $mode = strtoupper($mode);
        if(substr_count($mode,'OBJ') >0 ){
            $STH->setFetchMode(PDO::FETCH_OBJ);
        }
        else {
            $STH->setFetchMode(PDO::FETCH_ASSOC);
        }
        $oneData = $STH->fetch();
        return $oneData;
    }

    public function setData($postData=NULL){

        if(array_key_exists('id', $postData)){
            $this->id = $postData['id'];
        }
        if(array_key_exists('name',$postData)){
            $this->name = $postData['name'];
        }
        if(array_key_exists('bdate',$postData)){
            $this->birthdate = $postData['bdate'];
        }
    }

    public function store(){
        $allData = array($this->name,$this->birthdate);
        $sql ="INSERT INTO birthday(name,birthdate) VALUES(?,?)";

        $STH = $this->DBH->prepare($sql);
        $result = $STH->execute($allData);

        if($result)
            Message::setMessage("<div class=\"alert alert-info\" id=\"alertmsg\"> <button type=\"button\" class=\"close\" data-dismiss=\"alert\">x</button><strong>Success! </strong> Data stored!
            </div>");
        else
            Message::setMessage("<div class=\"alert alert-danger\" id=\"alertmsg\"> <button type=\"button\" class=\"close\" data-dismiss=\"alert\">x</button><strong>Failed! </strong> Data not stored!
           </div>");
        Utility::redirect('create.php');
    }

    public function update(){

        $arrData = array($this->name, $this->birthdate);

        $sql = "UPDATE birthday SET name=?, birthdate=? WHERE id=".$this->id;

        $STH = $this->DBH->prepare($sql);
        $STH->execute($arrData);

        Utility::redirect('index.php');

    }


    public function delete(){
        $sql ="DELETE from birthday WHERE id=".$this->id;
        $STH=$this->DBH->prepare($sql);
        $STH->execute();
        Utility::redirect('index.php');
    }

    public function trash(){
        $sql = "UPDATE birthday SET visible= 0 WHERE id=".$this->id;
        $STH = $this->DBH->prepare($sql);
        $STH->execute();
        Utility::redirect('index.php');
    }

    public function trashitem($mode='ASSOC'){
        $sql = "SELECT * FROM birthday WHERE visible=0";
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
        $sql = "UPDATE birthday SET visible= 1 WHERE id=".$this->id;
        $STH = $this->DBH->prepare($sql);
        $STH->execute();
        Utility::redirect('index.php');
    }


    public function indexPaginator($page=1,$itemsPerPage=5){

        $start = (($page-1) * $itemsPerPage);

        $sql = "SELECT * from birthday  WHERE visible ='1' LIMIT $start,$itemsPerPage";

        $STH = $this->DBH->query($sql);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $arrSomeData  = $STH->fetchAll();
        return $arrSomeData;

    }// end of indexPaginator();



    public function trashedPaginator($page=1,$itemsPerPage=5){

        $start = (($page-1) * $itemsPerPage);

        $sql = "SELECT * from birthday  WHERE visible ='0' LIMIT $start,$itemsPerPage";

        $STH = $this->DBH->query($sql);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $arrSomeData  = $STH->fetchAll();
        return $arrSomeData;

    }// end of trashedPaginator();




    public function search($requestArray){
        $sql = "";
        if( isset($requestArray['byName']) && isset($requestArray['byDate']) )  $sql = "SELECT * FROM `birthday` WHERE `visible` ='1' AND (`name` LIKE '%".$requestArray['search']."%' OR `birthdate` LIKE '%".$requestArray['search']."%')";
        if(isset($requestArray['byName']) && !isset($requestArray['byDate']) ) $sql = "SELECT * FROM `birthday` WHERE `visible` ='1' AND `name` LIKE '%".$requestArray['search']."%'";
        if(!isset($requestArray['byName']) && isset($requestArray['byDate']) )  $sql = "SELECT * FROM `birthday` WHERE `visible` ='1' AND `birthdate` LIKE '%".$requestArray['search']."%'";

        $STH  = $this->DBH->query($sql);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $allData = $STH->fetchAll();

        return $allData;

    }// end of search()



    public function getAllKeywords()
    {
        $_allKeywords = array();
        $WordsArr = array();
        $sql = "SELECT * FROM `birthday` WHERE `visible` =1";

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
            $_allKeywords[] = trim($oneData->birthdate);
        }
        $STH = $this->DBH->query($sql);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $allData= $STH->fetchAll();
        foreach ($allData as $oneData) {

            $eachString= strip_tags($oneData->birthdate);
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




