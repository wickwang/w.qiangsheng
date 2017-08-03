<?php

/**
 * Skeleton subclass for representing a row from the 'box_type' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.lib.model
 */
class BoxType extends BaseBoxType {

    public function __toString() {
        return $this->getValue();
    }

}

// BoxType
