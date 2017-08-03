<?php

/**
 * Skeleton subclass for representing a row from the 'slideshow_item_item' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.lib.model
 */
class SlideshowItem extends BaseSlideshowItem {

    public function delete(PropelPDO $con = null) {
        $path = sfConfig::get('sf_upload_dir') . DIRECTORY_SEPARATOR . 'slideshow_item' . DIRECTORY_SEPARATOR . $this->getId() . DIRECTORY_SEPARATOR;
        UtilsFile::deleteDirectory($path);
        parent::delete();
    }

    public function save(PropelPDO $con = null) {
        $isInsert = $this->isNew();

        if ($isInsert) {
            $this->hookBeforeCreate();
        } else {
            $this->hookBeforeUpdate();
        }

        parent::save($con);

        if ($isInsert) {
            $this->hookafterNew();
        }
    }

    private function hookBeforeUpdate() {
        
    }

    private function hookBeforeCreate() {
        
    }

    private function hookafterNew() {
        $this->setPosition($this->getId());
        $this->save();
    }

    public function getImagePath() {
        $filename = "/uploads/slideshow_item/" . $this->getId() . "/" . $this->getImageToken();
        return $filename;
    }

    public function getImageBasePath() {
        return sfConfig::get('sf_upload_dir') . DIRECTORY_SEPARATOR . 'slideshow_item' . DIRECTORY_SEPARATOR . $this->getId();
    }

    public function deleteImage() {
        $dest_base_path = $this->getImageBasePath();
        // make some resized codpy
        $file = $dest_base_path . DIRECTORY_SEPARATOR . $this->getImageToken();
        if (file_exists($file)) {
            @unlink($file);
        }
        $this->setImageToken("");
        $this->save();
    }

    public function moveUp() {
        $this->exchangePosition($this, $this->getMoveUpTarget());
    }

    public function moveDown() {
        $this->exchangePosition($this, $this->getMoveDownTartget());
    }

    private function exchangePosition($a, $b) {
        if ($a && $b) {
            $a_position = $a->getPosition();
            $b_position = $b->getPosition();
            $a->setPosition($b_position);
            $b->setPosition($a_position);
            $a->save();
            $b->save();
        }
    }

    private function getMoveUpTarget() {
        $result = null;

        $c = new Criteria();
        $peer = $this->getPeer();
        $peer_name = get_class($peer);

        $c->addDescendingOrderByColumn($peer_name::POSITION);
        $c->add($peer_name::SLIDESHOW_ID, $this->getSlideshowId());
        $objs = $this->getPeer()->doSelect($c);
        for ($i = 0; $i < count($objs); $i++) {
            if ($objs[$i]->getId() == $this->getId()) {
                if (isset($objs[$i - 1])) {
                    $result = $objs[$i - 1];
                }
                break;
            }
        }
        return $result;
    }

    private function getMoveDownTartget() {
        $result = null;
        $c = new Criteria();
        $peer = $this->getPeer();
        $peer_name = get_class($peer);
        $c->addDescendingOrderByColumn($peer_name::POSITION);
        $c->add($peer_name::SLIDESHOW_ID, $this->getSlideshowId());
        $objs = $this->getPeer()->doSelect($c);

        for ($i = 0; $i < count($objs); $i++) {
            if ($objs[$i]->getId() == $this->getId()) {
                if (isset($objs[$i + 1])) {
                    $result = $objs[$i + 1];
                }
                break;
            }
        }
        return $result;
    }

}

// SlideshowItem
