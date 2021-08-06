<?php

/**
 * this class allows us to connect to our database
 *  by creating an instantiation of the class */

namespace App;

use PDO;
use PDOException;

class Database
{
    private static $dbName = "e-commerce";
    private static $host = "localhost";
    private static $username = "root";
    private static $password = "";
    private static $conn = null;
    private $req;

   /* public function __construct($host=null, $username=null,$password=null,$dbName=null){
        if($host !=null){
            $this->host=$host;
            $this->username=$username;
            $this->password=$password;
            $this->dbName=$dbName;
           
        }
        try{
             $this->db=new PDO('mysql:host='.$this->host.';dbname='.$this->database, $this->username, $this->password, array(
                 PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES UTF8',
                 PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING ));

         }catch(PDOException $e){
             
             die('<h1>impossible de se connecter à  la base de données</h1>');
         }
         

      }  */

    public static function getConnection()
    {
        /*Only one connection is authorized for the entire duration of
            access to the database. If the connection does not exist
            we create a connection*/

        if (self::$conn == null) {

            try {
                self::$conn = new PDO(
                    "mysql:host=" . self::$host . "; dbname=" . self::$dbName,
                    self::$username,
                    self::$password
                );
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Impossible de se connecter à la DB: " . $e->getMessage();
            }
        }

        return self::$conn;
    }

    public static function closeConnection()
    {
        self::$conn = null;
    }
   
    public function getInfoBdd($sql){
        $this->req=$this->getConnection()->prepare($sql);
         $this->req->execute();
         return $this->req->fetchAll(PDO::FETCH_OBJ);
        /* $rowProduit = $stmt->fetchAll(PDO::FETCH_ASSOC);
         foreach ($rowProduit as $key=> $value) {
            echo $rowProduit;
             
             return $rowProduit;
        }*/
     }
    
     
}















 /*
     fonction a ne pas toucher pour réutiliser sur d'autre projet ne pas toucher
    public function getdb($sql){
            

        $this->req=$this->getConnection()->prepare($sql);
        $this->req->execute();
        $contains=$this->req->fetchAll(PDO::FETCH_ASSOC); 
        foreach ($contains as $key=>$value) {
          // echo $value['nom'];
           return $contains;
        }
        
    }*/