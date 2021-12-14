<?php
require_once("mysql_util.php");

abstract class MySQLTable {
    protected $connect; 
    public $tableName;

    public function connect() {
        include_once("../config.php");
        $this->connect = mysqli_connect($database, $databaseUser, $databasePass, $databaseName);
        mysqli_query($connect, "SET NAMES utf8");
    }

    abstract function createTable();
    abstract function getFromTable($key);
}

abstract class Table extends MySQLTable {
    abstract function addToTable();
    abstract function removeFromTable();
    abstract function updateInTable();
} 
?>