<?php

  class AppController extends Lvc_PageController
{
	protected $layout = 'default';
	protected $dbconn;
	protected $isPost = false;
    // protected $_model to load; from models/NAME.php, example protected $_model =
	
	protected function beforeAction() {
	  $this->setLayoutVar('pageTitle', 'Untitled');
	  $this->requireCss('reset.css');
	  $this->requireCss('master.css');
	  $this->requireJs('jquery-1.6.1.min.js');
	  // Connection database
	  $this->dbconn = pg_connect("host=".DB_HOST." port=".DB_PORT." dbname=".DB_NAME." user=".DB_USER." password=".DB_PASS);
	  if (!$this->dbconn) 
	  {
		  throw new Lvc_Exception("Database connection error. Details: ".pg_last_error());
	  }
	  $this->_isPost = count($_POST)>0;
	  
	  if (session_id() == "")
	  	session_start();
	  	
	  $this->_loadRequiredModels();
          
          /**
          * Logged for view Layout
          */
          $this->setLayoutVar('connected',$this->isLogged());
          
          if ($this->isLogged()) {
            $this->setLayoutVar('full_name',$this->getFullName());
          }
          
          // Jobs
          // include(APP_PATH . 'jobs/importdb.php');
        }
	
        protected function getFullName() {
          return $this->userSpecificCall("getFullName",$this->getLoggedUserId());
        }
        
        protected function userSpecificCall($method,$arg1) {
          switch($_SESSION['user_type']) {
            case 'client':
              return ClientModel::$method($arg1);
            case 'ingenieur':
              return IngenieurModel::$method($arg1);
            case 'admin':
              return AdminModel::$method($arg1);
          }
        }
        
        protected function isLogged() {
            return isset($_SESSION['user']);
        }
        
        protected function getLoggedUserId() {
          return $_SESSION['user'];
        }
        
        protected function getUserType() {
          return $_SESSION['user_type'];
        }        
        
        protected function getLoggedUser() {
          if (!isLogged()) return false;
          
          $id = $this->getLoggedUserId();
          
          return $this->userSpecificCall("getById",$id);
        }
        
        protected function setAuthentified($user_id,$user_type) {
          $_SESSION['user'] = $user_id;
          $_SESSION['user_type'] = $user_type;
        }
        
        protected function logout() {
          session_destroy();
        }
        
        public function actionLogout() {
          $this->logout();
          $this->redirect("/");
          die();
        }
        
        protected function requireLogin() {
            if (!$this->isLogged()) {
                $this->redirect("/client/auth");
                exit();
            }
        }
        
        protected function _loadRequiredModels() {
            if (!isset($this->_model)) {
                return;
            }
            $models = $this->_model;
            if (!is_array($this->_model)) $models = array($this->_model);
            
            foreach($models AS $model) {
	            $file = APP_PATH.'models/'.$model.'Model.php';
	            if (!file_exists($file)) {
	                new Lvc_Exception("Controller _model not found. Details: ".$file);
	            }
	            include($file);
	        }
        }
        
	public function requireCss($cssFile)
	{
		$this->layoutVars['requiredCss'][$cssFile] = true;
	}
	
	public function requireJs($jsFile)
	{
		$this->layoutVars['requiredJs'][$jsFile] = true;
	}

        
    public function render() {
        $this->loadView($this->getControllerName().'/'.$this->getActionName());
        exit();
    }
}

?>