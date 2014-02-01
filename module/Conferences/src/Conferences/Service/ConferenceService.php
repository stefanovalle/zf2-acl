<?php

namespace Conferences\Service;

use Conferences\Entity\Conference;

/**
 * Handles interaction with events (IE conferences)
 *
 * @author Stefano Valle
 *
 */
class ConferenceService {

    private $entityManager;
    
    private $conferenceRepository;
    
    public function __construct($entityManager) {

        $this->entityManager = $entityManager;

        $this->conferenceRepository = $this->entityManager->getRepository('Conferences\Entity\Conference');
        
    }
    
    public function getConference($id) {
       
        return $this->conferenceRepository->find($id);
        
    }
    
    public function getFullList() {
        
        return $this->conferenceRepository->findAll();
        
    }
    
    public function getList(\Application\Entity\Systemuser $I_loggedUser) {
        
        return $this->conferenceRepository->findBy(array('owner' => $I_loggedUser->getId()));
        
    }
    
    public function upsertConference(\Application\Entity\Systemuser $I_loggedUser, Conference $conference) {
        
        $conference->setOwner($I_loggedUser);
        
        $this->entityManager->persist($conference);
        $this->entityManager->flush();
        
        return $conference;
        
    }
    
    public function removeConference(Conference $conference) {
        
        $this->entityManager->remove($conference);
        $this->entityManager->flush();
        
    }
    
}