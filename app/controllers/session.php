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
        
        $session_place_libre = $session['nb_max_part']-$session['nb_part_ins'];
        
        foreach($this->post['nom_part'] AS $nom_part) {
        	if ($session_place_libre == 0) {
        		$errors[] = "Il n'y a plus de place pour " . $nom_part;
        		continue;
        	}
        	
        	$participantAlready = ParticipantModel::getNomParticipant($this->getLoggedUserId(),$this->post['nom_c'],$this->post['date_deb_ses'],$nom_part);
        	if ($participantAlready != false) {
        		$errors[] = $nom_part . " est déjà inscrit";
        	} else {
                  $participants[] = $nom_part;
                  $session_place_libre--;
             }
        }
        $this->setLayoutVar('error',$errors);
        $this->setVar('participants',$participants);
        $this->setVar('session',$session);
        $this->setVar('cours',$cours);
        $this->loadView("session/confirmation");
    }
    public function actionaddParticipants() {
    	$error = false;
    	
        $isAdded = ParticipantModel::addParticipants($this->getLoggedUserId(),$this->post['nom_c'],$this->post['date_deb_ses'],$this->post['participant']);
        if ($isAdded !== true) {
        	$error = "Le participant " . $isAdded . " est déjà inscrit à cette session, la transaction a été annulée";
        }
        $this->setVar('error',$error);
        
        $this->redirect("/session/view?nom_c={$this->post['nom_c']}&date_deb_ses={$this->post['date_deb_ses']}");
        
        die();
    }
    
    public function actionDelete() {
    	ParticipantModel::deleteParticipant($this->getLoggedUserId(),$this->post['nom_c'],$this->post['date_deb_ses'],$this->post['nom_part']);
    	
    	$this->redirect("/session/view?nom_c={$this->post['nom_c']}&date_deb_ses={$this->post['date_deb_ses']}");
    	
    	die();
    }
}
