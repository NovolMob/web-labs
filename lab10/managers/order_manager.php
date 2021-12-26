<?php
    include_once($_SERVER["DOCUMENT_ROOT"]."/check_url.php");
    if (!isset($user)) {
        exit;
    }
    include_once($_SERVER["DOCUMENT_ROOT"]."/mysql/products.php");
    include_once($_SERVER["DOCUMENT_ROOT"]."/mysql/orders.php");

    if (isset($_POST["method"])) {
        switch ($_POST["method"]) {
            case "Заказать":
                if (isset($_POST["order_product_id"]) && isset($_POST["order_product_count"])) {
                    $product = new Product();
                    $product->id = $_POST["order_product_id"];
                    $arr = $product->getFromTableSerialized();
                    if (!empty($arr)) {
                        $product = $arr[array_key_first($arr)];
                        if ($product->count >= (int) $_POST["order_product_count"]) {
                            $product->count -= (int) $_POST["order_product_count"];
                            $product->updateInTable();
                            $order = new Order($product->id, $user->id, $_POST["order_product_count"], $product->price);
                            $order->addToTable();
                            header("Location: /");
                        }
                    }
                }
                break;
            case "Сохранить":
                if (isset($_POST["order_id"]) && isset($_POST["order_product_count"])) {
                    $order = new Order();
                    $order->id = $_POST["order_id"];
                    $arr = $order->getFromTableSerialized();
                    if (!empty($arr)) {
                        $order = $arr[array_key_first($arr)];
                        $product = new Product();
                        $product->id = $order->product;
                        $arr = $product->getFromTableSerialized();
                        if (!empty($arr)) {
                            $product = $arr[array_key_first($arr)];
                            $product->count += $order->count - (int) $_POST["order_product_count"];
                            $product->updateInTable();
                            $order->count = (int) $_POST["order_product_count"];
                            if ($order->count == 0) {
                                $order->removeFromTable();
                            } else {
                                $order->updateInTable();
                            }
                        } else {
                            $order->removeFromTable();
                        }
                        header("Location: /");
                    }
                }
                break;
            case "Удалить":
                if (isset($_POST["order_id"])) {
                    $order = new Order();
                    $order->id = $_POST["order_id"];
                    $arr = $order->getFromTableSerialized();
                    if (!empty($arr)) {
                        $order = $arr[array_key_first($arr)];
                        $prod = new Product();
                        $prod->id = $order->product;
                        $arr = $prod->getFromTableSerialized();
                        if (!empty($arr)) {
                            $prod = $arr[array_key_first($arr)];
                            $prod->count += $order->count;
                            $prod->updateInTable();
                            $order->removeFromTable();
                        } else {
                            $order->removeFromTable();
                        }
                    }
                    header("Location: /");
                }
                break;

            default:
                # code...
                break;
        }
    }
?>