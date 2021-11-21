<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        include_once("config.php");
    ?>
    <meta charset="UTF-8">
    <title><?php echo $your_photos; ?></title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <script src="js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <?php
        $cur_page = $your_photos;
        include_once("components/top.php");
    ?>

    <div class="content">
        <form action="<?php echo "$photos_dir"; ?>/upload.php" method="post" enctype="multipart/form-data" class="mx-2">
            <div class="form-group row">
                <label for="file" class="col-sm-2 col-form-label">Загрузите фотографию</label>
                <div class="col-sm-3">
                    <input class="form-control" type="file" name="file" required> <br>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-5">
                    <input class="form-control" type="text" name="comment" placeholder="Введите комментарий" required> <br>
                </div>
            </div>
            <input class="btn btn-primary" type="submit" name="doupload" value="Закачать новую фотографию">
        </form>
    </div>

    <?php
        $photos = array();
        $opened_dir = opendir($photos_dir);
        while (($f = readdir($opened_dir)) != false) {
            include_once($_SERVER['DOCUMENT_ROOT']."\\$photos_dir\\image_util.php");
            include_once($_SERVER['DOCUMENT_ROOT']."\\$photos_dir\\image_comments.php");
            if (!isImage($f)) continue;

            $path = "$photos_dir\\$f";
            $sz=getimagesize($path);
            $tm=filemtime($path);
            ImageComments::load();
            $photos[$tm] = array(
                "time" => $tm,
                "comment" => ImageComments::getComment($f),
                "name" => $f,
                "path" => $path,
                "width" => $sz[0],
                "height" => $sz[1]
            );
        }
        arsort($photos);
    ?>

    <div class="container-fluid">
        <?php
            $counter_width = 0;
            foreach ($photos as $photo) {
                if ($counter_width == 0) {
                    echo "<div class=\"row\">";
                }
                $data = date("Y-m-d", $photo["time"]);
                echo "<div class=\"col m-2 card rounded-20\">
                        <div class=\"position-relative\">
                            <img class=\"card-img\" src=\"{$photo["path"]}\" />
                            <h6 class=\"position-absolute left-0 bottom-0 text-warning\" >{$photo["width"]}х{$photo["height"]}</h6>
                        </div>
                        <h2 class=\"card-title text-center\">{$photo["comment"]}</h2>
                        <p class=\"mt-auto text-end fst-italic\">$data</p>
                    </div>";
                $counter_width += intval($photo["width"]);
                if ($counter_width > $max_image_size) {
                    $counter_width = 0;
                    echo "</div>";
                }
            }
        ?>
    </div>

</body>

</html>