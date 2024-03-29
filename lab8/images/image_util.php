<?php
    include_once($_SERVER['DOCUMENT_ROOT']."\\components/file_util.php");

    function countImagesIn(string $dir_path): int {
        include($_SERVER['DOCUMENT_ROOT']."\\config.php");
        return countFilesIn($dir_path, $photo_formats);
    }

    function isImage(string $file_name): bool {
        include($_SERVER['DOCUMENT_ROOT']."\\config.php");
        return isFormat($file_name, $photo_formats);
    } 
?>