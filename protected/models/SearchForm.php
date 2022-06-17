<?php

class SearchForm extends CFormModel
{
	public $search; 
	public $rememberMe = false;


	public function rules() {
		return array(
			array('search', 'required')
		); 
	}
}