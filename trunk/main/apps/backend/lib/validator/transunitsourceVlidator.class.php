<?php

class transunitsourceVlidator extends sfValidatorBase {

    protected function configure($options = array(), $messages = array()) {
        $this->setMessage('invalid', 'An object with the same name and cat already exist.');
    }

    /**
     * @see sfValidatorBase
     */
    protected function doClean($value) {
        $source = $clean = ($value);
        $cat_id = $_POST['trans_unit']['cat_id'];
        $trans_unit = TransUnitPeer::getTransUnitByCatIdAndSource($cat_id, $source);
        if ($trans_unit) {
            throw new sfValidatorError($this, 'invalid');
        }

        return $clean;
    }

}
