<?php
    class Footer
    {
        private $socialNetworks = [], $heading, $paragraph, $moreContacts = [];
        private static $css = "css/foter.css";
        
        public function addSocialNetwork($img, $link)
        {
            $socialNetwork = array(
                'img' => $img, 'link' => $link
            );
            $this->socialNetworks[] = $socialNetwork;
        }

        public function setHeading($text)
        {
            $this->heading = $text;
        }

        public function setParagraph($text)
        {
            $this->paragraph = $text;
        }

        public function setPhoneNumber($number)
        {
            $this->moreContacts['number'] = $number;
        }

        public function setAddress($address)
        {
            $this->moreContacts['address'] = $address;
        }

        public function setMail($mail)
        {
            $this->moreContacts['mail'] = $mail;
        }

        function __toString()
        {
            $html = '<footer id="main-footer">';

            if (!empty($this->socialNetworks))
            {
                $html .= '<ul class="social-network">';
                foreach ($this->socialNetworks as $socialNetwork)
                {
                    $html .= '<li><a href="'.$socialNetwork['link'].'"><img src="'.$socialNetwork['img'].'" alt="SN-icon"/></a></li>';
                }
                $html .= '</ul>';
            }

            if (isset($this->heading))
            {
                $html .= '<h4>'.$this->heading.'</h4>';
            }

            if (isset($this->heading))
            {
                $html .= '<p>'.$this->paragraph.'</p>';
            }

            if (!empty($this->moreContacts))
            {
                $html .= '<ul class="contacts">';
                foreach ($this->moreContacts as $key => $value)
                {
                    $html .= '<li>';
                    switch ($key)
                    {
                        case 'number':
                            {
                                $html .= new IconLink('phone', '/#', $value, 'img/icons/contacts.svg');
                                break;
                            }
                        case 'address':
                            {
                                $html .= '<h4>'.$value.'</h4><p>Санкт-Петербург</p>';
                                break;
                            }
                        case 'mail':
                            {
                                $html .= new IconLink('mail', '/#', $value, 'img/icons/message.svg');
                                break;
                            }
                    }
                    $html .= '</li>';
                }   
                $html .= '</ul>';
            }

            $html .= '<p class="bottom">© FIX Ремонт, 2016</p>';

            $html .= '</footer>';
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