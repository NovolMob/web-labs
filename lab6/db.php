<?php

use function PHPSTORM_META\type;

class DataBase {
        private static $file_name = "db.txt";
        private static $data = array();

        public static function load() {
            if (!file_exists(DataBase::$file_name)) {
                fclose(fopen(DataBase::$file_name, "w"));
            }
            $file_size = filesize(DataBase::$file_name);
            $db = fopen(DataBase::$file_name, "r");
            if ($file_size > 0) {
                DataBase::decode(fread($db, $file_size));
            }
            fclose($db);
        }

        public static function save() {
            $db = fopen(DataBase::$file_name, "w");
            fwrite($db, DataBase::encode());
            fclose($db);
        }

        public static function decode(string $str) {
            $json = json_decode($str);
            DataBase::$data = $json != null ? $json : array();
        }

        public static function encode(): string {
            $json_str = json_encode(DataBase::$data);
            $json_str = str_replace("[", "[\n", $json_str);
            $json_str = str_replace("]", "\n]", $json_str);
            $json_str = str_replace("{", "{\n", $json_str);
            $json_str = str_replace("}", "\n}", $json_str);
            $json_str = str_replace(",", ",\n", $json_str);
            return $json_str;
        }

        public static function add_data(array $data) {
            array_push(DataBase::$data, (object) $data);
        }

        public static function get_data_by_headers(array $headers): array {
            if (empty($headers)) {
                return DataBase::$data;
            }
            $result = array();
            foreach (DataBase::$data as $array) {
                $element = array();
                foreach ($headers as $header) {
                    if (array_key_exists($header, $array)) {
                        
                        $element[$header] = $array->$header;
                    }
                }
                array_push($result, $element);
            }
            return $result;
        }
         
    }

?>