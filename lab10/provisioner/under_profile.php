<?php
    include_once($_SERVER["DOCUMENT_ROOT"]."/check_url.php");
?>
<html lang="en">
    <div class="d-flex flex-column">
        <h1 class="mb-3 text-white">Добавить товар</h1>
        <form method="post" enctype="multipart/form-data" class="d-flex flex-column flex-fill text-white">
            <div>
                <label for="product_name"> Название:</label>
                <input class="bg-dark text-white w-100 form-control form-control-lg" type="text" name="product_name" required>
            </div>
            <div class="flex-grow-1 d-flex flex-column mb-3">
                <label for="product_description"> Описание:</label>
                <textarea class="bg-dark text-white w-100 flex-grow-1 form-control form-control-lg" name="product_description" required></textarea>
            </div>
            <div class="d-flex flex-row align-items-center">
                <label class="flex-grow-1" for="product_image"> Картинка:</label>
                <input class="ms-3 bg-dark text-white w-100 form-control form-control-lg" type="file" name="product_image" required>
            </div>
            <div class="d-flex flex-row my-3" >
                <div class="d-flex flex-row align-items-center">
                    <label class="flex-grow-1" for="product_count">Количество:</label>
                    <input class="bg-dark text-white form-control form-control-lg mx-3" type="number" name="product_count" required>
                </div>
                <div class="d-flex flex-row align-items-center">
                    <label class="flex-grow-1" for="product_price">Цена:</label>
                    <input class="bg-dark text-white form-control form-control-lg ms-3" type="number" name="product_price" required>
                </div>
            </div>
            <input class="w-50 form-control form-control-lg border-white btn-primary" type="submit" name="method" value="Добавить">
        </form>
    </div>
</html>