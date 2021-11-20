<?php
    class ImageComments {
        private static $comments = array();
        private static $file_name = "comments.txt";

        public static function load() {
            if (!file_exists(ImageComments::$file_name)) {
                fclose(fopen(ImageComments::$file_name, "w"));
            }
            $size = filesize(ImageComments::$file_name);
            $file = fopen(ImageComments::$file_name, "r");
            if ($size > 0) {
                ImageComments::decode(fread($file, $size));
            }
            fclose($file);
        }

        public static function save() {
            $file = fopen(ImageComments::$file_name, "w");
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

        public static function getComment(string $name): string {
            return array_key_exists($name, ImageComments::$comments) ? ImageComments::$comments[$name] : "";
        }

        public static function addComment(string $name, string $comment) {
            ImageComments::$comments[$name] = $comment;
        }
    }
?>