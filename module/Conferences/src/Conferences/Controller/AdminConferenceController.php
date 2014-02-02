<?php

namespace Conferences\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use BjyAuthorize\Exception\UnAuthorizedException;

use Conferences\Service\ConferenceService;
use Conferences\Form\Conference as ConferenceForm;
use Conferences\Entity\Conference;

class AdminConferenceController extends AbstractActionController
{
    
    /**
     * Conference creation and edit Form 
     *  
     * @var \Zend\Form\Form
     */
    private $form;
    
    /**
     * Main service for handling conferences (IE conferences)
     * 
     * @var \Conferences\Service\ConferenceService
     */
    private $conferenceService;
    
    
    /**
     * Class constructor
     * 
     * @param \Conferences\Service\ConferenceService $conferenceService
     * @param \Zend\Form\Form $promoteForm
     */
    public function __construct(ConferenceService $conferenceService, ConferenceForm $form) {
        $this->conferenceService = $conferenceService;
        $this->form = $form;
    }
    
    /**
     * Returns a list of conferences, as fethched from model
     * 
     * @return \Zend\View\Model\ViewModel
     */
    public function indexAction() {
        
    	return new ViewModel(array('conferences' => $this->conferenceService->getFullList()));
        
    }
    
    public function viewAction() {
        return new ViewModel(array('conference' => $this->getConferenceFromQuery()));
    }
    
    /**
     * Add new conference
     *
     * @return \Zend\View\Model\ViewModel
     */
    public function addAction() {
        
        $conference = new Conference();
        
        // bind entity values to form
        $this->form->bind($conference);
        
        $view = $this->processForm();
        
        if (!$view instanceof ViewModel) {
        
            $view = new ViewModel(array('form' => $this->form, 
                                        'title' => 'New conference'));
            $view->setTemplate('conferences/admin-conference/conference-form');
            
        }
        
        return $view;
    }
    
    public function editAction() {
        
        $conference = $this->getConferenceFromQuery();
        
        // bind entity values to form
        $this->form->bind($conference);

        $view = $this->processForm();

        if (!$view instanceof ViewModel) {

            $view = new ViewModel(array('form' => $this->form, 'title' => 'Edit conference ' . $conference->getTitle()));
            $view->setTemplate('conferences/admin-conference/conference-form');

        }

        return $view;
        
    }
    

    public function removeAction() {
        $conference = $this->getConferenceFromQuery();
                
        $this->conferenceService->removeConference($conference);
        
        return $this->redirect()->toRoute('zfcadmin/conferences');
    }
    
    
    /*
     * Private methods
     */
    
    private function processForm() {
        
        if ($this->request->isPost()) {
        
            // get post data
            $post = $this->request->getPost()->toArray();
            
            // fill form
            $this->form->setData($post);
        
            // check if form is valid
            if(!$this->form->isValid()) {
                
                // prepare view
                $view = new ViewModel(array('form'  => $this->form,
                                            'title' => 'Some errors during conference processing'));
                $view->setTemplate('conferences/admin-conference/conference-form');
                
                return $view;
        
            }
        
            // use service to save data
            $this->conferenceService->upsertConference($this->zfcUserAuthentication()->getIdentity(), $this->form->getData());
        
            // redirect to conference list
            return $this->redirect()->toRoute('zfcadmin/conferences');
            
        }
        
    }
    
    private function getConferenceFromQuery() {
    
        $id = (int)$this->params('id');
    
        if (empty($id) || $id <= 0){
            $this->getResponse()->setStatusCode(404);    //@todo throw custom exception instead
            return;
        }
    
        $conference = $this->conferenceService->getConference($id);
    
        if ($conference === null){
            throw new \Exception('Conference not found');    //@todo throw custom exception instead
        }
    
        return $conference;
    
    }
    
}
