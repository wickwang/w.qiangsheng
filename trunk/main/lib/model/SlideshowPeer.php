<?php

/**
 * Skeleton subclass for performing query and update operations on the 'slideshow' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.lib.model
 */
class SlideshowPeer extends BaseSlideshowPeer {

    public static function getSlideshows($id = null) {
        $c = new Criteria();
        $c->addAscendingOrderByColumn(self::ID);
        if ($id) {
            $c->add(self::ID, $id, Criteria::EQUAL);
        }
        return self::doSelect($c);
    }

    public static function getCurrentSlideshows($id = null) {
        $c = new Criteria();
        $c->addAscendingOrderByColumn(self::ID);
        if ($id) {
            $c->add(self::ID, $id, Criteria::EQUAL);
        }
        return self::doSelect($c);
    }

}

// SlideshowPeer
