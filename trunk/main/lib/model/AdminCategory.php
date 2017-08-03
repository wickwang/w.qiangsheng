<?php

/**
 * Skeleton subclass for representing a row from the 'admin_category' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.lib.model
 */
class AdminCategory extends BaseAdminCategory {

    public function __toString() {
        return $this->getName();
    }

    public function getEnabledItems() {
        $c = new Criteria();
        $c->add(AdminItemPeer::ADMIN_CATEGORY_ID, $this->id);
        $c->add(AdminItemPeer::IS_ENABLED, 1);
        $c->addAscendingOrderByColumn(AdminItemPeer::NAME);
        return AdminItemPeer::doSelect($c);
    }

    public function getEnabledHasAccessItems() {
        $c = new Criteria();
        $c->add(AdminItemPeer::ADMIN_CATEGORY_ID, $this->id);
        $c->add(AdminItemPeer::IS_ENABLED, 1);
        $c->addAscendingOrderByColumn(AdminItemPeer::NAME);
        $result = AdminItemPeer::doSelect($c);
        return $result;
    }

}

// AdminCategory
