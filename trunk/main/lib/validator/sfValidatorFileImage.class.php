<?php

// the image validator extending the file validator
class sfValidatorFileImage extends sfValidatorFile
{

protected function configure($options = array(), $messages = array())
  {
    /* size image options */
    $this->addOption('min_size_x');
    $this->addOption('max_size_x');
    $this->addOption('min_size_y');
    $this->addOption('max_size_y');
    /* we set a default value as image for mime type */
    $this->addOption('mime_types' , 'web_images');


    /* size image error messages */
    $this->addMessage('min_size_x', 'Image width is not big enough (minimum is %min_size_x% pixels).');
    $this->addMessage('max_size_x', 'Image width is too small (maximum is %max_size_x% pixels).');
    $this->addMessage('min_size_y', 'Image height is not big enough (minimum is %min_size_y% pixels).');
    $this->addMessage('max_size_y', 'Image height is too small (maximum is %max_size_y% pixels).');
    /* mime type error message */ 
    $this->addMessage('mime_types', 'Invalid mime type (%mime_type%). It is not an image file.');
   
    /* let's use the parent configure() to keep file validator configure() */    
    parent::configure($options, $messages);
  } // END configure()

 protected function doClean($value)
  {
    parent::doClean($value);
      
    // we get the image size
    $size = getimagesize($value['tmp_name']);
    
    // check "image size x" vs "max_size_x"
    if ($this->hasOption('max_size_x') && $this->getOption('max_size_x') < (int) $size[0])
    {
      throw new sfValidatorError($this, 'max_size_x', array('max_size_x' => $this->getOption('max_size_x'), 'size_x' => (int) $size[0]));
    }
    // check size x vs min_size_x
    if ($this->hasOption('min_size_x') && $this->getOption('min_size_x') > (int) $size[0])
    {
      throw new sfValidatorError($this, 'min_size_x', array('min_size_x' => $this->getOption('min_size_x'), 'size_x' => (int) $size[0]));
    }

    // check size y vs max_size_y
    if ($this->hasOption('max_size_y') && $this->getOption('max_size_y') < (int) $size[1])
    {
      throw new sfValidatorError($this, 'max_size_y', array('max_size_y' => $this->getOption('max_size_y'), 'size_y' => (int) $size[1]));
    }
    // check size y vs min_size_y
    if ($this->hasOption('min_size_y') && $this->getOption('min_size_y') > (int) $size[1])
    {
      throw new sfValidatorError($this, 'min_size_y', array('min_size_y' => $this->getOption('min_size_y'), 'size_y' => (int) $size[1]));
    }

    // return value
    return parent::doClean($value);
;
  } // END doClean()

}
