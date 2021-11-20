<?php
    include_once("../config.php");
    include_once("image_util.php");
    include_once("image_comments.php");

    if (isset($_POST["comment"]) && $_FILES && $_FILES["file"]["error"] == UPLOAD_ERR_OK) {
        if (!isImage($_FILES["file"]["name"])) {
            header("Location: photos.php");
            exit;
        }
        $photo_number = countImagesIn(".\\") + 1;
        $extension = getExtension($_FILES["file"]["name"]);
        $name = "image-$photo_number.$extension";
        $image_info = getimagesize($_FILES["file"]["tmp_name"]);
        if ($image_info[0] == 0 || $image_info[0] > $max_image_size || $image_info[1] == 0 || $image_info[1] > $max_image_size) {
            header("Location: photos.php");
            exit;
        } else {
            ImageComments::load();
            ImageComments::addComment($name, $_POST["comment"]);
            ImageComments::save();
            move_uploaded_file($_FILES["file"]["tmp_name"], $name);
            header("Location: photos.php");
            exit;
        }
    }
?>