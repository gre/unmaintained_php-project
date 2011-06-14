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
    
    public function actionAddParticipant() {
    	$errors = array(); 
        foreach($this->post['nom_part'] AS $nom_part) {
        	$isAdd = ParticipantModel::add($this->post['nom_c'],$this->post['date_deb_ses'],$this->post['nom_part']);
        	if ($isAdd != true) {
        		$errors[] = $this->post['nom_part'] . " n'été pas ajouté a cause de: " . $isAdd;
        	}
        }
        $this->setVar('errors',$errors);
        
    }
}