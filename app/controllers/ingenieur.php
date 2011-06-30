<?php

class IngenieurController extends AppController
{
  //protected $layout = 'ingenieur';
  public function actionIndex()
  {
    $this->loadView('ingenieur/index');
  }
  public function actionSession()
  {
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
        $this->setLayoutVar('error',"Erreur, l'identifiant ou le mot de passe sont incorrect.");
      }
    }
  }
}

?>
