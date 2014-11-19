<?php

class testController extends BaseController 
{ 
	public function index() { }

    public function weekview()
    {
        $this->template->render('test/weekview');
    }
}