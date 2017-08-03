<?php

/**
 * Skeleton subclass for representing a row from the 'image_box' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.lib.model
 */
class ImageBox extends BaseImageBox {

    public function delete(PropelPDO $con = null) {
        $path = sfConfig::get('sf_upload_dir') . DIRECTORY_SEPARATOR . 'image_box' . DIRECTORY_SEPARATOR . $this->getId() . DIRECTORY_SEPARATOR;
        UtilsFile::deleteDirectory($path);
        parent::delete();
    }

    public function getImagePath() {
        $filename = "/uploads/image_box/" . $this->getId() . "/" . $this->getImageSrc();
        return $filename;
    }

    public function getImageBasePath() {
        return sfConfig::get('sf_upload_dir') . DIRECTORY_SEPARATOR . 'image_box' . DIRECTORY_SEPARATOR . $this->getId();
    }

    public function deleteImage() {
        $dest_base_path = $this->getImageBasePath();
        // make some resized codpy
        $file = $dest_base_path . DIRECTORY_SEPARATOR . $this->getImageSrc();
        if (file_exists($file)) {
            @unlink($file);
        }
        $this->setImageSrc("");
        $this->save();
    }

}

// ImageBox
