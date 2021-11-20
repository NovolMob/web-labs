<!DOCTYPE html>
<html>
    <head>
        <title>Лабораторная работа №7</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/index.css">
    </head>
    <body>
        <?php
            include("menu.php");
            include("header.php");
            include("footer.php");

            $header = new Header();
            $header->set_text("Заголовок");
            $header->write();
        ?>

        <div id="body-content"> 
            <?php
                $menu = new Menu();
                $menu->addLink("Текст1", "./text1.php");
                $menu->addLink("Текст2", "./text2.php");
                $menu->write();
            ?>
            <div id="content">
            </div>
        </div>

        <?php
            $footer = new Footer();
            $footer->set_text("Подвал");
            $footer->write();
        ?>
    </body>
</html>