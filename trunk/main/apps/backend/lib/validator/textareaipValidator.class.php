<?php

class textareaValidator extends sfValidatorBase {

    protected function configure($options = array(), $messages = array()) {
        $this->setMessage('invalid', '输入的IP不合法.');
    }

    /**
     * @see sfValidatorBase
     */
    protected function doClean($value) {
        $clean = ($value);

        if (!$this->checkIp($value)) {
            throw new sfValidatorError($this, 'invalid');
        }

        return $clean;
    }

    private function checkIp($value) {
        $value = trim($value);
        if (!$value) {
            return true;
        }
        $online_ips = explode("\n", $value);
        $flag = true;

        foreach ($online_ips as $online_ip) {
            $ip_ranges = explode('-', $online_ip);
            foreach ($ip_ranges as $ip) {
                if (!$this->checkone($ip)) {
                    $flag = false;
                }
            }
        }
        return $flag;
    }

    private function checkone($ip) {
        $ip = trim($ip);
        $result = true;
        if (!preg_match("/^[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}$/", $ip)) {
            $result = false;
        }
        return $result;
    }

}
