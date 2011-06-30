<?php

class AdminController extends AppController
{
  // protected $layout = 'admin';
  
  public function _isAdmin() {
    return $this->isLogged() && $this->getUserType() == "admin";
  }
  public function _requireAdmin() {
    if (!$this->_isAdmin()) {
        $this->redirect("/admin/auth");
        exit();
    }
  }
  public function actionIndex()
  {
    $this->_requireAdmin();
    $this->setVar('unconfirmedUsers',ClientModel::getUsersForConfirmation());
    $this->setVar('lastUsers',ClientModel::getLastUsers());
    $this->loadView('admin/index');
  }
  public function actionAuth()
  {
    if ($this->_isPost) {
      if (AdminModel::login($this->post['login'],$this->post['password'])) {
        $user = AdminModel::getByLogin($this->post['login']);
        self::setAuthentified($user['no_admin'],'admin');
        $this->redirect("/admin/index");
        die();
      } else {
        $this->setLayoutVar('error',"Erreur, l'identifiant ou le mot de passe est incorrect.");
      }
    }
  }
  
  public function actionClientStatus() {
    $this->_requireAdmin();
    if (!$this->_isPost) throw new Lvc_Exception('Post required');
    ClientModel::setConfirm($this->post['clientId'],$this->post['action']=='valid');
    $this->redirect('/admin/index');
  }
}

?>
