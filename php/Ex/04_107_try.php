<?php
require_once("./04_107_fnc_db_connect.php");

// try-catch문 : 예외처리를 하기위한 문법
// try {
// 	// 우리가 실행하고 싶은 소스코드를 작성
// } catch( Exception $e ) {
// 	// 예외가 발생 했을 때 실행되는 소스코드를 작성
// } finally {
// 	// 정상처리 또는 예외처리에 관계 없이 무조건 실행되는 소스코드를 작성
// }
$conn = null;
try {
	echo "트라이";
	my_db_conn($conn);
	// // SQL 작성
	$sql = " SELEC * FROM EMPLOYEES WHERE emp_no = :emp_no ";
	// Prepared Statement 셋팅
	$arr_ps = [
		":emp_no" => 10004
	];
	$stmt = $conn->prepare($sql);
	$stmt->execute($arr_ps);
	$result = $stmt->fetchAll();
} catch( Exception $e ) {
	// 예외가 발생 했을 때 실행되는 소스코드를 작성
	echo "예외 발생 : {$e->getMessage()}";
} finally {
	// db 파기
	db_destroy_conn($conn);
	echo "파이널리";
}