<?php

namespace App\BookTitle;

use App\Model\Database as DB;
use App\Message\Message;
use App\Utility\Utility;
use PDO;

class BookTitle extends DB
{
    public $id;
    public $book_name="";
    public $author_name="";
    public $book_info="";
    public $book_isbn="";

    public function __construct(){
        parent::__construct();
        if(!isset($_SESSION)) session_start();
    }


    public function index($fetchMode='ASSOC'){

        $STH = $this->DBH->query('SELECT * from book_title');

        $fetchMode = strtoupper($fetchMode);
        if(substr_count($fetchMode,'OBJ') > 0)
            $STH->setFetchMode(PDO::FETCH_OBJ);
        else
            $STH->setFetchMode(PDO::FETCH_ASSOC);

        $arrAllData  = $STH->fetchAll();
        return $arrAllData;


    }// end of index();


    public function view($fetchMode='ASSOC'){

        $sql ='SELECT * from book_title where id='.$this->id;
        $STH = $this->DBH->query($sql);

        $fetchMode = strtoupper($fetchMode);
        if(substr_count($fetchMode,'OBJ') > 0)
            $STH->setFetchMode(PDO::FETCH_OBJ);
        else
            $STH->setFetchMode(PDO::FETCH_ASSOC);

        $arrAllData  = $STH->fetch();
        return $arrAllData;


    }// end of index();


    public function setData($postVariableData=NULL){

        if(array_key_exists('id',$postVariableData)){
            $this->id = $postVariableData['id'];
        }

        if(array_key_exists('book_title',$postVariableData)){
            $this->book_name = $postVariableData['book_title'];
        }

        if(array_key_exists('author_name',$postVariableData)){
            $this->author_name = $postVariableData['author_name'];
        }
        if(array_key_exists('book_info',$postVariableData)){
            $this->book_info = $postVariableData['book_info'];
        }
        if(array_key_exists('book_info',$postVariableData)){
            $this->book_isbn = $postVariableData['book_isbn'];
        }
    }



    public function store(){

        $arrData = array($this->book_name,$this->author_name,$this->book_isbn, $this->book_info);
        $sql = "Insert INTO book_title(book_name, author_name, book_isbn, book_info ) VALUES (? , ? , ? , ?)";

        $result= $STH = $this->DBH->prepare($sql); //$STH=Statement Handler

        $STH->execute($arrData);

        if($result)
            Message::setMessage("<div class=\"alert alert-info\" id=\"alertmsg\"> <button type=\"button\" class=\"close\" data-dismiss=\"alert\">x</button><strong>Success! </strong> Data stored!
</div>");
        else
            Message::setMessage("<div class=\"alert alert-danger\" id=\"alertmsg\"> <button type=\"button\" class=\"close\" data-dismiss=\"alert\">x</button><strong>Failed! </strong> Data not stored!
</div>");

        Utility::redirect('create.php');

    }// end of store method


}







