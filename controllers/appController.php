<?php

class appController extends BaseController 
{ 
  public function index() {
    $this->template->render('app/index');
  }

  public function weekview()
  {
    header('Location: /cockamamei/app');
  }
}

?>
