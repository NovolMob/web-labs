<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        include("config.php");
    ?>
    <meta charset="UTF-8">
    <title><?php echo $web_shapes; ?></title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <script src="js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <?php
        $cur_page = $web_shapes;
        include("components/top.php");
    ?>

    <div class="content">
        <div class="container-fluid section2">
            <h1 class="text-center">Адаптивные шаблоны сайтов на Bootstrap</h1>
            <h3 class="text-center">Пример плагина Cards</h3>
            <div class="row">
                <div class="col-md-6 col-lg-3 col-sm-12">
                    <div class="card">
                        <div class="card-img">
                            <img src="img/template1.jpg">
                        </div>

                        <div class="card-body">
                            <div class="card-title">Автомастерская</div>
                            <p class="card-text">Бесплатный</p>
                        </div>

                        <div class="card-footer">
                            <a href="https://colorlib.com/preview/#autorepair" class="card-link">Демо</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 col-sm-12">
                    <div class="card">
                        <div class="card-img">
                            <img src="img/template2.jpg" class="img-fluid">
                        </div>

                        <div class="card-body">
                            <div class="card-title">Йога</div>
                            <p class="card-text">Бесплатный</p>
                        </div>

                        <div class="card-footer">
                            <a href="https://colorlib.com/preview/#doyoga" class="card-link">Демо</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 col-sm-12">
                    <div class="card">
                        <div class="card-img">
                            <img src="img/template3.jpg" class="img-fluid">
                        </div>

                        <div class="card-body">
                            <div class="card-title">Креативный</div>
                            <p class="card-text">Бесплатный</p>
                        </div>

                        <div class="card-footer">
                            <a href="https://startbootstrap.com/theme/creative" class="card-link">Демо</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 col-sm-12">
                    <div class="card">
                        <div class="card-img">
                            <img src="img/template4.jpg" class="img-fluid">
                        </div>

                        <div class="card-body">
                            <div class="card-title">Мгла</div>
                            <p class="card-text">Бесплатный</p>
                        </div>

                        <div class="card-footer">
                            <a href="https://colorlib.com/preview/#hazze" class="card-link">Демо</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>