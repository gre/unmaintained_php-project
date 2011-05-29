<?php

class ClientController extends AppController
{
	// protected $layout = 'client';
  public function actionIndex()
	{
		$this->loadView('client/index');
	}
}

?>
