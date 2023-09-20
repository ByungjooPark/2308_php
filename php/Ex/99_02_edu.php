<?php


// // 함수 선언 : 함수를 만들어두는 것
// function my_sum($num1, $num2) {
// 	$sum = $num1 + $num2;
// 	return $sum;
// }

// // 함수 호출 : 미리 만들어둔 함수를 부르는 것
// $result = my_sum(2, 5);

// echo $result;


// function my_sum($num1, $num2) {
// 	$sum = $num1 + $num2;
// 	echo $sum;
// 	return true;
// }
// $num1 = 2;
// $num2 = 5;
// $result = my_sum($num1, $num2);
// if(!$result) {
// 	echo "ERROR";
// }

// -----------
// 3개의 숫자를 빼기하는 함수를 만들어 주세요.
// function my_sub($a, $b, $c) {
// 	return $a - $b - $c;
// }

// echo my_sub(5, 4, 6);


// 가변파라미터
function my_all_sum(...$numbers) {
	// print_r($numbers);
	$sum = 0;
	foreach($numbers as $key => $val) {
		$sum = $sum + $val;
	}
	return $sum;
	// return array_sum($numbers);
}

// echo my_all_sum(2, 4, 5);


// 레퍼런스 파라미터
function my_ref( $val ) {
	$val = "my_ref";
}
function my_ref2(&$ref) {
	$ref = "my_ref";
}

$str1 = "str1";
$str2 = "str2";

my_ref($str1);
my_ref2($str2);

echo "str1 : {$str1}\n";
echo "str2 : {$str2}\n";


print_r(true);
echo "\n";
var_dump(true);