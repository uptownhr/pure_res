<?php
class Jien_View_Helper_Editable {

	public $view;

	public function setView(Zend_View_Interface $view){
        $this->view = $view;
    }

	public function editable($name, $type, $default = ''){
		$class = '';
		$content = $default;
		$data = Jien::model("Editable")->where("name = '{$name}'")->get()->row();
		if(!empty($data)){
			$content = $data['content'];
		}

		// need to use zend acl instead
		if(!empty($_SESSION['user']['role']) && ($_SESSION['user']['role'] == 'moderator' || $_SESSION['user']['role'] == 'admin')){
			$class = 'editable';
		}
		$html = "<div id='editable_{$name}' class='{$class}' rel='{$type}'>";
		if($class == 'editable'){
			$html .= "<div class='editable_menu'>
						<span class='editable_state_1 editable_state'>
							<a href='#' class='editable_trig_edit'>Edit</a>
						</span>
						<span class='editable_state_2 editable_state editable_hide'>
							<a href='#' class='editable_trig_save'>Save</a>
							<a href='#' class='editable_trig_cancel'>Cancel</a>
						</span>
					</div>";
		}
		$html .= "	<div class='editable_content'>{$content}</div>
				</div>";
		return $html;
	}

}
