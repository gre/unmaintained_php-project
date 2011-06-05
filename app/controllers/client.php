<?php

class ClientController extends AppController
{
  // protected $layout = 'client';
  public function actionIndex()
  {
    $this->loadView('client/index');
  }
  public function actionAuth()
  {
    $this->loadView('client/auth');
  }
  public function actionInscription()
  {
    $this->loadView('client/inscription');
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
      throw new Lvc_Exception("Session non trouvée."); // FIXME ? comment utiliser ?
    $this->setVar('sessionId', $sessionId); // erf, DRY!
    $this->loadView('client/session'); // erf DRY!
  }
  public function actionProfile()
  {
    $this->loadView('client/profile');
  }
}

?>
