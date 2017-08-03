<?php



/**
 * Skeleton subclass for performing query and update operations on the 'admin_category' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.lib.model
 */
class AdminCategoryPeer extends BaseAdminCategoryPeer {
public static function getCategoriesForsfAdminDash(){
        $c = new Criteria();
        $c->addAscendingOrderByColumn(AdminCategoryPeer::NAME);
        $result = array();
        $raw_categories = self::doSelect($c);
        foreach($raw_categories as $raw_category){
            $tmp_admin_items = $raw_category->getEnabledHasAccessItems();
            if(count($tmp_admin_items)>0){
                $result[$raw_category->getName()] = self::_getCategoriesForsfAdminDashBuildArray($tmp_admin_items);
            }
        }
        return $result;
    }

    private static function _getCategoriesForsfAdminDashBuildArray($admin_items){
        $result['credentials'] = array('admin');
        $result['items'] = array();
        foreach ($admin_items as $admin_item){
            $result['items'][$admin_item->getName()] = array(
                                                                'image'=>$admin_item->getImage(),
                                                                'url'=>$admin_item->getUrl(),
                                                             );
        }
        return $result;
    }
} // AdminCategoryPeer
