<?php

return array(
    'bjyauthorize' => array(

        'default_role' => 'guest',

        'identity_provider' => 'BjyAuthorize\Provider\Identity\AuthenticationIdentityProvider',

        'role_providers' => array(

            'BjyAuthorize\Provider\Role\ObjectRepositoryProvider' => array(
                'role_entity_class' => 'Application\Entity\Role',
                'object_manager'    => 'doctrine.entity_manager.orm_default',
            ),

        ),
        
    ),
);