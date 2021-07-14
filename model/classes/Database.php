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
}
