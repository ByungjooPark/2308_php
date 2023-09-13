<?php
// 몇개일지 모르는 숫자를 다 더해주는 함수를 만들어주세요.
function my_all_sum(...$items){
	$sum = 0;
	foreach($items as $key => $item) {
		$sum += $item;
	}
	return $sum;
}

// $sum = my_all_sum(1, 2, 3, 4, 5);
// echo $sum;

// 숫자로 이루어진 문자열을 하나 받습니다.
// 이 문자열의 모든 숫자를 더해주세요.
// 예) "3421"일경우, 3+4+2+1해서 10이 리턴 되는 함수

$str = "34215";
function my_test(string $str) {
	// 문자열을 하나씩 잘라서 더하는 방법
	// $len = mb_strlen($str);
	// for($idx = 0; $idx <= $len - 1; $idx++) {
	// 	$sum += (int)mb_substr($str, $idx, 1);	
	// }

	// 문자열을 배열로 만든 후 처리 하는 방법
	// $arr = str_split($str);
	// $sum = 0;
	// foreach($arr as $val) {
	// 	$sum += $val;
	// }

	// php 함수 이용해서 배열의 값을 다 더하는 방법
	return array_sum($arr);
}

echo my_test($str);
