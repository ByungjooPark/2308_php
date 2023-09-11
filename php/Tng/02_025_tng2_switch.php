<?php
// switch를 이용하여 작성
// 1등이면 금상, 2등이면 은상, 3등이면 동상, 4등이면 장려상, 그 외는 노력상
// 을 출력해 주세요.
$rank = 1;
$award = "";
switch($rank) {
	case 1:
		$award = "금상";
		break;
	case 2:
		$award = "은상";
		break;
	case 3:
		$award = "동상";
		break;
	case 4:
		$award = "장려상";
		break;
	default:
		$award = "노력상";
		break;
}

// if로 한다면
if( $rank === 1 ) {
	$award = "금상";
}
else if( $rank === 2 ) {
	$award = "은상";
}
else if( $rank === 3 ) {
	$award = "동상";
}
else if( $rank === 4 ) {
	$award = "장려상";
}
else {
	$award = "노력상";
}

echo $award;