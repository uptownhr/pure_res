<?php

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
	    $id = $this->params('id');
    	$this->view->product = Jien::model('Product')->get($id);
    	$this->view->product_sizes = Jien::model('ProductSize')->where("product_id=$id")->get()->rows();
    	$this->view->product_images = Jien::model('ProductImage')->where("product_id=$id")->get()->rows();
    }

}

