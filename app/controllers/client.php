<?php

class ClientController extends AppController
{
  protected function beforeAction() {
    parent::beforeAction();
    include(APP_PATH.'models/client.php');
  }
  public function actionIndex()
  {
    $this->requireLogin();
    $this->loadView('client/index');
  }
  public function actionAuth()
  {
    if (!$this->_isPost) {
      $this->loadView('client/auth');
      return;
    }
    if (!ClientModel::isConfirmed($this->post['login'])) {
        $this->setVar('error',"Erreur, l'utilisateur n'ete pas confirme.");
        $this->render();
    }
    if (ClientModel::login($this->post['login'],$this->post['password'])) {
        $user = ClientModel::getByLogin($this->post['login']);
        $_SESSION['user'] = $user['code_client'];
        $this->redirect("/session/index");
        die();
    }
    $this->setVar('error',"Erreur, l'identifiant ou le mot de passe sont incorrect.");
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
        $this->setVar('error',true);
        var_dump($this->post);
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
