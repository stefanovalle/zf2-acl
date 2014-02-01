<?php

namespace Conferences\Form;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

use Conferences\Form\Conference as ConferenceForm,
    Conferences\Form\ConferenceFilter;

class ConferenceFactory implements FactoryInterface {

    /**
     * Default method to be used in a Factory Class
     * 
     * @see \Zend\ServiceManager\FactoryInterface::createService()
     */
	public function createService(ServiceLocatorInterface $serviceLocator) {
		
        // Get dependencies from Service Manager
        $objectManager = $serviceLocator->get('doctrine.entitymanager.orm_default');
                
        // Create form object
	    $form = new ConferenceForm($objectManager);
	    
        // Set input filter
	    $formFilter = new ConferenceFilter();
	    $form->setInputFilter($formFilter);
	    
	    return $form; 
		
	}

}