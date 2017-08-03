<?php

/**
 * Skeleton subclass for performing query and update operations on the 'image_box' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.lib.model
 */
class ImageBoxPeer extends BaseImageBoxPeer {

    public static function getImagePathById($id) {
        $result = '';
        
        $c = new Criteria();
        $c->add(self::ID, $id);
        $obj = self::doSelectOne($c);
        if(is_object($obj)){
            $result = $obj->getImagePath();
        }
        
        return $result;
    }
    
    public static function getImageUrlPath($id) {
        $result = '';
        
        $c = new Criteria();
        $c->add(self::ID, $id);
        $obj = self::doSelectOne($c);
        if(is_object($obj)){
            $result = $obj->getUrl();
        }
        
        return $result;
    }

}

// ImageBoxPeer
