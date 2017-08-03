<?php

class TalkHelper {

    public static function connectTalk($url) {
        $url = $url . "/landing.php/login/systemuser";
        $username = '_SYSTEM_';
        $password = '243e3wrdwaR5raqw!#%werwa2412';
            	
        $cookie_file = tempnam('/temp', 'thiscookie');
        $post_fields = array(
            'UserName' => $username,
            'Password' => $password,
        );
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);  // SSL support   
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);  // SSL support        
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_file);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields);
        curl_exec($ch);
        return $ch;
    }

}

?>