<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Обратная связь</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <script src="js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <?php
        $cur_page = "Обратная связь";
        include("top.php");
    ?>

    <div class="content">
        <div class="container-fluid col-md-6 col-lg-6 col-sm-12 mt-3">
            <form class="was-validated">
                <div class="mb-3">
                    <label for="email" class="form-label">Почта:</label>
                    <input type="email" class="form-control" id="email" placeholder="Введите свою почту" name="email" required>
                    <div class="invalid-feedback">Вы не правильно ввели андрес почты.</div>
                </div>

                <div class="mb-3">
                    <label for="pwd" class="form-label">Пароль:</label>
                    <input type="password" class="form-control" id="pwd" placeholder="Введите свой пароль" name="pswd" required>
                    <div class="invalid-feedback">Вы не правильно ввели пароль.</div>
                </div>

                <div class="mb-3">
                    <label for="comment">Комментарий:</label>
                    <textarea class="form-control" rows="5" id="comment" name="text" required></textarea>
                    <div class="invalid-feedback">Вы не ввели комментарий.</div>
                </div>

                <button type="submit" class="btn btn-primary">Отправить</button>
            </form>
        </div>
    </div>
</body>

</html>