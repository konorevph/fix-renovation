<?php
    class Header
    {
        private $logo_url = "img/icons/logotype.svg";
        private $menu = [];
        private static $css = "css/header.css";

        public function addNavItem($class, $innerText, $href, $srcImg)
        {
            $namItem = [$class, [$innerText, $href, $srcImg]];
            array_push($this->menu, $namItem);
        }

        function __toString()
        {
            
            $html = '<header id="main-header">';
            $html .= '<img id="logotype" src="' . $this->logo_url . '"/>';
            $html .= '<ul>';
            foreach($this->menu as [$class, [$innerText, $href, $srcImg]]) {
                $html .= '<li>' . new IconLink($class, $href, $innerText, $srcImg) . '</li>';
            }
            $html .= "</ul></header>";
            return $html;
        }

        public static function getCssUrl()
        {
            return self::$css;
        }

        public static function linkCss()
        {
            echo '<link rel="stylesheet" href="' . self::$css . '">';
        }
    }
?>
