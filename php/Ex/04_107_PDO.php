<?php

$db_host	= "localhost"; // host
$db_user	= "root"; // user
$db_pw		= "php504"; // password
$db_name	= "employees"; // DB name
$db_charset	= "utf8mb4"; // charset
$db_dns		= "mysql:host=".$db_host.";dbname=".$db_name.";charset=".$db_charset;

$db_options	= [
	// DB의 Prepared Statement 기능을 사용하도록 설정
	PDO::ATTR_EMULATE_PREPARES		=> false
	// PDO Exception을 Throws하도록 설정
	,PDO::ATTR_ERRMODE				=> PDO::ERRMODE_EXCEPTION
	// 연상배열로 Fetch를 하도록 설정
	,PDO::ATTR_DEFAULT_FETCH_MODE	=> PDO::FETCH_ASSOC 
];

// PDO Class로 DB 연동
$obj_conn = new PDO($db_dns, $db_user, $db_pw, $db_options);

// SQL 작성
$sql = " SELECT "
	." 		* "
	." FROM "
	." 		EMPLOYEES "
	." WHERE "
	." 		emp_no = :emp_no "
	;

// Prepared Statement 셋팅
$arr_ps = [
	":emp_no" => 10004
];

// Prepared Statement 생성
$stmt = $obj_conn->prepare($sql); 
$stmt->execute($arr_ps); // 쿼리 실행
$result = $stmt->fetchAll(); // 쿼리 결과를 fetch
print_r($result);