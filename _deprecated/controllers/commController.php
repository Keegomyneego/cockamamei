<?php

class commController extends BaseController 
{ 
	public function index() {

    }

    public function notify()
    {
        $this->template->render('comm/notify');
    }
}