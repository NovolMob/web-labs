<?php
    include_once($_SERVER["DOCUMENT_ROOT"]."/check_url.php");
    include_once($_SERVER["DOCUMENT_ROOT"]."/mysql/products.php");
    include_once($_SERVER["DOCUMENT_ROOT"]."/mysql/orders.php");
    include_once($_SERVER["DOCUMENT_ROOT"]."/mysql/users.php");

    $temp = new Order();
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
        foreach ($orders as $key => $order) {
            $product = $products[$order->product];
            $customer = $users[$order->customer];
            $provisioner = $users[$product->provisioner];
        ?>
        <div class="mt-3 d-flex flex-column text-white border-top">
            <div class="d-flex flex-column my-3">
                <div class="d-flex flex-row w-100">
                    <h3 class="flex-grow-1">Продукт: <?php echo $product->name; ?></h3>
                    <h3>Магазин: <?php echo $provisioner->shopName; ?></h3>
                </div>
                <div class="d-flex flex-row w-100">
                    <h3 class="flex-grow-1">Количество: <?php echo $order->count; ?></h3>
                    <h3 id="price">Сумма: <?php $price = $order->count * $order->price; echo $price; ?>руб</h3>
                </div>
            </div>
            <div class="d-flex flex-row">
                <h3 class="flex-grow-1">Покупатель: <?php echo $customer->firstName." ".$customer->lastName; ?></h3>
                <form method="post">
                    <input type="hidden" name="order_id" value="<?php echo $order->id; ?>">
                    <input class="form-control form-control-lg border-white btn-primary" type="submit" name="method" value="Удалить">
                </form>
            </div>
        </div>
        <?php }?>
    </div>
</html>