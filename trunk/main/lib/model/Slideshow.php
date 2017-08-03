<?php

/**
 * Skeleton subclass for representing a row from the 'slideshow' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.lib.model
 */
class Slideshow extends BaseSlideshow {

    public function __toString() {
        return $this->getName();
    }

    public function delete(PropelPDO $con = null) {
        $id = $this->getId();
        $path = sfConfig::get('sf_upload_dir') . DIRECTORY_SEPARATOR . 'slideshow' . DIRECTORY_SEPARATOR . $id;
        UtilsFile::deleteDirectory($path);
        parent::delete();
    }

}

// Slideshow
