<?php

    class InteractionElements
    {
        private static $css = "css/interaction-elements.css";

        public static function getCssUrl()
        {
            return self::$css;
        }

        public static function linkCss()
        {
            echo '<link rel="stylesheet" href="' . self::$css . '">';
        }
    }

    class MainButton extends InteractionElements
    {
        private $id;
        private $innerText;
        private $class = "main-button";

        public function __construct($id, $innerText)
        {
            $this->id = $id;
            $this->innerText = $innerText;
        }

        public function __toString()
        {
            return '<button class="' . $this->class . '"' . ($this->id != "" ? ' id="' . $this->id . '">' : ">")  .  $this->innerText . '</button>';
        }
    }  
    
    class IconLink
    {
        private $href, $innerText, $class;

        public function __construct($class, $href, $innerText) 
        {
            $this->class = $class;
            $this->href = $href;
            $this->innerText = $innerText;
        }

        public function __toString()
        {
            return '<a class="icon-link ' . $this->class . '" href="' . $this->href . '">'  .  $this->innerText . '</a>';
        }
    }
?>