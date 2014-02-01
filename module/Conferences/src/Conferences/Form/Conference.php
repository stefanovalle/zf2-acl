<?php

namespace Conferences\Form;

use Zend\Form\Form,
    Zend\Form\Element,
    Zend\Validator;
use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;

class Conference extends Form {
    	
    public function __construct(ObjectManager $objectManager) {
        
        parent::__construct();
        
        // set for hydrator
        $this->setHydrator(new DoctrineHydrator($objectManager, '\Conferences\Entity\Conference'));
        
        $title = new Element\Text('title');
        $title->setAttributes(array('id'    => 'title',
                                    'class' => 'input-xxlarge',
                             ))
              ->setLabel('Conference name')
              ->setLabelAttributes(array('class' => 'control-label'));
        $this->add($title);
        
        
        $abstract = new Element\Textarea('abstract');
        $abstract->setAttributes(array('id'    => 'abstract',
                                       'rows'  => '8', 
                                       'class' => 'input-xxlarge',
                                ))
                 ->setLabel('Abstract')
                 ->setLabelAttributes(array('class' => 'control-label'));
        $this->add($abstract);
        
        
        $dateFrom = new Element\Date('datefrom');
        $dateFrom->setAttributes(array('id'    => 'datefrom',
                                       'class' => 'input-medium',
                                ))
                  ->setLabel('From')
                  ->setLabelAttributes(array('class' => 'control-label'));
        $this->add($dateFrom);
        
        
        $dateTo = new Element\Date('dateto');
        $dateTo->setAttributes(array('id'    => 'dateto',
                                     'class' => 'input-medium',
                              ))
                ->setLabel('To')
                ->setLabelAttributes(array('class' => 'control-label'));
        $this->add($dateTo);
        
                
        $city = new Element\Text('city');
        $city->setAttributes(array('id'    => 'city',
                                   'class' => 'input-xxlarge',
                            ))
             ->setLabel('City')
             ->setLabelAttributes(array('class' => 'control-label'));
        $this->add($city);
        
        
        $submit = new Element\Button('submit');
        $submit->setAttributes(array('type'  => 'submit', 
                                     'class' => 'btn'
                              ))
               ->setLabel('Save');
        $this->add($submit);

   	}	  
}