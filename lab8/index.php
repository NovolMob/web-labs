<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        include("config.php");
    ?>
    <meta charset="UTF-8">
    <title><?php echo $site_name; ?></title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <script src="js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <?php
        $cur_page = $main_page;
        include("components/top.php");
    ?>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div id="carousel1" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carousel1" data-bs-slide-to="0" class="active"></button>
                            <button type="button" data-bs-target="#carousel1" data-bs-slide-to="1"></button>
                            <button type="button" data-bs-target="#carousel1" data-bs-slide-to="2"></button>
                        </div>
        
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="img/1.jpg" alt="" class="d-block w-100">
                            </div>
        
                            <div class="carousel-item">
                                <img src="img/2.jpg" alt="" class="d-block w-100">
                            </div>
        
                            <div class="carousel-item">
                                <img src="img/3.jpg" alt="" class="d-block w-100">
                            </div>
                        </div>
        
                        <button class="carousel-control-prev" type="button" data-bs-target="#carousel1" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </button>
        
                        <button class="carousel-control-next" type="button" data-bs-target="#carousel1" data-bs-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </button>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 desc">
                    <h1 class="text-center">О проекте</h1>
                    <p>Bootstrap является самой популярной в мире платформой для создания адаптивных,
                        ориентированных на
                        мобильные устройства сайтов
                    </p>

                    <p>
                        Проект выполняется в виде лендинг страницы, демонстрирующей основные возможности Bootsrap 5.
                    </p>

                    <p>
                        Лендинг пейдж (landing page) или просто «лендинг» — это особый тип сайтов, оптимизированных
                        для
                        побуждения к действию интернет-пользователя.
                    </p>

                    <div class="container mt-3">
                        <button type="button" class="btn" data-bs-toggle="collapse" data-bs-target="#demo">Подробнее</button>
        
                        <div id="demo" class="collapse">
                            Этот пример демонстрирует возможности Collaps - плагина свертывания, позволяющего скрыть и показать
                            большой объем контента
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>