<?php

// created by some guy on the web, ugly code but atleast it works
// will have to re-factor this from the ground up

class UserController extends My_Controller {

    public function init() {
    	parent::init();
    }

    public function indexAction() {
    }

    public function loginAction() {
    }

    public function logoutAction() {
        $this->auth->clearIdentity();
        $_SESSION = array();
        $this->flash('You were logged out');
        $this->redir('/');
    }

}

