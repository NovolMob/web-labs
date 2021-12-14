<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <script src="js/bootstrap.bundle.min.js"></script>
</head>
<body style="background-image: url('back.jpg');">
    <form action="" method="post" enctype="multipart/form-data" class="mx-auto bg-dark bg-opacity-50 p-3 text-primary" style="border-radius: 20px; width: 25%;">
        <div class="justify-content-center d-flex form-group">
            <h1 class="text-primary">Регистрация</h1>
        </div>
        <div class="mx-3 mb-1 form-group">
            <input class="form-control form-control-lg" type="text" name="firstname" placeholder="Имя" autocomplete="off" required>
        </div>
        <div class="mx-3 mb-1 form-group">
            <input class="form-control form-control-lg" type="text" name="comment" placeholder="Фамилия" autocomplete="off" required>
        </div>
        <div class="mx-3 mb-3 form-group">
            <input class="form-control form-control-lg" type="email" name="comment" placeholder="Почта" autocomplete="off" required>
        </div>
        <div class="mx-3 d-flex form-group">
            <div class="flex-grow-1">
                <div>
                    <label for="user-type">Покупатель</label>
                    <input class="form-check-input pe-2" type="radio" name="user-type" checked required>
                </div>
                <div>
                    <label for="user-type">Продавец</label>
                    <input class="form-check-input ps-2" type="radio" name="user-type" required>
                </div>
            </div>
            <input class="btn btn-primary" type="submit" name="" value="Зарегистрироваться">
        </div>
    </form>
</body>
</html>