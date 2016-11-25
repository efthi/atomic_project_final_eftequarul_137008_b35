<?php
namespace App\ProfilePicture;

use App\Model\Database as DB;
use App\Message\Message;
use App\Utility\Utility;
use PDO;


class ProfilePicture extends DB
{
    public $id;
    public $name;
    public $profile_image;


    public function __construct()
    {
        parent::__construct();
        if (!isset($_SESSION)) session_start();
    }


    public function setData($postData = NULL)
    {

        if (array_key_exists('id', $postData)) {
            $this->id = $postData['id'];
        }
        if (array_key_exists('name', $postData)) {
            $this->name = $postData['name'];
        }

        if (array_key_exists('profile_image', $postData)) {
            $this->profile_image = $postData['profile_image'];
        }

    }


    public function store()
    {

        $arrData = array($this->name, $this->profile_image);
        $sql = "Insert INTO profilepic(name, profile_image) VALUES (? , ?)";


        $STH = $this->DBH->prepare($sql); //$STH=Statement Handler


        //var_dump($arrData);die;


        $result =  $STH->execute($arrData);

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
        $sql = "SELECT * FROM profilepic WHERE visible=1";
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
        $sql = "SELECT * FROM profilepic WHERE id=".$this->id;
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
        if(!empty($this->profile_image)){
            $arrData = array($this->name, $this->profile_image);
            //print_r($arrData);die;
            $sql = "UPDATE profilepic SET name=?, profile_image=? WHERE id=".$this->id;
        }
        else {
            $arrData = array($this->name);

            $sql = "UPDATE profilepic SET name=? WHERE id=".$this->id;
            //var_dump($this->id);die;
        }

        $STH = $this->DBH->prepare($sql);
        $STH->execute($arrData);

        Utility::redirect('index.php');

    }


    public function delete(){
        $sql ="DELETE from profilepic WHERE id=".$this->id;
        $STH=$this->DBH->prepare($sql);
        $STH->execute();
        Utility::redirect('index.php');
    }

    public function trash(){
        $sql = "UPDATE profilepic SET visible= 0 WHERE id=".$this->id;
        $STH = $this->DBH->prepare($sql);
        $STH->execute();
        Utility::redirect('index.php');
    }

    public function trashitem($mode='ASSOC'){
        $sql = "SELECT * FROM profilepic WHERE visible=0";
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
        $sql = "UPDATE profilepic SET visible= 1 WHERE id=".$this->id;
        $STH = $this->DBH->prepare($sql);
        $STH->execute();
        Utility::redirect('index.php');
    }

    public function indexPaginator($page=1,$itemsPerPage=5){

        $start = (($page-1) * $itemsPerPage);

        $sql = "SELECT * from profilepic  WHERE visible ='1' LIMIT $start,$itemsPerPage";

        $STH = $this->DBH->query($sql);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $arrSomeData  = $STH->fetchAll();
        return $arrSomeData;

    }// end of indexPaginator();



    public function trashedPaginator($page=1,$itemsPerPage=5){

        $start = (($page-1) * $itemsPerPage);

        $sql = "SELECT * from profilepic  WHERE visible ='0' LIMIT $start,$itemsPerPage";

        $STH = $this->DBH->query($sql);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $arrSomeData  = $STH->fetchAll();
        return $arrSomeData;

    }// end of trashedPaginator();




    public function search($requestArray){
        $sql = "";
        if( isset($requestArray['byName']) && isset($requestArray['byGender']) )  $sql = "SELECT * FROM `profilepic` WHERE `visible` ='1' AND (`name` LIKE '%".$requestArray['search']."%' OR `profilepic` LIKE '%".$requestArray['search']."%')";
        if(isset($requestArray['byName']) && !isset($requestArray['byGender']) ) $sql = "SELECT * FROM `profilepic` WHERE `visible` ='1' AND `name` LIKE '%".$requestArray['search']."%'";
        if(!isset($requestArray['byName']) && isset($requestArray['byGender']) )  $sql = "SELECT * FROM `profilepic` WHERE `visible` ='1' AND `profilepic` LIKE '%".$requestArray['search']."%'";

        $STH  = $this->DBH->query($sql);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $allData = $STH->fetchAll();

        return $allData;

    }// end of search()



    public function getAllKeywords()
    {
        $_allKeywords = array();
        $WordsArr = array();
        $sql = "SELECT * FROM `profilepic` WHERE `visible` =1";

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
            $_allKeywords[] = trim($oneData->profile_image);
        }
        $STH = $this->DBH->query($sql);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $allData= $STH->fetchAll();
        foreach ($allData as $oneData) {

            $eachString= strip_tags($oneData->profile_image);
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

