<?php
    class MainForm
    {
        private $method, $class = "main-form", $action, $name, $inputs = [], $btntext, $par, $linkHref, $linkText, $specialOffer = []; 
        private static $css = "css/form.css", $js = "js/form.js";

        public function __construct($method, $action, $name)
        {
            $this->name = $name;
            $this->method = $method;
            $this->action = $action;
        }

        public function addInput($name, $placeholder, $type, $required) 
        {
            $input = [$name, $placeholder, $type, $required];
            array_push($this->inputs, $input);
        }

        public function setBtnText($text) 
        {
            $this->btntext = $text;
        }

        public function setSignature($par, $linkHref, $linkText)
        {
            $this->par = $par;
            $this->linkHref = $linkHref;
            $this->linkText = $linkText;
        }

        public function setSpetialOffer($text, $img)
        {
            $this->specialOffer['text'] = $text;
            $this->specialOffer['img'] = $img;
        }

        public function __toString()
        {
            $html = '<form class="'.$this->class.'"><fieldset>';
            $html .= $this->name != "" ? '<legend>'.$this->name.'</legend>' : "";
            if (!empty($this->specialOffer))
            {
                $html .= '<div class="special-offer">
                    <img src="'.$this->specialOffer['img'].'" alt="door"/>
                    <p>'.$this->specialOffer['text'].'</p>
                    </div>';
            }
            foreach ($this->inputs as [$name, $placeholder, $type, $required])
            {
                $html .= '<input name="'.$name.'" placeholder="'.$placeholder.'"';
                if ($type != "") $html .= ' type="' . $type . '"';
                if ($required) $html .= ' required';
                $html .= '/>';
            }
            $btn = new MainButton("", $this->btntext);
            $btn->changeType("submit");
            $html .= $btn;
            if ($this->par != "") $html .= '<p>' . $this->par . '</p>';
            if ($this->linkHref != "") $html .= '<a href="'.$this->linkHref.'">' . $this->linkText . '</a>';
            $html .= '</fieldset></form>';
            return $html;
        }

        public static function linkCss()
        {
            echo '<link rel="stylesheet" href="' . self::$css . '">';
        }
        
    }
?>