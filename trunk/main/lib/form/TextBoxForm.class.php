<?php

/**
 * TextBox form.
 *
 * @package    s.shangzhi.cpieredu
 * @subpackage form
 * @author     Your name here
 */
class TextBoxForm extends BaseTextBoxForm {

    public function configure() {
        $this->widgetSchema['box_type_text'] = new sfWidgetFormPlain(array('default' => self::getBoxTypeName()));
    }

    private function getBoxTypeName() {
        $obj = BoxTypePeer::retrieveByPK($this->getObject()->getBoxTypeId());
        return is_object($obj) ? $obj->getValue() : "";
    }

}
