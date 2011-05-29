<?php

class IngenieurController extends AppController
{
	//protected $layout = 'ingenieur';
  public function actionIndex()
	{
		$this->loadView('ingenieur/index');
	}
}

?>
