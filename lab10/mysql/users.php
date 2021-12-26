<?php

use function PHPSTORM_META\type;

include_once($_SERVER['DOCUMENT_ROOT']."/mysql/mysql.php");
include_once($_SERVER['DOCUMENT_ROOT']."/config.php");
class User extends Table {
    var $id;
    var $email;
    var $password;
    var $firstName;
    var $lastName;
    var $role;
    var $shopName;

    function __construct(string $email = null, string $password = null, string $firstName = null, string $lastName = null, string $role = null, string $shopName = null) {
        $this->email = $email;
        $this->password = $password;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->role = $role;
        $this->shopName = $shopName;

        global $usersTable;
        $this->tableName = $usersTable;
    }

    public function createTable() {
        MySQLTable::createTable($this->tableName,
        "(
            id INT(8) AUTO_INCREMENT PRIMARY KEY,
            email VARCHAR(255) NOT NULL,
            password VARCHAR(255) NOT NULL,
            firstName VARCHAR(255) NOT NULL,   
            lastName VARCHAR(255) NOT NULL, 
            `role` VARCHAR(255) NOT NULL, 
            shopName VARCHAR(255) NULL
        )", "utf8");
    }

    public function addToTable() {
        $columns = "";
        $values = "";
        if (isset($this->email)) {
            $columns = "email";
            $values = "'".$this->email."'";
        }
        if (isset($this->password)) {
            $columns = $columns.", password";
            $values = $values.", '".$this->password."'";
        }
        if (isset($this->firstName)) {
            $columns = $columns.", firstName";
            $values = $values.", '".$this->firstName."'";
        }
        if (isset($this->lastName)) {
            $columns = $columns.", lastName";
            $values = $values.", '".$this->lastName."'";
        }
        if (isset($this->role)) {
            $columns = $columns.", `role`";
            $values = $values.", '".$this->role."'";
        }
        if (isset($this->shopName)) {
            $columns = $columns.", shopName";
            $values = $values.", '".$this->shopName."'";
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
        $where = $this->createUserGetWhere();
        MySQLTable::removeFromTable($this->tableName, $where);
    }

    public function createUserUpdateWhere(): string {
        $where = "";
        if (isset($this->password)) {
            $where = createWhere("password", $this->password);
        }
        if (isset($this->firstName)) {
            $where = $where.", ".createWhere("firstName", $this->firstName);
        }
        if (isset($this->lastName)) {
            $where = $where.", ".createWhere("lastName", $this->lastName);
        }
        if (isset($this->role)) {
            $where = $where.", ".createWhere("role", $this->role);
        }
        if (isset($this->shopName)) {
            $where = $where.", ".createWhere("shopName", $this->shopName);
        }
        if (substr($where, 0, 1) == ',') {
            $where = substr($where, 2);
        }
        return $where;
    }

    public function updateInTable() {
        if (isset($this->id) || isset($this->email)) {
            $set = $this->createUserUpdateWhere();
            if (!empty($set)) {
                $where = isset($this->id) ? createWhere("id", $this->id) : createWhere("email", $this->email);
                MySQLTable::updateInTable($this->tableName, $set, $where);
            }
        }
    }

    public function createUserGetWhere(): string {
        $where = "";
        if (isset($this->id)) {
            $where = createWhere("id", $this->id);
        } else if (isset($this->email)) {
            $where = createWhere("email", $this->email);
        } else {
            $where = $this->createUserUpdateWhere();
        }
        return $where;
    }

    public function getFromTable(): mysqli_result {
        $where = $this->createUserGetWhere();
        return MySQLTable::getFromTable(tableName: $this->tableName, where: $where);
    }

    public function getFromTableSerialized(): array {
        $res =  $this->getFromTable();
        $arr = array();
        while($row = mysqli_fetch_row($res)) {
            $user = new User($row[1], $row[2], $row[3], $row[4], $row[5], $row[6]);
            $user->id = $row[0];
            $arr[$row[0]] = $user;
        }
        return $arr;
    }

}
?>