<?php
    include_once($_SERVER['DOCUMENT_ROOT']."/mysql/users.php");
    include_once($_SERVER['DOCUMENT_ROOT']."/config.php");
    session_start();
    $is_registred = false;
    $is_auth = false;
    $error = "";
    $user;
    if (isset($_POST["action"])) {
        $_SESSION["email"] = "";
        $_SESSION["password"] = "";
        switch ($_POST["action"]) {
            case "reg":
                if (isset($_POST["first-name"]) && isset($_POST["last-name"]) && isset($_POST["email"]) && 
                    isset($_POST["password"]) && isset($_POST["user-type"])) {
                    $user = new User(email: $_POST["email"]);
                    $arr = $user->getFromTableSerialized();
                    if (empty($arr)) {
                        $password = md5($_POST["password"]);
                        $user->firstName = $_POST["first-name"];
                        $user->lastName = $_POST["last-name"];
                        $user->password = $password;
                        $user->shopName = isset($_POST["shop-name"]) ? $_POST["shop-name"] : null;
                        global $roles;
                        if (array_key_exists($_POST["user-type"], $roles)) {
                            $user->role = $_POST["user-type"];
                        } else {
                            global $defautRole;
                            $user->role = $defautRole;
                        }
                        $user->addToTable();
                        $_SESSION["email"] = $_POST["email"];
                        $_SESSION["password"] = $password;
                        $is_registred = true;
                        $is_auth = true;
                    } else {
                        $error = "?error=1";
                    }
                }
                break;
            case "auth":
                if (isset($_POST["email"]) && isset($_POST["password"])) {
                    $password = md5($_POST["password"]);
                    $user = new User(email: $_POST["email"]);
                    $arr = $user->getFromTableSerialized();
                    if (!empty($arr)) {
                        $is_registred = true;
                        $user = $arr[array_key_first($arr)];
                        if ($user->password == $password) {
                            $_SESSION["email"] = $_POST["email"];
                            $_SESSION["password"] = $password;
                            $is_auth = true;
                        } else {
                            $error = "?error=1";
                        }
                    } else {
                        $error = "?error=1";
                    }
                }
                break;

            default:
                break;
        }
    } else if (isset($_SESSION["email"]) && isset($_SESSION["password"])) {
        $user = new User(email: $_SESSION["email"]);
        $user->createTable();
        $arr = $user->getFromTableSerialized();
        if (!empty($arr)) {
            $is_registred = true;
            $user = $arr[array_key_first($arr)];
            if ($user->password == $_SESSION["password"]) {
                $is_auth = true;
            } else {
                $error = "?error=1";
            }
        }
    }
    if (!$is_registred) {
        $user = null;
        header("Location: ./registration.php".$error);
    } else if(!$is_auth) {
        $user = null;
        header("Location: ./authorization.php".$error);
    } else {
        include_once($_SERVER["DOCUMENT_ROOT"]."/check_url.php");
    }
?>