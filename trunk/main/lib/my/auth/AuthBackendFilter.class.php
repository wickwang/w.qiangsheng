<?php

class AuthBackendFilter extends sfFilter {

    /**
     * Execute filter
     *
     * @param sfFilterChain $filterChain
     */
    public function execute($filterChain) {
        // Execute this filter only once
        if ($this->isFirstCall()) {
            if ($this->accessWithoutLogin()) {
                
            } else if (AdminUserPeer::hasAdminAccess()) {
                $tmp = sfContext::getInstance();
                $user = $tmp->getUser();
                $user->setAuthenticated(true);
                $user->addCredentials('admin');
                $user->setCulture('zh-cn');
                if (!AdminUserPeer::hasAdminModuleAccess()) {
                    header('Location: /admin.php');
                    exit;
                }
            } else {
                header('Location: /admin.php/landing/login');
                exit;
            }
        }

        // Execute next filter
        $filterChain->execute();
    }

    private function accessWithoutLogin() {
        $module = $this->getContext()->getModuleName();
        $action = $this->getContext()->getActionName();

        $condition_nologin = (
                ($module == 'landing' && $action == 'login')
                );
        return $condition_nologin;
    }

}