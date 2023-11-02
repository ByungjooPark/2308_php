<?php

namespace controller;

class ParentsController {
	protected $controllerChkUrl;

	public function __construct($action) {
		// 뷰관려 체크 접속 url 셋팅
		$this->controllerChkUrl = $_GET["url"];

		// controller 메소드 호출
		$resultAction = $this->$action();

		// view 호출
		require_once($resultAction);
		exit();
	}
}