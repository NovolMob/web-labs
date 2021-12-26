<?php
require_once($_SERVER['DOCUMENT_ROOT']."/mysql/mysql.php");
include_once($_SERVER['DOCUMENT_ROOT']."/config.php");
class Order extends Table {
    var $id;
    var $product;
    var $customer;
    var $count;
    var $price;

    function __construct(int $product = null, int $customer = null, int $count = null, float $price = null) {
        $this->product = $product;
        $this->customer = $customer;
        $this->count = $count;
        $this->price = $price;
        
        global $ordersTable;
        $this->tableName = $ordersTable;
    }

    public function createTable() {
        MySQLTable::createTable($this->tableName,
        "(
            id INT(8) AUTO_INCREMENT PRIMARY KEY,
            product INT(8) NOT NULL,
            customer INT(8) NOT NULL,
            count INT(8) NOT NULL,
            price INT(8) NOT NULL
        )", "utf8");
    }

    public function addToTable() {
        $columns = "";
        $values = "";
        if (isset($this->product)) {
            $columns = "`product`";
            $values = "'".$this->product."'";
        }
        if (isset($this->customer)) {
            $columns = $columns.", customer";
            $values = $values.", '".$this->customer."'";
        }
        if (isset($this->count)) {
            $columns = $columns.", count";
            $values = $values.", '".$this->count."'";
        }
        if (isset($this->price)) {
            $columns = $columns.", price";
            $values = $values.", '".$this->price."'";
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
        $where = $this->createOrderGetWhere();
        MySQLTable::removeFromTable($this->tableName, $where);
    }

    public function createOrderUpdateWhere(): string {
        $where = "";
        if (isset($this->product)) {
            $where = createWhere("product", $this->product);
        }
        if (isset($this->customer)) {
            $where = $where.", ".createWhere("customer", $this->customer);
        }
        if (isset($this->count)) {
            $where = $where.", ".createWhere("count", $this->count);
        }
        if (isset($this->price)) {
            $where = $where.", ".createWhere("price", $this->price);
        }
        if (substr($where, 0, 1) == ',') {
            $where = substr($where, 2);
        }
        return $where;
    }

    public function updateInTable() {
        if (isset($this->id)) {
            $set = $this->createOrderUpdateWhere();
            if (!empty($set)) {
                MySQLTable::updateInTable($this->tableName, $set, createWhere("id", $this->id));
            }
        }
    }

    public function createOrderGetWhere(): string {
        $where = "";
        if (isset($this->id)) {
            $where = createWhere("id", $this->id);
        } else {
            $where = $this->createOrderUpdateWhere();
        }
        return $where;
    }

    public function getFromTable(): mysqli_result {
        $where = $this->createOrderGetWhere();
        return MySQLTable::getFromTable(tableName: $this->tableName, where: $where);
    }

    public function getFromTableSerialized(): array {
        $res = $this->getFromTable();
        $arr = array();
        while($row = mysqli_fetch_row($res)) {
            $order = new Order($row[1], $row[2], $row[3], $row[4]);
            $order->id = $row[0];
            $arr[$row[0]] = $order;
        }
        return $arr;
    }

}
?>