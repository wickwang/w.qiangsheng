<?php

class signinForm extends BaseForm {

    public function configure() {
        $this->setWidgets(array(
            'username' => new sfWidgetFormInput(array('label' => '用户名：')),
            'password' => new sfWidgetFormInput(array('type' => 'password', 'label' => '密&#12288码：')),
            'remember' => new sfWidgetFormInputCheckbox(),
        ));

        $this->setValidators(array(
            'username' => new sfValidatorString(),
            'password' => new sfValidatorString(),
            'remember' => new sfValidatorBoolean(),
        ));

        $this->validatorSchema->setPostValidator(new guardValidatorUser());

        $this->widgetSchema->setNameFormat('signin[%s]');
    }

}
