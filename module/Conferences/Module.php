<?php

namespace Conferences;

class Module 
{
    
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
    
    // Service Manager Configuration
    public function getServiceConfig() {
    	return array(
            
            'factories' => array(
                
                'Conferences\Service\Conference' => 'Conferences\Service\ConferenceServiceFactory',
                'Conferences\Form\Conference' => 'Conferences\Form\ConferenceFactory',

            ),
    			
    	);
    }
    
    public function getControllerConfig() {
        
        return array(
            'factories' => array(
                
                'Conferences\Controller\AdminConference' => 'Conferences\Controller\AdminConferenceControllerFactory',
                'Conferences\Controller\AnotherAdmin' => 'Conferences\Controller\AnotherAdminControllerFactory',
                
            ),
        );
        
    } 
    
}
