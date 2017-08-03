<?php

class U {

    public static function C() {
        return sfContext::getInstance()->getUser()->getCulture();
    }

    public static function L() {
        return sfContext::getInstance()->getUser()->getCulture() == 'en' ? 'zh-cn' : 'en';
    }
    
    public static function buildCultureUrl($culture) {
        $result = '';
        $current_url = $_SERVER['REQUEST_URI'];
        $uri = $_SERVER['REQUEST_URI'];
        preg_match("/\/.*\//U", $current_url, $match);
        $result = str_replace($match, "/$culture/", $uri);
        return $result;
    }

    public static function getRealUri($url) {
        $result = '';
        $match_result = preg_match("/\/.*\//U", $url, $match);
        if ($match_result) {
            $result = str_replace($match, '/', $url);
        }
        return $result;
    }

    public static function getServerUrl() {
        $pageURL = 'http';
        if (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on") {
            $pageURL .= "s";
        }
        $pageURL .= "://";
        $pageURL .= $_SERVER["SERVER_NAME"];
        return $pageURL;
    }

    /**
     * 将字符串进行格式化
     * 如 "menu_item" 转为 "MenuItem"
     */
    public static function FormatString($string) {
        $result = '';
        $str_temps = explode("_", $string);
        foreach($str_temps as $str_temp){
            $result .= ucfirst($str_temp);
        }
        return $result;
    }

}

?>