<?php
namespace Settings;

return array(
        
    'router' => array(
        'routes' => array(
            
            'zfcadmin' => array(
                'child_routes' => array(
                    'settings' => array(
                        'type' => 'literal',
                        'options' => array(
                            'route' => '/settings',
                            'defaults' => array(
                                'controller' => 'Settings\Controller\Index',
                                'action'     => 'index',
                            ),
                        ),
                    ),
                    
                ),
            ),
            
        ),
    ),
    
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    
    'bjyauthorize' => array(
        
        'resource_providers' => array(
            'BjyAuthorize\Provider\Resource\Config' => array(
                'Setting' => array(),
            ),
        ),
        
        'rule_providers' => array(
            'BjyAuthorize\Provider\Rule\Config' => array(
                'allow' => array(
                    
                    array(array('admin'), 'Setting',array('view')),
                    
                ),
            ),
        ),
        
        'guards' => array(
            'BjyAuthorize\Guard\Controller' => array(
                
                // Enable access to ZFC User pages
                array('controller' => 'Settings\Controller\Index', 'roles' => array('admin')),
                
                
            ),
        ),
    ),
    
    // Main menu
    'navigation' => array(
        'admin' => array(
            'settings' => array(
                'label' => 'Settings',
                'route' => 'zfcadmin/settings',
                'resource' => 'Setting',
                'privilege' => 'view',
            ),
        ),
    ),
    
);
