<?php
class ajaxindexAction extends sfAction{
    public function execute($request) {
        
        if ($request->getParameter('slideshow')) {
            $slideshow_id = $request->getParameter('slideshow');
            $obj = SlideshowPeer::retrieveByPK($slideshow_id);
            
            $_SESSION['slideshow_id'] = $slideshow_id;
            echo $slideshow_id;die;
        }
    }
}
