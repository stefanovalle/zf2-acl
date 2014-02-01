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
    
);
