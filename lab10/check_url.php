<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/config.php");
    if (!in_array($_SERVER["SCRIPT_NAME"], $opened_urls)) {
        header("Location: /");
        exit;
    }
?>