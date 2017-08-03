<?php

// the image validator extending the file validator
class mysfValidatorFileImage extends sfValidatorFile {

    protected function configure($options = array(), $messages = array()) {
        /* size image options */
        $this->addOption('min_size_x');
        $this->addOption('max_size_x');
        $this->addOption('min_size_y');
        $this->addOption('max_size_y');
        $this->addOption('size_x');
        $this->addOption('size_y');
        /* we set a default value as image for mime type */
        $this->addOption('mime_types', 'web_images');


        /* size image error messages */
        $this->addMessage('min_size_x', '图片太宽了 (最小宽度 是 %min_size_x% 像素).');
        $this->addMessage('max_size_x', '图片太小了 (最大宽度 is %max_size_x% 像素).');
        $this->addMessage('min_size_y', '图片太大了 (最小高度 是 %min_size_y% 像素).');
        $this->addMessage('max_size_y', '图片太小了 (最小宽度 is %max_size_y% 像素).');
        $this->addMessage('equal', '图片尺寸要求宽度是%x%像素,高度是%y%像素');
        /* mime type error message */
        $this->addMessage('mime_types', '无效的图片格式 (%mime_type%).');

        /* let's use the parent configure() to keep file validator configure() */
        parent::configure($options, $messages);
    }

// END configure()

    protected function doClean($value) {
        parent::doClean($value);

        // we get the image size
        $size = getimagesize($value['tmp_name']);
        
        if (($this->hasOption('size_x') && $this->getOption('size_x') != (int) $size[0]) || ($this->hasOption('size_y') && $this->getOption('size_y') != (int) $size[1]) ) {
            throw new sfValidatorError($this, 'equal', array('x' => $this->getOption('size_x'), 'y' => $this->getOption('size_y')));
        }
        
        // check "image size x" vs "max_size_x"
        if ($this->hasOption('max_size_x') && !is_null($this->getOption('max_size_x')) && $this->getOption('max_size_x') < (int) $size[0]) {
            throw new sfValidatorError($this, 'max_size_x', array('max_size_x' => $this->getOption('max_size_x'), 'size_x' => (int) $size[0]));
        }
        // check size x vs min_size_x
        if ($this->hasOption('min_size_x') && !is_null($this->getOption('min_size_x')) && $this->getOption('min_size_x') > (int) $size[0]) {
            throw new sfValidatorError($this, 'min_size_x', array('min_size_x' => $this->getOption('min_size_x'), 'size_x' => (int) $size[0]));
        }

        // check size y vs max_size_y
        if ($this->hasOption('max_size_y') && !is_null($this->getOption('max_size_y')) && $this->getOption('max_size_y') < (int) $size[1]) {
            throw new sfValidatorError($this, 'max_size_y', array('max_size_y' => $this->getOption('max_size_y'), 'size_y' => (int) $size[1]));
        }
        // check size y vs min_size_y
        if ($this->hasOption('min_size_y') && !is_null($this->getOption('min_size_y')) && $this->getOption('min_size_y') > (int) $size[1]) {
            throw new sfValidatorError($this, 'min_size_y', array('min_size_y' => $this->getOption('min_size_y'), 'size_y' => (int) $size[1]));
        }

        // return value
        return parent::doClean($value);
        ;
    }

// END doClean()
}
