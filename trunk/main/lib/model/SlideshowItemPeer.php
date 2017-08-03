<?php

/**
 * Skeleton subclass for performing query and update operations on the 'slideshow_item' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.lib.model
 */
class SlideshowItemPeer extends BaseSlideshowItemPeer {

    public static function getSlideShow($slideshow_id = null) {
        $c = new Criteria();
        $c->addDescendingOrderByColumn(self::POSITION);
        if ($slideshow_id) {
            $c->add(self::SLIDESHOW_ID, $slideshow_id, Criteria::EQUAL);
        }
        return self::doSelect($c);
    }

}

// SlideshowItemPeer
