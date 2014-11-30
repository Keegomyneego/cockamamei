<?php

class appController extends BaseController 
{ 
  public function index() {
    header('Location: /cockamamei/app/weekview');
  }

  public function weekview()
  {
    $this->template->render('app/weekview');
  }
}

?>
