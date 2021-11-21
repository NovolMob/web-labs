<?php
    include_once($_SERVER['DOCUMENT_ROOT']."\\components/file_util.php");

    function countDocsIn(string $dir_path): int {
        include($_SERVER['DOCUMENT_ROOT']."\\config.php");
        return countFilesIn($dir_path, $doc_formats);
    }

    function isDocs(string $file_name): bool {
        include($_SERVER['DOCUMENT_ROOT']."\\config.php");
        return isFormat($file_name, $doc_formats);
    } 
?>