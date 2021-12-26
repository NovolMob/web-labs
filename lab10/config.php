<?php
    $defautRole = "customer";
    $roles = [
        "admin" => "Админ",
        "provisioner" => "Поставщик",
        "customer" => "Покупатель"
    ];
    $opened_urls = array(
        "/index.php", "/registration.php", "/authorization.php"
    );
    $imagesPath = "images";
    $imageFormats = array("jpg", "png", "gif");
    $database = "localhost";
    $databaseUser = "server";
    $databasePass = "server";
    $databaseName = "lab10";
    $usersTable = "`users`";
    $productsTable = "products";
    $ordersTable = "orders";
?>