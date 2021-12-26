<?php
    include_once($_SERVER["DOCUMENT_ROOT"]."/check_url.php");
    include_once($_SERVER["DOCUMENT_ROOT"]."/mysql/products.php");
    include_once($_SERVER["DOCUMENT_ROOT"]."/mysql/orders.php");
    include_once($_SERVER["DOCUMENT_ROOT"]."/mysql/users.php");
    
    $temp = new Order(customer: $user->id);
    $orders = $temp->getFromTableSerialized();
    $temp = new Product();
    $products = $temp->getFromTableSerialized();
    $temp = new user();
    $users = $temp->getFromTableSerialized();
?>
<html lang="en">
    <div class="d-flex flex-column">
        <h1 class="mb-3 text-white">Ваша корзина</h1>
        <?php
        $total = 0;
        foreach ($orders as $key => $order) {
            $product = $products[$order->product];
        ?>
        <form method="post" enctype="multipart/form-data" class="mt-3 d-flex flex-column text-white border-top">
            <div class="d-flex flex-row my-3">
                <h3 class="flex-grow-1">Товар: <?php echo $product->name; ?></h3>
                <h3 class="flex-grow-1">Продавец: <?php echo $users[$product->provisioner]->shopName; ?></h3>
                <h3>Цена: <?php echo $order->price; ?>руб</h3>
            </div>
            <div class="d-flex flex-row mb-3">
                <div class="flex-grow-1 d-flex flex-row align-items-center">
                    <label for="order_product_count">Количество: </label>
                    <input class="mx-3 text-white bg-dark form-control form-control-l" type="number" name="order_product_count" onchange="" value="<?php echo $order->count; ?>" required>
                </div>
                <h3 id="price">Сумма: <?php $price = $order->count * $order->price; $total += $price; echo $price; ?>руб</h3>
            </div>
            <div class="d-flex flex-row">
                <input type="hidden" name="order_product_id" value="<?php echo $order->id; ?>">
                <input class="form-control form-control-lg border-white btn-primary me-3" type="submit" name="method" value="Сохранить">
                <input class="form-control form-control-lg border-white btn-primary" type="submit" name="method" value="Удалить">
            </div>
        </form>
        <?php }?>
        <div class="w-100 mt-3 text-end border-top">
            <h3 class="text-white">Итог: <?php echo $total; ?>руб</h3>
        </div>
    </div>
</html>