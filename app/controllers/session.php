<?php

class SessionController extends AppController
{
    protected function actionBefore() {
        parent::beforeAction();
        include(APP_PATH.'models/client.php');
    }
    
    public function actionIndex() {
        //SessionModel::getMySession();
        $this->loadView('session/index');
    }
    
    public function actionCreate() {
        //SessionModel::create();
        
    }
}