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
  public function actionSession()
  {
    $this->loadView('client/session');
  }
  public function actionEditParticipant()
  {
    $this->loadView('client/editParticipant');
  }
}

?>
