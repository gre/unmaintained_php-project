<?php

class AdminController extends AppController
{
  protected $_model = 'client';
  // protected $layout = 'admin';
  
  public function _isAdmin() {
    return isset($_SESSION['isAdmin']);
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
      $_SESSION['isAdmin'] = 1;
      $this->redirect('/admin/index');
      die();
    }
    $this->loadView('admin/auth');
  }
  
  public function actionClientStatus() {
    $this->_requireAdmin();
    if (!$this->_isPost) throw new Lvc_Exception('Post required');
    ClientModel::setConfirm($this->post['clientId'],$this->post['action']=='valid');
    $this->redirect('/admin/index');
  }
}

?>
