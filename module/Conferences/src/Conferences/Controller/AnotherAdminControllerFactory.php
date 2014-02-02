<?php

namespace Conferences\Controller;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

use Conferences\Form\Conference as ConferenceForm,
    Conferences\Form\ConferenceImage as ConferenceImageForm,
    Conferences\Form\ConferenceFilter,
    Conferences\Form\ConferenceImageFilter,
    Conferences\Controller\AdminConferenceController;

class AnotherAdminControllerFactory implements FactoryInterface {

    /**
     * Default method to be used in a Factory Class
     * 
     * @see \Zend\ServiceManager\FactoryInterface::createService()
     */
	public function createService(ServiceLocatorInterface $serviceLocator) {
		
	    // dependency is fetched from Service Manager
	    $conferenceService = $serviceLocator->getServiceLocator()->get('Conferences\Service\Conference');
        $form = $serviceLocator->getServiceLocator()->get('Conferences\Form\Conference');
        
	    // Controller is constructed, dependencies are injected (IoC in action)
	    $controller = new AnotherAdminController($conferenceService, $form); 
	    
	    return $controller; 
		
	}

}