<?php
namespace router;

// 사용할 컨트롤러들 지정
use controller\UserController;
use controller\BoardController;

// 라우터 : 유저의 요청을 분석해서 해당 Controller로 연결해주는 클래스
class Router {
	public function __construct() {
		// URL 규칙
		// 1. 회원 정보 관련 URL
		//		user/[해당기능]
		//		ex) 로그인 : 호스트/user/login
		//		ex) 회원가입 : 호스트/user/regist
		// 2. 게시판 관련 URL
		//		board/[해당기능]
		//		ex) 리스트 : 호스트/board/list
		//		ex) 수정 : 호스트/board/edit

		$url = $_GET["url"]; // 접속 url 획득
		$method = $_SERVER["REQUEST_METHOD"]; // 메소드 획득

		if($url === "user/login") {
			if($method === "GET") {
				// 해당 컨트롤러 호출
				new UserController("loginGet");
			} else {
				// 해당 컨트롤러 호출
				new UserController("loginPost");
			}
		} else if($url === "user/logout") {
			if($method === "GET") {
				// 해당 컨트롤러 호출
				new UserController("logoutGet");
			}
		} else if($url === "user/regist") {
			if($method === "GET") {
				new UserController("registGet");
			} else {
				new UserController("registPost");
			}
		} else if($url === "user/idchk"){
			if($method === "POST") {
				new UserController("idChkPost");
			}
		} else if($url === "board/list") {
			if($method === "GET") {
				new BoardController("listGet");
			}
		} else if($url === "board/add") {
			if($method === "GET") {
				// 처리없음
			} else {
				new BoardController("addPost");
			}
		} else if($url === "board/detail") {
			if($method === "GET") {
				new BoardController("detailGet");
			}
		}

		// 없는 경로일 경우
		echo "이상한 URL : ".$url;
		exit();
	}
}