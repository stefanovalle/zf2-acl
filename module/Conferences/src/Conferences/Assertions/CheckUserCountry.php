<?php

namespace Conferences\Assertions;

use Zend\Permissions\Acl\Acl;
use Zend\Permissions\Acl\Resource\ResourceInterface;
use Zend\Permissions\Acl\Role\RoleInterface;
use Zend\Permissions\Acl\Assertion\AssertionInterface;

class CheckUserCountry implements AssertionInterface
{
    private $loggedUser;
    
    public function __construct(\Application\Entity\Systemuser $loggedUser = null) {
        $this->loggedUser  = $loggedUser;
    }
    
    public function assert(Acl $acl,
                           RoleInterface $role = null,
                           ResourceInterface $resource = null,
                           $privilege = null)
    {
        
       return $resource->getCountry() == $this->loggedUser->getCountry();
        
    }

}