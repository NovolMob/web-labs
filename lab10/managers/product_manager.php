<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/check_url.php");
include_once($_SERVER["DOCUMENT_ROOT"]."/mysql/orders.php");
include_once($_SERVER["DOCUMENT_ROOT"]."/mysql/products.php");
include_once($_SERVER["DOCUMENT_ROOT"]."/mysql/users.php");
if (!isset($user)) {
    exit;
}

if (isset($_POST["method"])) {
    switch ($_POST["method"]) {
        case "Сохранить":
            if (isset($_POST["product_id"])) {
                $product = new Product();
                $product->id = $_POST["product_id"];
                $product->name = $_POST["product_name"];
                $product->description = $_POST["product_description"];
                $product->count = $_POST["product_count"];
                $product->price = $_POST["product_price"];
                $product->updateInTable();
                header("Location: /");
            }
            break;
        case "Добавить":
            if (isset($_POST["product_name"]) && isset($_POST["product_description"]) && isset($_POST["product_price"])
                 && isset($_POST["product_count"]) && $_FILES && $_FILES["product_image"]["error"] == UPLOAD_ERR_OK) {
                require_once($_SERVER["DOCUMENT_ROOT"]."/file_util.php");
                global $imagesPath;
                require_once($_SERVER["DOCUMENT_ROOT"]."/".$imagesPath."/image_util.php");
                if (!isImage($_FILES["product_image"]["name"])) {
                    exit;
                }
                $photo_number = countImagesIn(".\\") + 1;
                $name = $imagesPath."/".$_FILES["product_image"]["name"];
                if (file_exists($name)) {
                    $extension = getExtension($_FILES["product_image"]["name"]);
                    $id = 1;
                    $only_name = str_replace(".$extension", "", $name);
                    do {
                        $name = $imagesPath."/$only_name($id).$extension";
                        $id++;
                    } while (file_exists($name));
                }
                move_uploaded_file($_FILES["product_image"]["tmp_name"], $name);
                $product = new Product($_POST["product_name"], $_POST["product_description"], $user->id, $_POST["product_price"], $_POST["product_count"], $name);
                $product->addToTable();
                header("Location: /");
            }
            break;
        case "Удалить":
            if (isset($_POST["product_id"])) {
                $product = new Product();
                $product->id = $_POST["product_id"];
                $product->removeFromTable();
                $temp = new Order();
                $temp->product = $product->id;
                $temp->removeFromTable();
                header("Location: /");
            }
            break;
        default:
            break;
    }
}

?>