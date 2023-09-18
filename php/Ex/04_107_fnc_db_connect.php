<?php
// ********************************
// 파일명 	: 04_107_fnc_db_connect.php
// 기능		: DB 연동 관련 함수
// 버전		: v001 new Park.bj 230918
//			  v002 dbconn 설정 변경 Park.bj 230919
// ********************************

// ---------------------------------
// 함수명   : my_db_conn
// 기능     : DB Connect
// 파라미터 : PDO   &$conn
// 리턴     : 없음
// ---------------------------------
function my_db_conn( &$conn ) {
	$db_host	= "localhost"; // host
	$db_user	= "root"; // user
	$db_pw		= "php504"; // password
	$db_name	= "employees"; // DB name
	$db_charset	= "utf8mb4"; // charset
	$db_dns		= "mysql:host=".$db_host.";dbname=".$db_name.";charset=".$db_charset;

	$db_options	= [
		PDO::ATTR_EMULATE_PREPARES		=> false // DB의 Prepared Statement 기능을 사용하도록 설정
		,PDO::ATTR_ERRMODE				=> PDO::ERRMODE_EXCEPTION // PDO Exception을 Throws하도록 설정
		,PDO::ATTR_DEFAULT_FETCH_MODE	=> PDO::FETCH_ASSOC // 연상배열로 Fetch를 하도록 설정
	];

	// PDO Class로 DB 연동
	$conn = new PDO($db_dns, $db_user, $db_pw, $db_options);
}

// ---------------------------------
// 함수명   : db_destroy_conn
// 기능     : DB Destroy
// 파라미터 : PDO   &$conn
// 리턴     : 없음
// ---------------------------------
function db_destroy_conn(&$conn) {
	$conn = null;
}