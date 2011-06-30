<?php

class PageController extends AppController
{
  public function actionView($pageName = 'home')
  {
    if (strpos($pageName, '../') !== false) {
      throw new Lvc_Exception('File Not Found: ' . $sourceFile);
    }
    
    $this->loadView('page/' . basename($pageName));
  }
  
  public function actionHome()
  {
    if ($this->isLogged()) {
      switch($this->getUserType()) {
        case "admin":
          $this->redirect("/admin/");
          break;
        case "ingenieur":
          $this->redirect("/ingenieur/");
          break;
        case "client":
          $this->redirect("/client/");
          break;
      }
    }
    $this->render();
  }
}

?>
