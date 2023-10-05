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
// 리턴     : boolen
// ---------------------------------
function my_db_conn( &$conn ) {
	$db_host	= "localhost"; // host
	$db_user	= "root"; // user
	$db_pw		= "php504"; // password
	$db_name	= "mini_board"; // DB name
	$db_charset	= "utf8mb4"; // charset
	$db_dns		= "mysql:host=".$db_host.";dbname=".$db_name.";charset=".$db_charset;

	try {
		$db_options	= [
			PDO::ATTR_EMULATE_PREPARES		=> false // DB의 Prepared Statement 기능을 사용하도록 설정
			,PDO::ATTR_ERRMODE				=> PDO::ERRMODE_EXCEPTION // PDO Exception을 Throws하도록 설정
			,PDO::ATTR_DEFAULT_FETCH_MODE	=> PDO::FETCH_ASSOC // 연상배열로 Fetch를 하도록 설정
		];

		// PDO Class로 DB 연동
		$conn = new PDO($db_dns, $db_user, $db_pw, $db_options);
		return true;
	} catch (Exception $e) {
		echo $e->getMessage(); // Exception 메세지 출력
		$conn = null; // DB 파기
		return false;
	}
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

// ---------------------------------
// 함수명   : db_select_boards_paging
// 기능     : boards paging 조회
// 파라미터 : PDO		&$conn
//			 Array		&$arr_param 쿼리 작성용 배열
// 리턴     : Array / false
// ---------------------------------
function db_select_boards_paging(&$conn, &$arr_param) {
	try {
		$sql = 
		" SELECT "
		."		id "
		."		,title "
		."		,create_at "
		." FROM "
		." 		boards "
		." WHERE "
		." 		delete_flg = '0' "
		." ORDER BY "
		." 		id DESC "
		." LIMIT :list_cnt OFFSET :offset "
		;

		$arr_ps = [
			":list_cnt" => $arr_param["list_cnt"]
			,":offset" => $arr_param["offset"]
		];
		
		$stmt = $conn->prepare($sql);
		$stmt->execute($arr_ps);
		$result = $stmt->fetchAll();
		return $result; // 정상 : 쿼리 결과 리턴
	} catch(Exception $e) {
		echo $e->getMessage(); // Exception 메세지 출력
		return false; // 예외발생 : flase 리턴
	}
}

// ---------------------------------
// 함수명   : db_select_boards_cnt
// 기능     : boards count 조회
// 파라미터 : PDO		&$conn
// 리턴     : Int / false
// ---------------------------------
function db_select_boards_cnt(&$conn) {
	$sql =
		" SELECT "
		."		COUNT(id) as cnt "
		." FROM "
		."		boards "
		." WHERE "
		." 		delete_flg = '0' "
		;
	
		try {
			$stmt = $conn->query($sql);
			$result = $stmt->fetchAll();

			return (int)$result[0]["cnt"]; // 정상 : 쿼리 결과 리턴
		} catch(Exception $e) {
			echo $e->getMessage(); // Exception 메세지 출력
			return false; // 예외발생 : flase 리턴
		}
}

// ---------------------------------
// 함수명   : db_insert_boards
// 기능     : boards 레코드 작성
// 파라미터 : PDO		&$conn
//			 Array		&$arr_param 쿼리 작성용 배열
// 리턴     : Boolean
// ---------------------------------
function db_insert_boards(&$conn, &$arr_param) {
	$sql =
		" INSERT INTO boards ( "
		."		title "
		."		,content "
		." ) "
		." VALUES ( "
		."		:title "
		."		,:content "
		." ) "
		;
	$arr_ps = [
		":title" => $arr_param["title"]
		,":content" => $arr_param["content"]
	];

	try {
		$stmt = $conn->prepare($sql);
		$result = $stmt->execute($arr_ps);
		return $result; //  // 정상 : 쿼리 결과 리턴
	} catch(Exception $e) {
		echo $e->getMessage(); // Exception 메세지 출력
		return false; // 예외발생 : flase 리턴
	}
}

// ---------------------------------
// 함수명   : db_select_boards_id
// 기능     : boards 레코드 작성
// 파라미터 : PDO		&$conn
//			 Array		&$arr_param 쿼리 작성용 배열
// 리턴     : Array / false
// ---------------------------------
function db_select_boards_id(&$conn, &$arr_param) {
	$sql =
		" SELECT "
		."		id "
		."		,title "
		."		,content "
		."		,create_at "
		." FROM "
		."		boards "
		." WHERE "
		."		id = :id "
		."   AND "
		." 		delete_flg = '0' "
		;
	$arr_ps = [
		":id" => $arr_param["id"]
	];

	try {
		$stmt = $conn->prepare($sql);
		$stmt->execute($arr_ps);
		$result = $stmt->fetchAll();
		return $result;
	} catch(Exception $e) {
		echo $e->getMessage(); // Exception 메세지 출력
		return false; // 예외발생 : flase 리턴
	} 
}

// ---------------------------------
// 함수명   : db_update_boards_id
// 기능     : boards 레코드 수정
// 파라미터 : PDO		&$conn
//			 Array		&$arr_param 쿼리 작성용 배열
// 리턴     : boolean
// ---------------------------------
function db_update_boards_id(&$conn, &$arr_param) {
	$sql =
		" UPDATE "
		."		boards "
		." SET "
		." 		title = :title "
		."		,content = :content "
		." WHERE "
		."		id = :id "
		;
	$arr_ps = [
		":title" => $arr_param["title"]
		,":content" => $arr_param["content"]
		,":id" => $arr_param["id"]
	];

	try {
		$stmt = $conn->prepare($sql);
		$result = $stmt->execute($arr_ps);
		return $result;
	} catch(Exception $e) {
		echo $e->getMessage(); // Exception 메세지 출력
		return false; // 예외발생 : false 리턴
	}
}

// ---------------------------------
// 함수명   : db_delete_boards_id
// 기능     : 특정 ID의 레코드 삭제처리
// 파라미터 : PDO		&$conn
//			 Array		&$arr_param
// 리턴     : boolean
// ---------------------------------
function db_delete_boards_id(&$conn, &$arr_param) {
	// 1. sql 작성 (UPDATE)
	$sql =
	" UPDATE boards	"
	." SET "
	." 		delete_at = now() "
	." 		,delete_flg = '1' "
	." WHERE "
	." 		id = :id "
	;

	$arr_ps = [
		":id" => $arr_param["id"]
	];

	try {
		// 2. Query 실행
		$stmt = $conn->prepare($sql);
		$result = $stmt->execute($arr_ps);
		return $result; // 정상종료 : true 리턴
	} catch(Exception $e) {
		echo $e->getMessage(); // Exception 메세지 출력
		return false; // 예외발생 : false 리턴
	}
}


?>