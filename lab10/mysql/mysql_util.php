<?php
    $createLiteral = "create";
    $tableLiteral = "table";
    $safetyCreateTableLiteral = "if not exists";
    $defaultCharacterSetLiteral = "default character set";
    $selectLiteral = "select";
    $allDatabases = "*";
    $fromLiteral = "from";
    $whereLiteral = "where";
    $insertLiteral = "insert";
    $intoLiteral = "into";
    $valuesLiteral = "values";
    $deleteLiteral = "delete";

    function safetyCreateTableQuery(string $tableName, string $columns, string $character): string {
        global $createLiteral, $tableLiteral, $safetyCreateTableLiteral, $defaultCharacterSetLiteral;
        return "$createLiteral $tableLiteral $safetyCreateTableLiteral $tableName $columns $defaultCharacterSetLiteral $character;";
    }

    function getQuery(string $database = null, string $tableName, string $where): string {
        global $selectLiteral, $allDatabases, $fromLiteral, $whereLiteral;
        $db = $database == null ? $allDatabases : $database;
        return "$selectLiteral $db $fromLiteral $tableName $whereLiteral $where;";
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

?>