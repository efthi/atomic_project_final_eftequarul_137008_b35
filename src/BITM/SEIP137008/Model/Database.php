<?php
namespace App\Model;

use PDO;
use PDOException;

class Database
{
    public $DBH; // DataBase Handler
    public $host="localhost";
    public $dbname="atomic_project_b35_ea";
    public $dbuser="root";
    public $dbpass="root";

    public function __construct()
    {

        try{
            $this->DBH = new PDO("mysql:host=$this->host; dbname=$this->dbname", $this->dbuser ,$this->dbpass);
            echo "Connected successfully!(msg from database.php)<br>";
        }
        catch(PDOException $error){
            $error->getMessage();
        }

    }
}





