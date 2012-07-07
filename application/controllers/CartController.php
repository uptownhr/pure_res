<?php

class CartController extends My_Controller {

    public function init(){
        parent::init();
    }

    public function indexAction(){
    	Jien::debug( $_SESSION['cart'] );
    }
    
    public function completeAction(){
    
    }
	
    public function addAction(){
    	$product_id = $this->params('product_id');
    	$qty = $this->params('qty');
    	$size = $this->params('size');
    	
    	if($size && $product_id && $qty){
    		$product = Jien::model('Product')->get($product_id)->row();
    		$size = Jien::model("ProductSize")->get($size)->row();
    		$_SESSION['cart'][] = array(
    			'product_id'=>$product_id,
    			'product_name'=>$product['name'],
    			'qty'=>$qty,
    			'size'=>$size['size'],
    			'product_size_id'=>$size['product_size_id'],
    			'product_size_price'=>$size['price']
    		);
    	}
    	$this->redir('/cart');
    }
    
    public function removeAction(){
    	$key = $this->params('key');
    	if( $key !== false ){
    		unset($_SESSION['cart'][$key]);
    	}
    	$this->redir('/cart');
    }
}
