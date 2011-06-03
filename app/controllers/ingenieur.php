<?php

class IngenieurController extends AppController
{
  //protected $layout = 'ingenieur';
  public function actionIndex()
  {
    $this->loadView('ingenieur/index');
  }
  public function actionAuth()
  {
    $this->loadView('ingenieur/auth');
  }
  public function actionSession()
  {
    $this->loadView('ingenieur/session');
  }
}

?>
