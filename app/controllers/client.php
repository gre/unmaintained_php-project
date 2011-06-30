<?php

class ClientController extends AppController
{
	protected $_model = 'client';
	
  protected function beforeAction() {
    parent::beforeAction();
  }
  public function actionIndex()
  {
    $this->requireLogin();
    $this->redirect("/session/index");
  }
  public function actionAuth()
  {
    if (!$this->_isPost) {
      $this->loadView('client/auth');
      return;
    }
    if (!ClientModel::isConfirmed($this->post['login'])) {
        $this->setLayoutVar('error',"Erreur, l'utilisateur n'été pas confirmé.");
        $this->render();
        die();
    }
    if (ClientModel::login($this->post['login'],$this->post['password'])) {
        $user = ClientModel::getByLogin($this->post['login']);
        self::setAuthentified($user['code_client'],'client');
        $this->redirect("/session/index");
        die();
    }
    $this->setLayoutVar('error',"Erreur, l'identifiant ou le mot de passe sont incorrect.");
    $this->loadView('client/auth');
  }
  public function actionInscription()
  {
    if (!$this->_isPost) {
      $this->loadView('client/inscription');
      return;
    }
    $codeClient = ClientModel::register($this->post);
    if (!$codeClient) {
        $this->setLayoutVar('error',"Erreur, vérifier les données dans les champs.");
        $this->setVars($this->post);
        $this->loadView('client/inscription');
        return;
    }
    $this->loadView('client/inscriptionSent');
  }
  public function actionInscriptionSent()
  {
    $this->loadView('client/inscriptionSent');
  }
  public function actionInscriptionPending()
  {
    $this->loadView('client/inscriptionPending');
  }
  public function actionSession($sessionId)
  {
    if(is_null($sessionId))
      throw new Lvc_Exception("Forbidden."); // FIXME ? comment utiliser ?
    if($sessionId!=1 && $sessionId!=2 && $sessionId!=3)
      throw new Lvc_Exception("Session non trouv��e."); // FIXME ? comment utiliser ?
    $this->setVar('sessionId', $sessionId); // erf, DRY!
    $this->loadView('client/session'); // erf DRY!
  }
  public function actionProfile()
  {
    $this->loadView('client/profile');
  }
}

?>
