<?php

class AuthBaseFilter extends sfFilter {

    /**
     * Execute filter
     *
     * @param sfFilterChain $filterChain
     */
    public function execute($filterChain) {
        // Execute this filter only once
        if ($this->isFirstCall()) {
                
            
//                $application = $this->getContext()->getConfiguration()->getApplication();
//                $module = $this->getContext()->getModuleName();
//                $action = $this->getContext()->getActionName();
//
//
//
//                $condition_need_login = (
//                        ($application == 'admin' || $application == 'user')
//                    );
//                // not login
//                if ($condition_need_login) {
//                    if (!isset($_SESSION['valid_user'])) {
//
//                        session_unset();
//                        session_destroy();
//                        session_regenerate_id();
//                        
//                        // redirect to login
//                        header('Location: /login');
//                        exit;
//                    } else {
//                        //header('Location: /');
//                    } 
//                }               

        }

        // Execute next filter
        $filterChain->execute();
    }

}