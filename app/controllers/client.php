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
    
    if (!ClientModel::getByLogin($this->post['login'])) {
    	$this->setLayoutVar('error',"Erreur, l'identifiant est incorrect.");
    	$this->render();
    }
    if (!ClientModel::isConfirmed($this->post['login'])) {
        $this->setLayoutVar('error',"Erreur, l'utilisateur n'est pas confirmé.");
        $this->render();
    }
    if (ClientModel::login($this->post['login'],$this->post['password'])) {
        $user = ClientModel::getByLogin($this->post['login']);
        self::setAuthentified($user['code_client'],'client');
        $this->redirect("/session/index");
        die();
    }
    $this->setLayoutVar('error',"Erreur, l'identifiant ou le mot de passe est incorrect.");
    $this->render();
  }
  public function actionInscription()
  {
    if (!$this->_isPost) {
      $this->loadView('client/inscription');
      return;
    }
    $error = false;
    $codeClient = null;
    
    // Tout les champs sont requis
    foreach($this->post AS $post_element) {
    	if (empty($post_element))
    		$error = true;
    }
    
    // Validation
    if (strlen($this->post['postal_code']) != 5 || !is_numeric($this->post['postal_code'])) {
    	$error = "Code postal incorrect";
    }
    
    $this->setVars($this->post);
    
    if (ClientModel::getByLogin($this->post['login'])) {
        $this->setLayoutVar('error',"Erreur, cet identifiant est déjà utilisé.");
        $this->render();
    }
	
	if ($error == false) 
    	$codeClient = ClientModel::register($this->post);
    
    if (!$codeClient || $error) {
        $this->setLayoutVar('error',($error===true?"Erreur, vérifier les champs.":$error));
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
      throw new Lvc_Exception("Session introuvable."); // FIXME ? comment utiliser ?
    $this->setVar('sessionId', $sessionId); // erf, DRY!
    $this->loadView('client/session'); // erf DRY!
  }
  public function actionProfile()
  {
    $this->loadView('client/profile');
  }
}

?>
