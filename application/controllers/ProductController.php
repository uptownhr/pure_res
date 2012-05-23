<?php

// created by some guy on the web, ugly code but atleast it works
// will have to re-factor this from the ground up

class ProductController extends My_Controller {

    public function init() {
    	parent::init();
    	if(!$this->params('id')){
    		$this->redir('/page/products');
    	}else{
    		$this->_forward('index');
    	}
    }

    public function indexAction() {
    	$this->view->product = Jien::model('Product')->get($this->params('id'));
    }

}

