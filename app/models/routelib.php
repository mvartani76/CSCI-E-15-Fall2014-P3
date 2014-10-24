<?php

class RouteLib {
	
	// Properties

	private $data;
	private $rules;
	private $messages;

	// Methods
	public function setData($data){
		$this->data = $data;
	}

	public function getData(){
		return $this->data;
	}

	public function setRules($rules){
		$this->rules = $rules;
	}

	public function getRules(){
		return $this->rules;
	}

	public function setMessages($messages){
		$this->messages = $messages;
	}

	public function getMessages(){
		return $this->messages;
	}

}