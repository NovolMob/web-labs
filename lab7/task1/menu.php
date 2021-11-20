<?php
    class Menu {
        private static $geleral_links = array(
            array("Главная страница", "./index.php")
        );
        private $links = array();

        public function addLink(string $title, string $href) {
            array_push($this->links, array($title, $href));
        }

        public function write() {
            echo "<div id=\"menu\"><ul>";
            foreach (array_merge(Menu::$geleral_links, $this->links) as $link) {
                echo "<li><a href=$link[1]>$link[0]</a></li>";
            }
            echo "</ul></div>";
        }
    }
?>