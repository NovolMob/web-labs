<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
<div class="fixed-top">
        <div class="container-fluid">
            <div class="row top-bar">
                <div class="col-12">
                    <a href="#" class="text-white">
                        <span class="mr-2 text-white icon-envelope-open-o"></span>
                        <span class="d-none d-md-inline-block">info@yourdomain.com</span>
                    </a>

                    <span class="mx-md-2 d-inline-block"></span>

                    <a href="#" class="text-white">
                        <span class="mr-2 text-white icon-phone"></span>
                        <span class="d-none d-md-inline-block">+7 (960) 1234 5678</span>
                    </a>

                    <div class="float-right">
                        <a href="#" class="text-white">
                            <span class="mr-2 text-white icon-vk"></span> 
                        </a>
                        <span class="mx-md-2 d-inline-block"></span>
                        <a href="#" class="text-white">
                            <span class="mr-2 text-white icon-odnoklassniki"></span>
                        </a>
                    </div>
                </div>
            </div>

            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="#"><img src="img/logo.png" width="60">Лабораторная работа №5</a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        
                        <?php
                            $nav_items = array(
                                "Главная" => "./index.php",
                                "Шаблоны сайтов" =>  "./web_shapes.php",
                                "Обратная связь" =>  "./feedback.php"
                            );

                            foreach ($nav_items as $title => $href) {
                                if ($cur_page == $title) {
                                    echo "<li class=\"nav-item\"><a class=\"nav-link active\" href=\"$href\">$title</a></li>";
                                } else {
                                    echo "<li class=\"nav-item\"><a class=\"nav-link\" href=\"$href\">$title</a></li>";
                                }
                            }
                        ?>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</body>
</html>