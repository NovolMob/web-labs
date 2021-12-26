<?php
    include_once($_SERVER["DOCUMENT_ROOT"]."/check_url.php");
    include_once($_SERVER["DOCUMENT_ROOT"]."/mysql/products.php");
    $temp = new Product(provisioner: $user->id);
    $products = $temp->getFromTableSerialized();
    global $roles;
?>
<html lang="en">
    <h1 class="m-3 text-white">Ваши товары</h1>
    <div class="container-fluid">
        <?php foreach ($products as $id => $product) { ?>
        <div class="mb-2 p-3 bg-primary d-flex flex-row" style="height: 350px; border-radius: 20px;">
            <div class="w-50 text-center">
                <img class="w-100 h-100" src="<?php echo $product->image;?>" alt="">
            </div>
            <form method="post" class="w-50 d-flex flex-column ms-3 flex-fill text-white">
                <input type="hidden" name="product_id" value="<?php echo $id;?>">
                <div>
                    <label for="product_name"> Название:</label>
                    <input class="bg-dark text-white w-100 form-control form-control-lg" type="text" name="product_name" value="<?php echo $product->name;?>">
                </div>
                <div class="flex-grow-1 d-flex flex-column">
                    <label for="product_description"> Описание:</label>
                    <textarea class="bg-dark text-white w-100 flex-grow-1 form-control form-control-lg" name="product_description" ><?php echo $product->description;?></textarea>
                </div>
                <div class="d-flex flex-row my-3" >
                    <div class="d-flex flex-row align-items-center">
                        <label class="flex-grow-1" for="product_count">Количество:</label>
                        <input class="bg-dark text-white form-control form-control-lg mx-3" type="number" name="product_count" value="<?php echo $product->count;?>">
                    </div>
                    <div class="d-flex flex-row align-items-center">
                        <label class="flex-grow-1" for="product_price">Цена:</label>
                        <input class="bg-dark text-white form-control form-control-lg ms-3" type="number" name="product_price" value="<?php echo $product->price;?>">
                    </div>
                </div>
                <div class="d-flex flex-row">
                    <input class="w-50 form-control form-control-lg border-white btn-primary me-3" type="submit" name="method" value="Сохранить">
                    <input class="w-50 form-control form-control-lg border-white btn-primary" type="submit" name="method" value="Удалить">
                </div>
            </form>

        </div>
        <?php }?>
    </div>
</html>