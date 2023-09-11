<?php
// IF문 : 조건에 따라서 서로 다른 처리를 하는 문법

// 1이면 1등, 2면 2등, 3이면 3등, 나머지는 순위 외, 5번만 특별상 를 출력
$num = 6;
if( $num === 1 ){
	echo "1등";
}
else if( $num === 2 ) {
	echo "2등";
}
else if( $num === 3 ) {
	echo "3등";
}
else {
	if( $num === 5) {
		echo "특별상";
	}
	else {
		echo "순위 외";
	}
}

?>