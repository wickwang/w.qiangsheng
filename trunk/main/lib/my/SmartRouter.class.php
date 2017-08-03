<?php 

class SmartRouter{
    
    public static function getCurrentNode($menu_item_id=NULL, $menu_id=NULL){
        if(is_null($menu_id)){
            $menu_id = sfContext::getInstance()->getRequest()->getParameter('menu_id');
        }
        
        if(is_null($menu_item_id)){
            $menu_item_id = sfContext::getInstance()->getRequest()->getParameter('menu_item_id');
        }
        
        if($menu_id){
            $result = MenuPeer::retrieveByPK($menu_id);
        }elseif($menu_item_id){
            $result = MenuItemPeer::retrieveByPK($menu_item_id);
        }
        return $result;
    }
    
    public static function getMenuItems($menu_item_id=NULL, $menu_id=NULL){
        if(is_null($menu_id)){
            $menu_id = sfContext::getInstance()->getRequest()->getParameter('menu_id');
        }
        
        if(is_null($menu_item_id)){
            $menu_item_id = sfContext::getInstance()->getRequest()->getParameter('menu_item_id');
        }
        
        $menu_items = array();
        
        if($menu_id){
            $menu = MenuPeer::retrieveByPK($menu_id);
            if($menu){
                $menu_items = $menu->getChildrenMenuItems();
            }
        }elseif($menu_item_id){
            $menu_item = MenuItemPeer::retrieveByPK($menu_item_id);
            if($menu_item){
                $menu_items = $menu_item->getChildrens();
            }
        }
        return $menu_items;
    }
    
}

?>
