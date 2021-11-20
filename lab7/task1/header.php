<?php
    class Header {
        private $text;

        public function set_text(string $text) {
            $this->text = $text;
        }

        public function write() {
            echo "<div id=\"top\">$this->text</div>";
        }
    }
?>