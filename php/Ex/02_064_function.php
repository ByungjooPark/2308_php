<?php

// // 두 숫자를 받아서 더해주는 함수를 만들어봅시다.
// // 리턴이 없는 함수
// function my_sum($a, $b) {
// 	echo $a - $b;
// }
// // my_sum(5, 4);

// // 리턴이 있는 함수
// function my_sum2($a, $b) {
// 	return $a + $b;
// }

// $reslt = my_sum2(2, 2);
// // echo $reslt;

// // 두수를 받아서 - * / %를 리턴하는 함수를 만들어 주세요.
// function my_sub($a, $b) {
// 	return $a - $b;
// }
// function my_mul($a, $b) {
// 	return $a * $b;
// }
// function my_div($a, $b) {
// 	return $a / $b;
// }
// function my_remain($a, $b) {
// 	return $a % $b;
// }


// // 파라미터의 기본값이 설정되어 있는 함수
// function my_sum3($a, $b = 5, $c = 2) {
// 	return $a + $b + $c;
// }

// // echo my_sum3(2);

// // 가변 파라미터
// // php-5.6 이상 가능
// // function my_args_param(...$items) {
// // 	print_r($items);
// // }
// // php-5.5 이하에서 사용방법
// // function my_args_param() {
// // 	$items = func_get_args();
// // 	print_r($items);
// // }
// // my_args_param("a", "b", "c");


// // 재귀 함수
// // 1+2+3+......+10000
// function my_ap($i) {
// 	$sum = 1;
// 	for($i; $i > 0; $i--) {
// 		$sum *= $i;
// 	}
// 	return $sum;
// }

// // echo my_ap(10000);
// function my_recursion($i) {
// 	if($i <= 0 ) {
// 		return 0;
// 	}
// 	return $i + my_recursion($i - 1);
// }

// // echo my_recursion(2);

// 레퍼런스 파라미터
function test1( $str ) {
	$str = "함수 test1";
	return $str;
}
// $str = "???";
// $result = test1( $str );
// echo $str, "\n";
// echo $result, "\n";
function test2( &$a ) {
	$a = "함수 test2";
	return $a;
}
$str = "???";
$result = test2( $str );
echo $str, "\n";
echo $result;