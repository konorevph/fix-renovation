<?php

use function PHPSTORM_META\type;

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
        private $innerText, $type;
        private $class = "main-button";

        public function __construct($id, $innerText)
        {
            $this->id = $id;
            $this->innerText = $innerText;
        }

        public function changeType($type)
        {
            $this->type = $type;
        }

        public function __toString()
        {
            return '<button class="' . $this->class . '" '
            . ($this->type != "" ? 'type="'.$this->type.'"' : "")
            . ' ' . ($this->id != "" ? ' id="' . $this->id . '">' : ">")  .  $this->innerText . '</button>';
        }
    }  
    
    class IconLink extends InteractionElements
    {
        private $href, $innerText, $class, $srcImg;

        public function __construct($class, $href, $innerText, $srcImg) 
        {
            $this->class = $class;
            $this->href = $href;
            $this->innerText = $innerText;
            $this->srcImg = $srcImg;
        }

        public function __toString()
        {
            return '<a class="icon-link ' . $this->class . '" href="' . $this->href . '" '
                . ($this->srcImg != "" ? 'style="background-image: url(' . $this->srcImg . ');"' : '') . '>' . $this->innerText . '</a>';
        }
    }

    class textPairBlock extends InteractionElements
    {
        private $text1, $text2, $class, $teg1, $teg2, $mainTag;

        public function __construct($text1, $text2, $variant, $mainTag)
        {
            $this->mainTag = $mainTag;
            $this->text1 = $text1;
            $this->text2 = $text2;
            switch ($variant) {
                case 1: 
                    $this->class = "text-pair-block border-up";
                    $this->teg1 = "h3";
                    $this->teg2 = "p";
                    break;
                case 2: 
                    $this->class = "text-pair-block border-all";
                    $this->teg1 = "h3";
                    $this->teg2 = "h1";
                    break;
                default:
                    $this->class = "text-pair-block";
                    $this->teg1 = "h2";
                    $this->teg2 = "h5";
                
            }
        }

        public function __toString()
        {
            return '<'.$this->mainTag.' class="'.$this->class.'"><'.$this->teg1.'>'.$this->text1.'</'.$this->teg1.'><'.$this->teg2.'>'.$this->text2.'</'.$this->teg2.'></'.$this->mainTag.'>';
        }
    }
?>