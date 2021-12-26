<?php
require_once($_SERVER['DOCUMENT_ROOT']."/mysql/mysql.php");
include_once($_SERVER['DOCUMENT_ROOT']."/config.php");
class Product extends Table {
    var $id;
    var $name;
    var $description;
    var $provisioner;
    var $price;
    var $count;
    var $image;

    function __construct(string $name = null, string $description = null, int $provisioner = null, float $price = null, int $count = null, string $image = null) {
        $this->name = $name;
        $this->description = $description;
        $this->provisioner = $provisioner;
        $this->price = $price;
        $this->count = $count;
        $this->image = $image;
        
        global $productsTable;
        $this->tableName = $productsTable;
    }

    public function createTable() {
        MySQLTable::createTable($this->tableName,
        "(
            id INT(8) AUTO_INCREMENT PRIMARY KEY,
            `name` VARCHAR(255) NOT NULL,
            description TEXT(255) NOT NULL,
            provisioner INT(8) NOT NULL,
            price FLOAT(16) NOT NULL,   
            count INT(8) NOT NULL, 
            image VARCHAR(255) NOT NULL
        )", "utf8");
    }

    public function addToTable() {
        $columns = "";
        $values = "";
        if (isset($this->name)) {
            $columns = "`name`";
            $values = "'".$this->name."'";
        }
        if (isset($this->description)) {
            $columns = $columns.", description";
            $values = $values.", '".$this->description."'";
        }
        if (isset($this->provisioner)) {
            $columns = $columns.", provisioner";
            $values = $values.", '".$this->provisioner."'";
        }
        if (isset($this->price)) {
            $columns = $columns.", price";
            $values = $values.", '".$this->price."'";
        }
        if (isset($this->count)) {
            $columns = $columns.", count";
            $values = $values.", '".$this->count."'";
        }
        if (isset($this->image)) {
            $columns = $columns.", image";
            $values = $values.", '".$this->image."'";
        }
        if(!empty($columns) && !empty($values)) {
            if (substr($columns, 0, 1) == ',') {
                $columns = substr($columns, 2);
            }
            if (substr($values, 0, 1) == ',') {
                $values = substr($values, 2);
            }
            MySQLTable::addToTable($this->tableName, "(".$columns.")", "(".$values.")");
            $this->id = mysqli_insert_id(MySQLTable::$connect);
        }
    }

    public function removeFromTable() {
        $where = $this->createProductGetWhere();
        MySQLTable::removeFromTable($this->tableName, $where);
    }

    public function createProductUpdateWhere(): string {
        $where = "";
        if (isset($this->name)) {
            $where = createWhere("`name`", $this->name);
        }
        if (isset($this->description)) {
            $where = $where.", ".createWhere("description", $this->description);
        }
        if (isset($this->provisioner)) {
            $where = $where.", ".createWhere("provisioner", $this->provisioner);
        }
        if (isset($this->price)) {
            $where = $where.", ".createWhere("price", $this->price);
        }
        if (isset($this->count)) {
            $where = $where.", ".createWhere("count", $this->count);
        }
        if (isset($this->image)) {
            $where = $where.", ".createWhere("image", $this->image);
        }
        if (substr($where, 0, 1) == ',') {
            $where = substr($where, 2);
        }
        return $where;
    }

    public function updateInTable() {
        if (isset($this->id)) {
            $set = $this->createProductUpdateWhere();
            if (!empty($set)) {
                MySQLTable::updateInTable($this->tableName, $set, createWhere("id", $this->id));
            }
        }
    }

    public function createProductGetWhere(): string {
        $where = "";
        if (isset($this->id)) {
            $where = createWhere("id", $this->id);
        } else {
            $where = $this->createProductUpdateWhere();
        }
        return $where;
    }

    public function getFromTable(): mysqli_result {
        $where = $this->createProductGetWhere();
        return MySQLTable::getFromTable(tableName: $this->tableName, where: $where);
    }

    public function getFromTableSerialized(): array {
        $res = $this->getFromTable();
        $arr = array();
        while($row = mysqli_fetch_row($res)) {
            $product = new Product($row[1], $row[2], $row[3], $row[4], $row[5], $row[6]);
            $product->id = $row[0];
            $arr[$row[0]] = $product;
        }
        return $arr;
    }

}
?>