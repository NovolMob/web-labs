<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        include_once("config.php");
    ?>
    <meta charset="UTF-8">
    <title><?php echo $docs; ?></title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <script src="js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <?php
        $cur_page = $docs;
        include_once("components/top.php");
    ?>

    <div class="content">
        <form action="<?php echo $docs_dir; ?>/upload.php" method="post" enctype="multipart/form-data" class="mx-2">
            <div class="form-group row">
                <label for="file" class="col-sm-2 col-form-label">Загрузите документ:</label>
                <div class="col-sm-3">
                    <input class="form-control" type="file" name="file" required> <br>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-5">
                    <input class="form-control" type="text" name="name" placeholder="Введите имя документа" required> <br>
                </div>
            </div>
            <input class="btn btn-primary" type="submit" name="doupload" value="Закачать новый документ">
        </form>
    </div>

    <div class="container-fluid">
        <?php
            $docs = array();
            $opened_dir = opendir($docs_dir);
            while (($f = readdir($opened_dir)) != false) {
                include_once($_SERVER['DOCUMENT_ROOT']."\\$docs_dir\\doc_util.php");
                include_once($_SERVER['DOCUMENT_ROOT']."\\$docs_dir\\doc_names.php");
                if (!isDocs($f)) continue;
    
                $path = "$docs_dir\\$f";
                $sz=filesize($path);
                $tm=filemtime($path);
                DocNames::load();
                $docs[$tm] = array(
                    "time" => $tm,
                    "name" => DocNames::getName($f),
                    "format" => getExtension($f),
                    "path" => $path,
                    "sz" => $sz
                );
            }
            arsort($docs);

            echo "<ul>";
            foreach ($docs as $doc) {
                $size = number_format($doc["sz"] / 1024, 2)."KB";
                $data = date("Y-m-d G:i", $doc["time"]);
                echo "<li>{$doc["name"]}(<a href=\"{$doc["path"]}\">{$doc["format"]}, $size, $data</a>)</li>";
            }
            echo "</ul>";
        ?>
    </div>

</body>
</html>