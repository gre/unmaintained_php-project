<?php

class AdminController extends AppController
{
	// protected $layout = 'admin';
  public function actionIndex()
	{
		$this->loadView('admin/index');
	}
}

?>
