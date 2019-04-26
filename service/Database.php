<?php
/**
 * 
 */
class Database
{

    function __construct()
    {

    }

    public function connect()
    {
        $dsn = sprintf("mysql:host=%s;dbname=%s", HOST, DATABASE);

        try {
            return new PDO($dsn, USERNAME, PASSWORD);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}