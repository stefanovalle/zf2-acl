<?php

namespace Conferences\Assertions;

use Zend\Permissions\Acl\Acl;
use Zend\Permissions\Acl\Resource\ResourceInterface;
use Zend\Permissions\Acl\Role\RoleInterface;
use Zend\Permissions\Acl\Assertion\AssertionInterface;
use Conferences\Entity\Conference;

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
        
        if ($resource instanceof Conference) {
            return $resource->getCountry() == $this->loggedUser->getCountry();
        } else {
            return true;
        }
        
    }

}