<?php
require_once($_SERVER['DOCUMENT_ROOT']."/mysql/mysql_util.php");
require_once($_SERVER['DOCUMENT_ROOT']."/config.php");

class MySQLTable {
    public static $connect; 

    public static function connect(): mysqli {
        global $database, $databaseUser, $databasePass, $databaseName;
        $connect = mysqli_connect(hostname: $database, username: $databaseUser, password: $databasePass, database: $databaseName);
        mysqli_query($connect, "SET NAMES utf8");
        return $connect;
    }

    static function checkConnect() {
        if (!isset(MySQLTable::$connect)) {
            MySQLTable::$connect = MySQLTable::connect();
        }
    }

    public static function getFromTable(string $database = null, string $tableName, string $where): mysqli_result|bool {
        MySQLTable::checkConnect();
        return mysqli_query(MySQLTable::$connect, createSelect($database, $tableName, $where));
    }
    
    public static function updateInTable(string $tableName, string $set, string $where): mysqli_result|bool {
        MySQLTable::checkConnect();
        return mysqli_query(MySQLTable::$connect, createUpdate($tableName, $set, $where));
    }

    public static function removeFromTable(string $tableName, string $where): mysqli_result|bool {
        MySQLTable::checkConnect();
        return mysqli_query(MySQLTable::$connect, createDelete($tableName, $where));
    }

    public static function addToTable(string $tableName, string $columns, string $values): mysqli_result|bool {
        MySQLTable::checkConnect();
        return mysqli_query(MySQLTable::$connect, createInsert($tableName, $columns, $values));
    }

    public static function createTable(string $tableName, string $columns, string $character): mysqli_result|bool {
        MySQLTable::checkConnect();
        return mysqli_query(MySQLTable::$connect, safetyCreateTableQuery($tableName, $columns, $character));
    }
}

abstract class Table {
    protected $tableName;

    abstract function createTable();
    abstract public function addToTable();
    abstract public function removeFromTable();
    abstract public function updateInTable();
    abstract public function getFromTable(): mysqli_result;
    abstract public function getFromTableSerialized(): array;
} 
?>