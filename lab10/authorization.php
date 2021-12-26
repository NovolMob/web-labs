<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация</title>
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
            <h1 class="text-white">Авторизация</h1>
        </div>
        <input type="hidden" name="action" value="auth">
        <div class="mb-1 form-group">
            <input class="form-control form-control-lg bg-dark text-white" type="email" name="email" placeholder="Почта" autocomplete="off" required>
        </div>
        <div class="mb-3 form-group">
            <input class="form-control form-control-lg bg-dark text-white" type="password" name="password" placeholder="Пароль" autocomplete="off" required>
        </div>
        <div class="d-flex form-group">
            <div class="flex-grow-1"></div>
            <input class="w-50 form-control form-control-lg btn btn-primary" type="submit" name="" value="Авторизоваться">
        </div>
        <div class="text-end">
            <a class="text-white" href="registration.php">Зарегистрироваться</a>
        </div>
    </form>
</body>
</html>