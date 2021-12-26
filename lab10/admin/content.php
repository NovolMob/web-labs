<?php
    include_once($_SERVER["DOCUMENT_ROOT"]."/check_url.php");
    include_once($_SERVER["DOCUMENT_ROOT"]."/mysql/products.php");
    include_once($_SERVER["DOCUMENT_ROOT"]."/mysql/users.php");
    include_once($_SERVER["DOCUMENT_ROOT"]."/managers/product_manager.php");
    $temp = new Product();
    $products = $temp->getFromTableSerialized();
    $countInRow = 3;
    $temp = new User();
    $users = $temp->getFromTableSerialized();
?>
<html lang="en">
    <body>
        <h1 class="m-3 text-white">Товары</h1>
        <div class=""><?php 
            $i = -1;
            foreach ($products as $id => $product) { 
                $i++;
                $provisioner = $users[$product->provisioner];
                echo $i % $countInRow == 0 ? "<div class=\"d-flex pe-3\">" : "";
            ?><div class="card text-white mb-3 bg-primary ms-3" style="width: 32%;">
                    <div class="h-50">
                        <img class="card-img h-100" src="<?php echo $product->image; ?>" alt="">
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h2 class="card-title"><?php echo $product->name; ?></h2>
                        <p class="flex-grow-1"><?php echo $product->description; ?></p>
                        <form method="post" class="d-flex flex-column">
                            <input type="hidden" name="product_id" value="<?php echo $product->id; ?>">
                            <input class="form-control form-control-lg border-white btn-primary" type="submit" name="method" value="Удалить">
                        </form>
                    </div>
                    <div class="card-footer d-flex flex-row" >
                        <div class="flex-grow-1 me-3">
                            <h6>Магазин: <?php echo $provisioner->shopName;?></h6>
                            <h6>Осталось: <?php echo $product->count;?></h6>
                        </div>
                        <div class="">
                            <h4>Цена: <?php echo $product->price; ?>руб</h4>
                        </div>
                    </div>
                </div>
            <?php echo $i % $countInRow == $countInRow - 1 ? "</div>" : ""; }
            echo $i % $countInRow != $countInRow - 1 ? "</div>" : "";?>
        </div>
    </body>
</html>