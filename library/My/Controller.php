<?php

class My_Controller extends Jien_Controller {

    public function init(){
    	parent::init();

    	// if it doesn't exist, it will use the default
    	$theme = THEME;
    	$this->view->addScriptPath(APPLICATION_PATH.'/views/'.$theme.'/');
    	$this->layout('site');
    	$params = $this->params();
    	switch($params['controller']){
    		case 'index': $this->view->page = 'home';break;
    		case 'blog': $this->view->page = 'blog';break;
    		case 'page': $this->view->page = $params['action'];break;
    	}
    	
    	// set title
    	$this->view->title = TITLE;

    	// increase counter
    	Jien::model("Hit")->save(array(
    		"user_id"	=>	!empty($_SESSION['user']['user_id']) ? $_SESSION['user']['user_id'] : 0,
    		"ip"	=>	$_SERVER['REMOTE_ADDR'],
    		"page"	=>	$_SERVER['REQUEST_URI'],
    		"request_method"	=>	$_SERVER['REQUEST_METHOD'],
    	));

    }
	public function isPost(){
    	if( $this->_request->getMethod() == "POST" ){
    		return true;
    	}else{
    		return false;
    	}
    }

}
