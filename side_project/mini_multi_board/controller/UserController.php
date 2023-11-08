<?php

namespace controller;

use model\UserModel;
use lib\Validation;

class UserController extends ParentsController {
	// 로그인 페이지 이동
	protected function loginGet() {
		return "view/login.php";
	}

	// 로그인 처리
	protected function loginPost() {
		$inputData = [
			"u_id" => $_POST["u_id"]
			,"u_pw" => $_POST["u_pw"]
		];

		// 유효성 체크
		if(!Validation::userChk($inputData)) {
			$this->arrErrorMsg = Validation::getArrErrorMsg();
			return "view/login.php";
		}

		// ID, PW 설정(DB에서 사용할 데이터 가공)
		$arrInput = [];
		$arrInput["u_id"] = $_POST["u_id"];
		$arrInput["u_pw"] = $this->encryptionPassword($_POST["u_pw"]);

		// 유저정보 획득
		$modelUser = new UserModel();
		$resultUserInfo = $modelUser->getUserInfo($arrInput, true);

		// 유저 유무 체크
		if(count($resultUserInfo) === 0) {
			$this->arrErrorMsg[] = "아이디와 비밀번호를 다시 확인해 주세요.";
			// 로그인 페이지로 리턴
			return "view/login.php";
		}

		// 세션에 u_id 저장
		$_SESSION["u_pk"] = $resultUserInfo[0]["id"];

		return "Location: /board/list?b_type=0";
	}

	// 로그아웃 처리
	protected function logoutGet() {
		session_unset(); 
		session_destroy();

		// 로그인 페이지 리턴
		return "Location: /user/login";
	}

	// 회원가입 페이지 이동
	protected function registGet() {
		return "view/regist"._EXTENSION_PHP;
	}

	// 회원가입 처리
	protected function registPost() {
		$inputData = [
			"u_id" => $_POST["u_id"]
			,"u_pw" => $_POST["u_pw"]
			,"u_pw_chk" => $_POST["u_pw_chk"]
			,"u_name" => $_POST["u_name"]
		];

		$arrAddUserInfo = [
			"u_id" => $_POST["u_id"]
			,"u_pw" => $this->encryptionPassword($_POST["u_pw"])
			,"u_name" => $_POST["u_name"]
		];

		// 유효성 체크
		if(!Validation::userChk($inputData)) {
			$this->arrErrorMsg = Validation::getArrErrorMsg();
			return "view/regist.php";
		}
		
		// TODO : 아이디 중복 체크 필요



		// 인서트 처리
		$userModel = new UserModel();
		$userModel->beginTransaction();
		$result = $userModel->addUserInfo($arrAddUserInfo);

		if($result !== true) {
			$userModel->rollBack();
		} else {
			$userModel->commit();
		}
		$userModel->destroy();

		return "Location: /user/login";
	}

	protected function idChkPost() {
		$errorFlg = "0";
		$errorMsg = "";
		$inputData = [
			"u_id" => $_POST["u_id"]
		];

		// 유효성 체크
		if(!Validation::userChk($inputData)) {
			$errorFlg = "1";
			$errorMsg = Validation::getArrErrorMsg()[0];
		}

		// 중복 체크
		$userModel = new UserModel();
		$result = $userModel->getUserInfo($inputData);
		$userModel->destroy();

		if(count($result) > 0) {
			$errorFlg = "1";
			$errorMsg = "중복된 아이디입니다.";
		}
				
		// response 처리
		$response = [
			"errflg" => $errorFlg
			,"msg" => $errorMsg
		];

		header('Content-type: application/json');
		echo json_encode($response);
		exit();
	}



	// 비밀번호 암호화
	private function encryptionPassword($pw) {
		return base64_encode($pw);
	}
}