<?php
require_once("mysql.php");
class Product extends Table {
    var $id;
    var $name;
    var $provisioner;
    var $price;
    var $count;
    var $image;

    function __construct(string $name, string $provisioner, float $price, int $count, string $image) {
        $this->$name = $name;
        $this->$provisioner = $provisioner;
        $this->$price = $price;
        $this->$count = $count;
        $this->$image = $image;
        include_once("../config.php");
        $this->tableName = $productsTable;
    }

    function toString(): string {
        return "(" + ($name ?? "") + ", " + ($provisioner ?? "") + ", " + ($price ?? 0.0) + ", " + ($count ?? 0) + ", " + ($image ?? "") + ")";
    }

    function createTable() {
        mysqli_query($this->connect, safetyCreateTableQuery($this->tableName, 
        "(
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR NOT NULL,
            provisioner VARCHAR NOT NULL,
            price FLOAT NOT NULL,   
            count INT NOT NULL, 
            image VARCHAR NOT NULL
        )", "utf8"));
    }

    function addToTable() {
        mysqli_query($this->connect, createInsert($this->tableName, 
            "(name, provisioner, price, count, image)",
            $this->toString()
        ));
    }

    function removeFromTable() {
        if (isset($id)) {
            mysqli_query($this->connect, createDelete($this->tableName, createWhere("id", $id)));
        }
    }

    function updateInTable() {
            
    }

    function getFromTable($key) {

    }

}
?>