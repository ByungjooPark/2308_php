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
	$len = mb_strlen($str);
	$sum = 0;
	for($idx = 0; $idx <= $len - 1; $idx++) {
		$sum += (int)mb_substr($str, $idx, 1);	
	}
	return $sum;
}
echo my_test($str);
