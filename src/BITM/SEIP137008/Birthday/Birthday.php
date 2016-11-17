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


}




