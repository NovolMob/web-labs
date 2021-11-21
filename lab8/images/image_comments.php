<?php
    class ImageComments {
        private static $comments = array();
        private static $file_name = "images\\comments.txt";

        private static function getFullPath(): String {
            return $_SERVER['DOCUMENT_ROOT']."\\".ImageComments::$file_name;
        }

        public static function load() {
            $file_path = ImageComments::getFullPath();
            if (!file_exists($file_path)) {
                fclose(fopen($file_path, "w"));
            }
            $size = filesize($file_path);
            $file = fopen($file_path, "r");
            if ($size > 0) {
                ImageComments::decode(fread($file, $size));
            }
            fclose($file);
        }

        public static function save() {
            $file_path = ImageComments::getFullPath();
            $file = fopen($file_path, "w");
            fwrite($file, ImageComments::encode());
            fclose($file);
        }

        public static function decode(string $str) {
            $json = (array) json_decode($str);
            ImageComments::$comments = $json != null ? $json : array();
        }

        public static function encode(): string {
            return json_encode(ImageComments::$comments);
        }

        public static function getComment(string $file_name): string {
            return array_key_exists($file_name, ImageComments::$comments) ? ImageComments::$comments[$file_name] : "";
        }

        public static function addComment(string $file_name, string $comment) {
            ImageComments::$comments[$file_name] = $comment;
        }
    }
?>