<?php

namespace Conferences\Service;

use Conferences\Entity\Conference;
use BjyAuthorize\Exception\UnAuthorizedException;

/**
 * Handles interaction with events (IE conferences)
 *
 * @author Stefano Valle
 *
 */
class ConferenceService {

    private $entityManager;
    
    private $authorize;
    
    private $conferenceRepository;
    
    public function __construct($entityManager, $authorize) {

        $this->entityManager = $entityManager;
        
        $this->authorize = $authorize;

        $this->conferenceRepository = $this->entityManager->getRepository('Conferences\Entity\Conference');
        
    }
    
    public function getConference($id) {
       
        $conference = $this->conferenceRepository->find($id);
        
        if (!$this->authorize->isAllowed($conference, 'view')) {
            throw new UnAuthorizedException();
        }
        
        return $conference;
        
    }
    
    public function getFullList() {
        
        return $this->conferenceRepository->findAll();
        
    }
    
    public function getList(\Application\Entity\Systemuser $I_loggedUser) {
        
        return $this->conferenceRepository->findBy(array('owner' => $I_loggedUser->getId()));
        
    }
    
    public function upsertConference(\Application\Entity\Systemuser $I_loggedUser, Conference $conference) {
        
        // check if logged user has enough privileges to edit this conf
        if (!$this->authorize->isAllowed($conference, 'edit')) {
            throw new UnAuthorizedException();
        }
        
        $conference->setOwner($I_loggedUser);
        
        $this->entityManager->persist($conference);
        $this->entityManager->flush();
        
        return $conference;
        
    }
    
    public function removeConference(Conference $conference) {
        
        // check if logged user has enough privileges to edit this conf
        if (!$this->authorize->isAllowed($conference, 'edit')) {
            throw new UnAuthorizedException();
        }
        
        $this->entityManager->remove($conference);
        $this->entityManager->flush();
        
    }
    
}