<?php
// 동적쿼리 : 필요 또는 상황에 따라 쿼리를 자동으로 작성해주는 기법

// 요소의 수가 동적으로 변하는 배열
$arr_param = [
	"title" => "제목"
	,"content" => "내용"
];

// 기본 쿼리
$sql =
	" SELECT "
	."		COUNT(id) as cnt "
	." FROM "
	."		boards "
	." WHERE "
	." 		delete_flg = '0' "
	;
$where = ""; // where절 저장용 변수

// 배열의 길이만큼 where절에 쿼리 추가
foreach($arr_param as $key => $val) {
	$where .= " AND ".$key . " like '%" . $val . "%' ";
}

$str = strlen($where) >= 1 ? $where : "";
echo $sql.$str;