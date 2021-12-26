<?php
    $createLiteral = "CREATE";
    $tableLiteral = "TABLE";
    $safetyCreateTableLiteral = "IF NOT EXISTS";
    $defaultCharacterSetLiteral = "default character set";
    $selectLiteral = "SELECT";
    $allDatabases = "*";
    $fromLiteral = "FROM";
    $whereLiteral = "WHERE";
    $insertLiteral = "INSERT";
    $intoLiteral = "INTO";
    $valuesLiteral = "VALUES";
    $deleteLiteral = "DELETE";
    $updateLiteral = "UPDATE";
    $setLiteral = "SET";

    function safetyCreateTableQuery(string $tableName, string $columns, string $character): string {
        global $createLiteral, $tableLiteral, $safetyCreateTableLiteral, $defaultCharacterSetLiteral;
        return "$createLiteral $tableLiteral $safetyCreateTableLiteral $tableName $columns $defaultCharacterSetLiteral $character;";
    }

    function createSelect(string $database = null, string $tableName, string $where): string {
        global $selectLiteral, $allDatabases, $fromLiteral, $whereLiteral;
        $db = $database == null ? $allDatabases : $database;
        $w = "";
        if (isset($where) && !empty($where)) {
            $w = $whereLiteral." ".$where;
        }
        return "$selectLiteral $db $fromLiteral $tableName $w;";
    }

    function createWheres(array $wheres): string {
        $result = "";
        foreach ($wheres as $name => $params) {
            $str = createWhere($name, $params);
            $result += "$str and";
        }
        $result = mb_substr($result, 0, strlen($result) - 4);
        return "($result)";
    }

    function createWhere(string $name, string $param): string {
        return "$name='$param'";
    }

    function createColumnStrings(array $columns): string {
        $result = "";
        foreach ($columns as $name => $params) {
            $str = createColumnString($name, $params);
            $result += "$str, ";
        }
        $result = mb_substr($result, 0, strlen($result) - 2);
        return "($result)";
    }

    function createColumnString(string $name, string $params): string {
        return "$name $params";
    }

    function createInsert(string $tableName, string $columns, string $values): string {
        global $insertLiteral, $intoLiteral, $valuesLiteral;
        return "$insertLiteral $intoLiteral $tableName $columns $valuesLiteral $values;";
    }

    function createDelete(string $tableName, string $where): string {
        global $deleteLiteral, $fromLiteral, $whereLiteral;
        return "$deleteLiteral $fromLiteral $tableName $whereLiteral $where;";
    }

    function createUpdate(string $tableName, string $set, string $where): string  {
        global $updateLiteral, $setLiteral, $whereLiteral;
        return "$updateLiteral $tableName $setLiteral $set $whereLiteral $where;";
    }

?>