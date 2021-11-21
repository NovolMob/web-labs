<?php
    include_once($_SERVER['DOCUMENT_ROOT']."\\docs\\doc_util.php");
    include_once($_SERVER['DOCUMENT_ROOT']."\\docs\\doc_names.php");

    if (isset($_POST["name"]) && $_FILES && $_FILES["file"]["error"] == UPLOAD_ERR_OK) {
        if (!isDocs($_FILES["file"]["name"])) {
            header("Location: ../document.php");
            exit;
        }
        $doc_number = countDocsIn(".\\") + 1;
        $name = $_FILES["file"]["name"];
        if (file_exists($name)) {
            $extension = getExtension($_FILES["file"]["name"]);
            $id = 1;
            $only_name = str_replace(".$extension", "", $name);
            do {
                $name = "$only_name($id).$extension";
                $id++;
            } while (file_exists($name));
        }
        DocNames::load();
        DocNames::addName($name, $_POST["name"]);
        DocNames::save();
        move_uploaded_file($_FILES["file"]["tmp_name"], $name);
        header("Location: ../document.php");
        exit;
    }
?>