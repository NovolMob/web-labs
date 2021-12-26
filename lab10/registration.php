<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="style/main.css" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js"></script>
</head>
<?php
    include_once($_SERVER["DOCUMENT_ROOT"]."/check_url.php");
    $color = "bg-dark";
    if (isset($_GET["error"])) {
        $color = "bg-danger";
    }
?>
<body>
    <form action="authenfication.php" method="post" enctype="multipart/form-data" class="block mx-auto <?php echo $color; ?> p-4 text-primary" style="width: 25%; margin-top: 13%;">
        <div class="justify-content-center d-flex form-group">
            <h1 class="text-white">Регистрация</h1>
        </div>
        <input type="hidden" name="action" value="reg">
        <div class=" mb-1 form-group">
            <input class="form-control form-control-lg bg-dark text-white" type="text" name="first-name" placeholder="Имя" autocomplete="off" required>
        </div>
        <div class="mb-3 form-group">
            <input class="form-control form-control-lg bg-dark text-white" type="text" name="last-name" placeholder="Фамилия" autocomplete="off" required>
        </div>
        <div class=" mb-1 form-group">
            <input class="form-control form-control-lg bg-dark text-white" type="email" name="email" placeholder="Почта" autocomplete="off" required>
        </div>
        <div class="mb-3 form-group">
            <input class="form-control form-control-lg bg-dark text-white" type="password" name="password" placeholder="Пароль" autocomplete="off" required>
        </div>
        <div id="for_provisioner" hidden="on" class=" mb-3 form-group">
            <input id="shop_name_input" class="form-control form-control-lg bg-dark text-white" type="text" name="shop-name" placeholder="Название магазина" autocomplete="off">
        </div>
        <div class="d-flex form-group">
            <div class="flex-grow-1">
                <div>
                    <label class="text-white" for="user-type">Покупатель</label>
                    <input class="form-check-input pe-2" type="radio" name="user-type" value="customer" onchange='document.getElementById("for_provisioner").hidden = true; document.getElementById("shop_name_input").removeAttribute("required") ; document.getElementById("shop_name_input").value = ""' checked required>
                </div>
                <div>
                    <label class="text-white" for="user-type">Продавец</label>
                    <input class="form-check-input ps-2" type="radio" name="user-type" value="provisioner" onchange='document.getElementById("for_provisioner").hidden = false; document.getElementById("shop_name_input").setAttribute("required", "")' required>
                </div>
            </div>
            <input class="btn btn-primary" type="submit" name="" value="Зарегистрироваться">
        </div>
        <div class="text-end">
            <a class="text-white" href="authorization.php">Авторизоваться</a>
        </div>
    </form>
</body>
</html>