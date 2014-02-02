<?php

namespace Settings\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use BjyAuthorize\Exception\UnAuthorizedException;

class IndexController extends AbstractActionController
{
    
    /**
     * Returns a list of conferences, as fethched from model
     * 
     * @return \Zend\View\Model\ViewModel
     */
    public function indexAction() {
        
    	return new ViewModel();
        
    }
    
    
}
