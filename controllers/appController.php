<?php

class appController extends BaseController 
{ 
  public function index() {
    $this->template->render('app/weekview');
  }

  public function weekview()
  {
    $this->template->render('app/weekview');
  }
}
