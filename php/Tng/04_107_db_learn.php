<?php
// 1. db_conn 이라는 함수를 만들어주세요.
//		1-1. 기능 : db설정 및 pdo객체 생성
// 2. 현재 급여가 80,000이상인 사원을 조회하기
// 3. 조회한 데이터를 루프하면서 급여가 100,000이상인 사원 번호 출력해주세요.

function db_conn(&$result) {
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
	$result = new PDO($db_dns, $db_user, $db_pw, $db_options);
}

$conn = null;
db_conn($conn);

$sql =" SELECT "
	." 		salary "
	."		,emp_no "
	." FROM "
	."		salaries "
	." WHERE "
	."		to_date >= now() "
	."	AND salary >= :salary "
	;
$arr_ps = [
	":salary" => 80000
];
$stmt = $conn->prepare($sql);
$stmt->execute($arr_ps);
$result = $stmt->fetchAll();
$cnt = 0;
foreach($result as $item) {
	if( $item["salary"] >= 100000 ) {
		echo $item["emp_no"]."\n";
		$cnt++;
	}
}
echo $cnt;