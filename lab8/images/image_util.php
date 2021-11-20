<?php

    function countImagesIn(string $dir_path): int {
        $dir = new DirectoryIterator($dir_path);
        $count = 0;
        foreach ($dir as $file) {
            $count += isImage($file) ? 1 : 0;
        }
        return $count;
    }

    function isImage(string $file_name): bool {
        $extension = getExtension($file_name);
        return $extension == "jpg" || $extension == "png" || $extension == "gif";
    } 

    function getExtension(string $file_name): string {
        return $extension = substr(strchr($file_name, '.'), 1);
    }
?>