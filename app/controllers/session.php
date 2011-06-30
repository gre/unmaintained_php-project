<?php

class SessionController extends AppController
{
	protected $_model = array('session','participant');

    protected function actionBefore() {
        parent::beforeAction();
        include(APP_PATH.'models/client.php');
    }
    
    public function actionIndex() {
        //SessionModel::getMySession();
        $this->requireLogin();
        $this->setVar('sessions',SessionModel::getAll());
        $this->render();
    }
    
    public function actionView() {
    	$this->requireLogin();
        $session = SessionModel::getSession($this->get['nom_c'], $this->get['date_deb_ses']);
        if (empty($session)) $this->redirect('/session/index');
        
        $participants = ParticipantModel::getBySession($this->get['nom_c'], $this->get['date_deb_ses']);
        
        $this->setVar('session',$session);
        $this->setVar('participants',$participants);
        $this->render();
    }
    
    public function actionAskAddParticipants() {
    	$errors = array();
        $participants = array();
        $session = SessionModel::getSession($this->post['nom_c'], $this->post['date_deb_ses']);
        $cours = CoursModel::getById($session['nom_c']);
        foreach($this->post['nom_part'] AS $nom_part) {
        	$participantAlready = ParticipantModel::getNomParticipant($this->getLoggedUserId(),$this->post['nom_c'],$this->post['date_deb_ses'],$nom_part);
        	if ($participantAlready != false) {
        		$errors[] = $this->post['nom_part'] . " est deja inscrit";
        	} else
                  $participants[] = $nom_part;
        }
        $this->setVar('errors',$errors);
        $this->setVar('participants',$participants);
        $this->setVar('session',$session);
        $this->setVar('cours',$cours);
        $this->loadView("session/confirmation");
    }
    public function actionAddParticipants() {
    	$errors = array();
        $isAdd = ParticipantModel::addParticipants($this->post['nom_c'],$this->post['date_deb_ses'],$this->post['nom_part']);
        $this->setVar('errors',$errors);
    }
}