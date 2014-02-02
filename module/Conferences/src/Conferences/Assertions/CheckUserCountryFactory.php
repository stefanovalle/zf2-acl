<?php
namespace Conferences\Assertions;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class CheckUserCountryFactory implements FactoryInterface
{
    /**
     * {@inheritDoc}
     *
     * @return \Contents\Service\ContentService;
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $I_user = $serviceLocator->get('zfcuser_auth_service')->getIdentity();
        return new CheckUserCountry($I_user);
    }
}
