<?php

namespace Conferences\Form;

use Zend\InputFilter\InputFilter;

class ConferenceFilter extends InputFilter {
    	
    public function __construct() {   	
		
		$this->add(array(
            'name'       => 'title',
            'required'   => true,
            'filters' => array(
                array('name' => 'StringTrim'),
                array('name' => 'StripTags'),
            ),
            'validators' => array(
            	array(
	                'name' => 'not_empty',
	            ),                
            ),
        ));
        
        $this->add(array(
            'name'       => 'abstract',
            'required'   => true,
            'filters' => array(
                array('name' => 'StringTrim'),
                array('name' => 'StripTags'),
            ),
            'validators' => array(
            	array(
	                'name' => 'not_empty',
	            ),                
            ),
        ));
		
		$this->add(array(
		    'name'       => 'city',
		    'required'   => true,
		    'filters' => array(
		        array('name' => 'StringTrim'),
		        array('name' => 'StripTags'),
		    ),
		    'validators' => array(
		        array(
		            'name' => 'not_empty',
		        ),
		    ),
		));
        
        $this->add(array(
		    'name'       => 'datefrom',
		    'required'   => true,
		    'filters' => array(
		        array('name' => 'StringTrim'),
		        array('name' => 'StripTags'),
		    ),
		    'validators' => array(
		        array(
		            'name' => 'not_empty',
		        ),
		        new \Zend\Validator\Date(array('format' => 'Y-m-d'))
		    ),
		));
		
		$this->add(array(
		    'name'       => 'dateto',
		    'required'   => true,
		    'filters' => array(
		        array('name' => 'StringTrim'),
		        array('name' => 'StripTags'),
		    ),
		    'validators' => array(
		        array(
		            'name' => 'not_empty',
		        ),
		        new \Zend\Validator\Date(array('format' => 'Y-m-d'))
		    ),
		));
			
    }
}
