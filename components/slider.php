<?php
class ImgSlider_1
{
    private $logo_url = "img/icons/logotype.svg", $header, $list = [], $class = "img-slider-1";
    private static $css = "css/slider.css", $js = "js/slider.js";

    public function addHeader($text1, $text2)
    {
        $this->header = new textPairBlock($text1, $text2, 0, "header");
    }

    public function addItem($id, $srcImg1x, $srcImg2x, $srcImg3x, $text)
    {
        $item = [$id, $srcImg1x, $srcImg2x, $srcImg3x, $text];
        array_push($this->list, $item);
    }

    function __toString()
    {
        $html = '<section class=' . $this->class . '>';
        $html .= ($this->header != null ? $this->header->__toString() : '');
        $html .= '<div class="carousel-container"><ul class="carousel-slides">';

        $list = $this->list;

        [$id, $srcImg1x, $srcImg2x, $srcImg3x, $text] = $list[count($list) - 1];
        $html .= '<li id="lastClone"><figure><picture>'
                . '<source srcset="'.$srcImg1x.' 1x, '.$srcImg2x.' 2x, '.$srcImg3x.' 3x" type="image/jpg">'
                . '<img src="'.$srcImg3x.'" alt="Photo" />'
                . '</picture></figure>'
                . '<p>'.$text.'</p>'
                .'</li>';

        for ($i = 0; $i < count($list); $i++) {
            [$id, $srcImg1x, $srcImg2x, $srcImg3x, $text] = $list[$i];
            $idAttr = $id != "" ? 'id="'.$id.'"' : "";
            $html .= '<li '.$idAttr.'><figure><picture>'
                . '<source srcset="'.$srcImg1x.' 1x, '.$srcImg2x.' 2x, '.$srcImg3x.' 3x" type="image/jpg">'
                . '<img src="'.$srcImg3x.'" alt="Photo" />'
                . '</picture></figure>'
                . '<p>'.$text.'</p>'
                .'</li>';
        }

        [$id, $srcImg1x, $srcImg2x, $srcImg3x, $text] = $list[0];
        $html .= '<li id="firstClone"><figure><picture>'
                . '<source srcset="'.$srcImg1x.' 1x, '.$srcImg2x.' 2x, '.$srcImg3x.' 3x" type="image/jpg">'
                . '<img src="'.$srcImg3x.'" alt="Photo" />'
                . '</picture></figure>'
                . '<p>'.$text.'</p>'
                .'</li>';

        $html .= "</ul>";
        $html .= '<ul class="next-prev-btns"><li><button id="prev"><img src="img/icons/arrow_left.svg" alt="previous"/></button></li><li><button id="next"><img src="img/icons/arrow_right.svg" alt="next"/></button></li></ul>';
        $html .= "</div></section>";
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

    public static function linkJs()
    {
        echo '<script src="'.self::$js.'"></script>';
    }
}
?>