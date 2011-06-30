<?php

class IngenieurController extends AppController
{
  //protected $layout = 'ingenieur';
  public function actionIndex()
  {    
    $all = SessionModel::getAll();
    $passed = SessionModel::getAllPassed();
    
    $this->setVar('sessions_futur',$all);
    $this->setVar('sessions_passed',$passed);
    $this->loadView('ingenieur/index');
  }
  public function actionSession()
  {
    $session = SessionModel::getSession($this->get['nom_c'],$this->get['date_deb_ses']);
    $participants = ParticipantModel::getBySession($this->get['nom_c'],$this->get['date_deb_ses']);
    
    $this->setVar('participants',$participants);
    $this->setVar('session',$session);
    
    $this->loadView('ingenieur/session');
  }
  public function actionAuth()
  {
    if ($this->_isPost) {
      if (IngenieurModel::login($this->post['login'],$this->post['password'])) {
        $user = IngenieurModel::getByLogin($this->post['login']);
        self::setAuthentified($user['no_employe'],'ingenieur');
        $this->redirect("/ingenieur/index");
      } else {
        $this->setLayoutVar('error',"Erreur, l'identifiant ou le mot de passe est incorrect.");
      }
    }
  }
}

?>
