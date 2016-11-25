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


    public function setData($postData=NULL){

        if(array_key_exists('id',$postData)){
            $this->id = $postData['id'];
        }

        if(array_key_exists('book_title',$postData)){
            $this->book_name = $postData['book_title'];
        }

        if(array_key_exists('author_name',$postData)){
            $this->author_name = $postData['author_name'];
        }
        if(array_key_exists('book_info',$postData)){
            $this->book_info = $postData['book_info'];
        }
        if(array_key_exists('book_info',$postData)){
            $this->book_isbn = $postData['book_isbn'];
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

    public function index($fetchMode='ASSOC'){
        $sql="SELECT * from book_title WHERE visible = 1";
        $STH = $this->DBH->query($sql);

        $fetchMode = strtoupper($fetchMode);
        if(substr_count($fetchMode,'OBJ') > 0)
            $STH->setFetchMode(PDO::FETCH_OBJ);
        else
            $STH->setFetchMode(PDO::FETCH_ASSOC);

        $arrAllData  = $STH->fetchAll();
        return $arrAllData;


    }// end of index();

    public function view($fetchMode='ASSOC'){

        $sql = 'SELECT * from book_title where id='.$this->id;

        $STH = $this->DBH->query($sql);

        $fetchMode = strtoupper($fetchMode);
        if(substr_count($fetchMode,'OBJ') > 0)
            $STH->setFetchMode(PDO::FETCH_OBJ);
        else
            $STH->setFetchMode(PDO::FETCH_ASSOC);

        $arrOneData  = $STH->fetch();
        return $arrOneData;


    }// end of view();

    public function update(){

        $arrData = array($this->book_name,$this->author_name,$this->book_isbn, $this->book_info);
        $sql = "UPDATE book_title SET book_name=?, author_name=?, book_isbn=?, book_info=? WHERE id=".$this->id;

        $STH = $this->DBH->prepare($sql);
        $STH->execute($arrData);
        Utility::redirect('view.php?id='.$this->id);
    }

    public function delete(){

        $sql='DELETE from book_title WHERE id='.$this->id;
        $STH = $this->DBH->prepare($sql);
        $STH->execute();
        Utility::redirect('index.php');
    }

    public function trash(){
        $sql = "UPDATE book_title SET visible=0 WHERE id=".$this->id;
        $STH = $this->DBH->prepare($sql);
        $STH->execute();
        Utility::redirect('index.php');
    }

    public function trash_item($mode='ASSOC'){
        $sql ="SELECT * from book_title WHERE visible = 0";
        $STH = $this->DBH->query($sql);
        $mode = strtoupper($mode);
        if(substr_count($mode,'OBJ')>0)
            $STH->setFetchMode(PDO::FETCH_OBJ);
        else
            $STH->setFetchMode(PDO::FETCH_ASSOC);
        $trashData = $STH->fetchAll();
        return $trashData;
    }

    public function reset_trash(){
        $sql = "UPDATE book_title SET visible=1 WHERE id=".$this->id;
        $STH = $this->DBH->prepare($sql);
        $STH->execute();
        Utility::redirect('index.php');
    }

    public function indexPaginator($page=1,$itemsPerPage=5){

        $start = (($page-1) * $itemsPerPage);

        $sql = "SELECT * from book_title  WHERE visible ='1' LIMIT $start,$itemsPerPage";

        $STH = $this->DBH->query($sql);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $arrSomeData  = $STH->fetchAll();
        return $arrSomeData;

    }// end of indexPaginator();



    public function trashedPaginator($page=0,$itemsPerPage=5){

        $start = (($page-1) * $itemsPerPage);

        $sql = "SELECT * from book_title  WHERE visible ='0' LIMIT $start,$itemsPerPage";

        $STH = $this->DBH->query($sql);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $arrSomeData  = $STH->fetchAll();
        return $arrSomeData;

    }// end of trashedPaginator();




    public function search($requestArray){
        $sql = "";
        if( isset($requestArray['byTitle']) && isset($requestArray['byAuthor']) )  $sql = "SELECT * FROM `book_title` WHERE `visible` ='1' AND (`book_name` LIKE '%".$requestArray['search']."%' OR `author_name` LIKE '%".$requestArray['search']."%')";
        if(isset($requestArray['byTitle']) && !isset($requestArray['byAuthor']) ) $sql = "SELECT * FROM `book_title` WHERE `visible` ='1' AND `book_name` LIKE '%".$requestArray['search']."%'";
        if(!isset($requestArray['byTitle']) && isset($requestArray['byAuthor']) )  $sql = "SELECT * FROM `book_title` WHERE `visible` ='1' AND `author_name` LIKE '%".$requestArray['search']."%'";

        $STH  = $this->DBH->query($sql);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $allData = $STH->fetchAll();

        return $allData;

    }// end of search()



    public function getAllKeywords()
    {
        $_allKeywords = array();
        $WordsArr = array();
        $sql = "SELECT * FROM `book_title` WHERE `visible` =1";

        $STH = $this->DBH->query($sql);
        $STH->setFetchMode(PDO::FETCH_OBJ);

        // for each search field block start
        $allData= $STH->fetchAll();
        foreach ($allData as $oneData) {
            $_allKeywords[] = trim($oneData->book_name);
        }

        $STH = $this->DBH->query($sql);
        $STH->setFetchMode(PDO::FETCH_OBJ);

        $allData= $STH->fetchAll();
        foreach ($allData as $oneData) {

            $eachString= strip_tags($oneData->book_name);
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
            $_allKeywords[] = trim($oneData->author_name);
        }
        $STH = $this->DBH->query($sql);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $allData= $STH->fetchAll();
        foreach ($allData as $oneData) {

            $eachString= strip_tags($oneData->author_name);
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


?>



