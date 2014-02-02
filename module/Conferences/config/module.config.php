<?php
namespace Conferences;

return array(
        
    'router' => array(
        'routes' => array(
            
            'zfcadmin' => array(
                'child_routes' => array(
                    'conferences' => array(
                        'type' => 'literal',
                        'options' => array(
                            'route' => '/conferences',
                            'defaults' => array(
                                'controller' => 'Conferences\Controller\AdminConference',
                                'action'     => 'index',
                            ),
                        ),
                        'may_terminate' => true,
                        'child_routes' => array(

                            // Event CRUD route
                            'crud' => array(
                                'type' => 'Zend\Mvc\Router\Http\Segment',
                                'options' => array(
                                    'route'    => '/:action[/:id]',
                                    'constraints' => array(
                                        'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                                        'id'         => '[0-9]*',
                                    ),
                                ),
                            ),
                            
                        ),
                    ),
                    
                    'anothercontroller' => array(
                        'type' => 'literal',
                        'options' => array(
                            'route' => '/someurl',
                            'defaults' => array(
                                'controller' => 'Conferences\Controller\AnotherAdmin',
                                'action'     => 'index',
                            ),
                        ),
                        'may_terminate' => true,
                        'child_routes' => array(

                            // Event CRUD route
                            'crud2' => array(
                                'type' => 'Zend\Mvc\Router\Http\Segment',
                                'options' => array(
                                    'route'    => '/:action[/:id]',
                                    'constraints' => array(
                                        'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                                        'id'         => '[0-9]*',
                                    ),
                                ),
                            ),

                        ),
                    ),
                    
                ),
            ),
            
        ),
    ),
    
    'doctrine' => array(
        'driver' => array(
            __NAMESPACE__ . '_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/' . __NAMESPACE__ . '/Entity')
            ),
            'orm_default' => array(
                'drivers' => array(
                    __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver'
                )
            ),
        ),
    ),
    
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
        
         'strategies' => array(
         
            'ViewJsonStrategy',
         
      ),
    ),
    
    'bjyauthorize' => array(
        
        'resource_providers' => array(
            'BjyAuthorize\Provider\Resource\Config' => array(
                'Conference' => array(),
            ),
        ),
        
        'rule_providers' => array(
            'BjyAuthorize\Provider\Rule\Config' => array(
                'allow' => array(
                    
                    // allow all users to view all conferences
                    array(array('editor'), 'Conference', array('edit')),
                    
                ),
            ),
        ),
        
        'guards' => array(
            'BjyAuthorize\Guard\Controller' => array(
                
                // Enable access to ZFC User pages
                array('controller' => 'zfcuser', 'roles' => array()),
                
                // Restrict access to other pages admin controllers
                array('controller' => 'ZfcAdmin\Controller\AdminController', 'roles' => array('viewer','editor')),
                
                array('controller' => 'Conferences\Controller\AdminConference', 
                      'action' => array('index','view'),
                      'roles' => array('viewer','editor')),
                
                array('controller' => 'Conferences\Controller\AdminConference', 
                      'action' => array('edit','remove'), 
                      'roles' => array('admin','editor')),
                
                
                array('controller' => 'Conferences\Controller\AnotherAdmin', 'roles' => array('viewer','editor')),
                
                
            ),
        ),
    ),
    
);
