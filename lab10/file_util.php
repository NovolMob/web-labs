<?php

    function countFilesIn(string $dir_path, array $formats): int {
        $dir = new DirectoryIterator($dir_path);
        $count = 0;
        foreach ($dir as $file) {
            $count += empty($formats) || isFormat($file, $formats) ? 1 : 0;
        }
        return $count;
    }

    function isFormat(string $file_name, array $formats): bool {
        $extension = getExtension($file_name);
        foreach ($formats as $format) {
            if ($extension == $format) {
                return true;
            }
        }
        return false;
    } 

    function getExtension(string $file_name): string {
        return $extension = substr(strchr($file_name, '.'), 1);
    }
?>