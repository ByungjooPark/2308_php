<?php

// echo "tt";

// php 데이터 타입
$num = 1;
$str = "asd";
$arr = [1, 2, 3, 4];
$boo = true;
$double = 2.34;

// 산술 연산자
// 1 + 1;
// 1 - 1;
// 1 * 1;
// 1 / 1;
// 1 % 1;

// 증가/증감 연산자
// 1++;
// 1--;
// $num = 1;
// echo $num++;
// echo "\n";
// echo $num;

// 산술 대입 연산자
// $num = 1;
// $num = $num + 2;
// $num += 2;
// echo $num;

// 비교 연산자
// 1 === "1"; // 결과 false
// 1 == "1"; // 결과 true

// 논리 연산자
// && || !
// $bool = true;
// if(!(!( 1 === 1 ))) {
// 	echo "참참참";
// }

// () : 조건
// [] : 배열 만들 때
// {} : 내가 처리하고 싶은 연산들
// ;  : 최소 연산 단위, 

// if( $조건 ) {
// 	// 처리할 내용
// }

// for( $시작값; $종료조건; $루프마다얼마증가 ) {
// 	// 처리할 내용
// }

// while( $조건 ) {
// 	// 처리할 내용
// }


// if문이용 : 90이면 "수", 80이면 "우", 그 외는 "노력" 출력
// $score = 90;
// if( $score === 90 ) {
// 	echo "수";
// } else if( $score === 80 ) {
// 	echo "우";
// } else {
// 	echo "노력";
// }


// while문 이용 : 구구단 7단
$num = 1;
// while( $num <= 9 ) {
// 	$mul = $num * 7;
// 	echo "7 X {$num} = {$mul}\n";
// 	$num++;
// }
// while(true) {
// 	$mul = $num * 7;
// 	echo "7 X {$num} = {$mul}\n";
// 	if($num === 5) {
// 		break;
// 	}
// 	$num++;
// }


// 배열(Array)
$arr = [1, 2, 3];
$arr2 = [
	"key1" => "val1"
	,"key2" => [
				"key3" => "val3"
				,"key4" => "val4"
			]
];

// echo $arr[2], "\n";
// echo $arr2["key2"]["key4"];
// print_r($arr2["key2"]);
// var_dump($arr2["key2"]);

// foreach( $arr2["key2"] as $key => $val) {
// 	echo "{$key} : {$val}\n";
// }

// define("MSG", "에러가 발생했습니다. (CODE : %s)");
// $msg = sprintf(MSG, "E01");
// echo $msg;