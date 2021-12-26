<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/check_url.php");
include_once($_SERVER["DOCUMENT_ROOT"]."/mysql/users.php");
if (!isset($user)) {
    exit;
}
if (isset($_POST["shopName"])) {
    $user->shopName = $_POST["shopName"];
    $user->updateInTable();
}
?>