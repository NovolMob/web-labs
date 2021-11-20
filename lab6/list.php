<?php
    include ("db.php");

    if (!empty($_GET)) {
        DataBase::load();
        DataBase::add_data($_GET);
        DataBase::save();
        header("Location: list.php");
        exit;
    }

    DataBase::load();
    $select_name = "filter";
    $select = array(
        "Всё" => [],
        "Имя" => ["first_name"],
        "Фамилия" => ["last_name"],
        "Email" => ["email"],
        "Пол" => ["gender"],
        "Возраст" => ["age"]
    );

    echo "<form method=\"post\"><select name=\"$select_name\">";
    foreach ($select as $title => $value) {
        echo "<option value=\"$title\">$title</option>";
    }
    echo "</select>";
    echo "<input type=\"submit\">";
    echo "</form>";
    
    $selected_value = array_key_exists($select_name, $_POST) ? $_POST[$select_name] : null;
    if ($selected_value != null) {
        $headers = $select[$selected_value];
        $data = DataBase::get_data_by_headers($headers);
        foreach ($data as $array) {
            foreach ($array as $key => $value) {
                echo("$value<br>");
            }
            echo("<br>");
        }
    }



?>