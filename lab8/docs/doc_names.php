<?php
    class DocNames {
        private static $names = array();
        private static $file_name = "docs\\names.txt";

        private static function getFullPath(): String {
            return $_SERVER['DOCUMENT_ROOT']."\\".DocNames::$file_name;
        }

        public static function load() {
            $file_path = DocNames::getFullPath();
            if (!file_exists($file_path)) {
                fclose(fopen($file_path, "w"));
            }
            $size = filesize($file_path);
            $file = fopen($file_path, "r");
            if ($size > 0) {
                DocNames::decode(fread($file, $size));
            }
            fclose($file);
        }

        public static function save() {
            $file_path = DocNames::getFullPath();
            $file = fopen($file_path, "w");
            fwrite($file, DocNames::encode());
            fclose($file);
        }

        public static function decode(string $str) {
            $json = (array) json_decode($str);
            DocNames::$names = $json != null ? $json : array();
        }

        public static function encode(): string {
            return json_encode(DocNames::$names);
        }

        public static function getName(string $file_name): string {
            return array_key_exists($file_name, DocNames::$names) ? DocNames::$names[$file_name] : "";
        }

        public static function addName(string $file_name, string $name) {
            DocNames::$names[$file_name] = $name;
        }
    }
?>