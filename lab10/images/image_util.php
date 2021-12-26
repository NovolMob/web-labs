<?php
    include_once($_SERVER['DOCUMENT_ROOT']."/file_util.php");
    include_once($_SERVER['DOCUMENT_ROOT']."/config.php");

    function countImagesIn(string $dir_path): int {
        global $imageFormats;
        return countFilesIn($dir_path, $imageFormats);
    }

    function isImage(string $file_name): bool {
        global $imageFormats;
        return isFormat($file_name, $imageFormats);
    } 
?>