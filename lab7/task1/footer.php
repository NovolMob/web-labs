<?php
    class Footer {
        private $text;

        public function set_text(string $text) {
            $this->text = $text;
        }

        public function write() {
            echo "<div id=\"bottom\">$this->text</div>";
        }
    }
?>