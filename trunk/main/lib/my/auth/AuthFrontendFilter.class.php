<?php

class AuthFrontendFilter extends sfFilter {

    /**
     * Execute filter
     *
     * @param sfFilterChain $filterChain
     */
    public function execute($filterChain) {
        // Execute this filter only once
        if ($this->isFirstCall()) {
            
        }

        // Execute next filter
        $filterChain->execute();
    }

}