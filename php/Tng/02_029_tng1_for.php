<?php
// 반복문을 이용해서 1~10까지 숫자를 출력해 주세요.
// 1
// 2
// 3
// ...
// 10
// for($i = 1; $i <= 10; $i++) {
// 	$str = $i."\n";
// 	echo $str;
// }

// 구구단 2단을 반복문을 이용해서 작성해 주세요.
// 2 X 1 = 2
// 2 X 2 = 4
//...
// 2 X 9 = 18
// for($i = 1; $i <= 9; $i++) {
// 	$mul = $i * 2;
// 	echo "2 X {$i} = {$mul}\n";
// }

// 구구단 1~9단을 반복문을 이용해서 작성해 주세요.
// 1단
// 1 X 1 = 1
// 1 X 2 = 2
// ..
// 2단
// 2 X 1 = 2
// ..
// 9단
// ...
// 9 X 9 = 81
// for($dan = 1; $dan <= 9; $dan++) {
// 	echo "{$dan}단\n";
// 	for($i = 1; $i <= 9; $i++) {
// 		$mul = $dan * $i;
// 		echo "{$dan} X {$i} = {$mul}\n";
// 	}
// }

// 1단, 9단만 나오게
// for($dan = 1; $dan <= 9; $dan++) {
// 	// 방법1
// 	if( $dan !== 1 && $dan !== 9 ) {
// 		continue;
// 	}
// 	echo "{$dan}단\n";
// 	for($i = 1; $i <= 9; $i++) {
// 		$mul = $dan * $i;
// 		echo "{$dan} X {$i} = {$mul}\n";
// 	}

// 	// 방법2
// 	// if( $dan === 1 && $dan === 9) {
// 	// 	echo "{$dan}단\n";
// 	// 	for($i = 1; $i <= 9; $i++) {
// 	// 		$mul = $dan * $i;
// 	// 		echo "{$dan} X {$i} = {$mul}\n";
// 	// 	}
// 	// }
// }

// 홀수만 뜨게
// for($dan = 1; $dan <= 2000; $dan++) {
// 	if( $dan % 2 === 0 ) {
// 		continue;
// 	}
// 	echo "{$dan}단\n";
// 	for($i = 1; $i <= 9; $i++) {
// 		$mul = $dan * $i;
// 		echo "{$dan} X {$i} = {$mul}\n";
// 	}
// }

// 반복문을 이용해서 아래처럼 출력해주세요.
// *
// **
// ***
// ****
// *****
// $cnt = 3;
// $int_line = 1;
// $int_star = 1;
// while($int_line <= $cnt) {
// 	while($int_star <= $int_line) {
// 		echo "*";
// 		$int_star++;
// 	}
// 	$int_star = 1;
// 	echo "\n";
// 	$int_line++;
// }

// for($line = 1; $line <= $cnt; $line++) {
// 	for($star = 1; $star <= $line; $star++) {
// 		echo "*";
// 	}
// 	echo "\n";
// }

// 다되면 이렇게
//     *
//    **
//   ***
//  ****
// *****
// $cnt = 5;
// for($int_line = $cnt; $int_line >= 1; $int_line--) {
// 	for($int_star = 1; $int_star <= $cnt; $int_star++) {
// 		if($int_star >= $int_line) {
// 			echo "*";
// 		} else {
// 			echo " ";
// 		}
// 	}
// 	echo "\n";
// }

$cnt = 5;
for($i = $cnt * 2; $i <= $cnt - 2; $i++) {
	echo "{$i}\n";
}