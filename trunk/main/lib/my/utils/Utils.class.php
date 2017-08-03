<?php

class Utils {

    public static function wfGenerateToken($salt = '') {
        $salt = serialize($salt);

        return md5(mt_rand(0, 0x7fffffff) . $salt);
    }

    /**
     * 处理jquery datapicker 传递过来的date
     * @param type string
     * @return array 
     */
    public static function getDatePickerArr($date) {
        $result = array();
        if (!trim($date)) {
            $result['year'] = "0000";
            $result['month'] = "00";
            $result['date'] = "00";
            return $result;
        }
        $date_str = $date;
        $date_arr = explode('/', $date_str);
        $result['year'] = $date_arr[2];
        $result['month'] = $date_arr[0];
        $result['date'] = $date_arr[1];
        return $result;
    }

    public static function getDatetimePickerArr($datetime) {
        $result = array();
        if (!trim($datetime)) {
            $result['year'] = "0000";
            $result['month'] = "00";
            $result['date'] = "00";
            $result['hour'] = "00";
            $result['minute'] = "00";
            $result['second'] = "00";
            return $result;
        }
        $datetime_arr = explode(' ', $datetime);
        $date_str = $datetime_arr[0];
        $time_str = $datetime_arr[1];
        $date_arr = explode('/', $date_str);
        $time_arr = explode(':', $time_str);
        $result['year'] = $date_arr[2];
        $result['month'] = $date_arr[0];
        $result['date'] = $date_arr[1];
        $result['hour'] = $time_arr[0];
        $result['minute'] = $time_arr[1];
        $result['second'] = $time_arr[2];
        return $result;
    }

    public static function datetimePickerArrToMysqlDateTime($date_time) {
        if (!is_array($date_time)) {
            return false;
        }
        return $date_time['year'] . '-' . $date_time['month'] . '-' . $date_time['date'] . ' ' . $date_time['hour'] . ':' . $date_time['minute'] . ':' . $date_time['second'];
    }

    public static function substr_utf8($string, $start, $length) {
        $chars = $string;
        $m = 0;
        $n = 0;
        //echo $string[0].$string[1].$string[2];  
        $i = 0;
        do {
            if (@preg_match("/[0-9a-zA-Z]/", $chars[$i])) {//纯英文  
                $m++;
            } else {
                $n++;
            }//非英文字节,  
            $k = $n / 3 + $m / 2;
            $l = $n / 3 + $m;
            $i++;
        } while ($k < $length);
        $str1 = mb_substr($string, $start, $l, 'utf-8');
        return $str1;
    }

    /**
     * 处理数组，获取数组value为string之后为数组key arr
     */
    public static function getArrStrNextArrLv($arr, $key) {
        $result = array();
        if (is_array($arr[$key])) {
            return;
        }

        for ($i = $key + 1; $i < count($arr); $i++) {
            if (is_array($arr[$i])) {
                $result[] = "line_" . $i;
            } else {
                break;
            }
        }
        return $result;
    }

    public static function rebuildUrlForAdmin($url) {
        $url_p = explode('/', $url);
        array_shift($url_p); #throw junk
        $prefix = array_shift($url_p);
        $module = array_shift($url_p);
        $action = array_shift($url_p);
        $tmp = array();
        $j = count($url_p) / 2;
        for ($i = 0; $i < $j; $i++) {
            $k = array_shift($url_p);
            $v = array_shift($url_p);
            $tmp[$k] = $v;
        }
        $url = "/$prefix/$module/$action";
        foreach ($tmp as $k => $v) {
            $url .= "/$k/$v";
        }
        return $url;
    }

    public static function numToExcelAlpha($num) {
        $numeric = ($num - 1) % 26;
        $letter = chr(65 + $numeric);
        $num2 = intval(($num - 1) / 26);
        if ($num2 > 0) {
            return self::numToExcelAlpha($num2) . $letter;
        } else {
            return $letter;
        }
    }

    public static function formatNumeric($num) {
        $result = '';

        $str = str_replace('+', '', $num);
        $result = str_replace('-', '', $str);

        return $result;
    }

    public static function tableToPropelFomat($f) {
        $parts = explode('_', $f);
        foreach ($parts as &$part) {
            $part = ucfirst(strtolower(trim($part)));
        }
        return implode('', $parts);
    }

    public static function statisticCharNumber($string) {
        $position = array();
        $sTotal = 0;
        for ($i = 0; $i < mb_strlen($string, "UTF-8"); $i++) {
            $str = mb_substr($string, $i, 1, "UTF-8");
            $position[] = $str;
            if (preg_match("/^[\x7f-\xff]+$/", $str)) {
                $sTotal = $sTotal + 2;
            } else {
                $sTotal = $sTotal + 1;
            }
        }
        return $sTotal;
    }

}