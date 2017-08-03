<?php

/**
 * Skeleton subclass for performing query and update operations on the 'text_box' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.lib.model
 */
class TextBoxPeer extends BaseTextBoxPeer {

    public static function getTextById($id) {
        $obj = self::retrieveByPK($id);
        return is_object($obj) ? $obj->getBody(ESC_RAW) : "";
    }

}

// TextBoxPeer
