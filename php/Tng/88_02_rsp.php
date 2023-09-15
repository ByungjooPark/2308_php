<?php
echo "****** 가위바위보 게임 ******\n";
echo "가위는 S, 바위는 R, 보는 P를 입력해주세요.\n";

$input = strtoupper( trim(fgets(STDIN)) ); // 입력값 획득

$reult = 0; // 결과 저장 (승리:2, 패배:1, 무승부:0)
$msg = "***************\n%s\n유저 : %s\n컴퓨터 : %s\n***************"; // 게임 결과 메세지

// 가위:0, 바위:1, 보:2
$computer = mt_rand(0, 2); // 컴퓨터 가위바위보 획득
$user = 0; // 유저입력값(숫자로 변환)

// 유저 입력값 숫자로 변환
if( $input === "S" ) {
	$user = 0;
} else if( $input === "R" ) {
	$user = 1;
} else {
	$user = 2;
}
var_dump($input);

if( $computer === 0 ) {
	// 컴퓨터가 가위일 경우
	if( $user === 0 ) {
		// 유저가 가위일 경우 무승부
		$result = 0;
	} else if( $user === 1 ) {
		// 유저가 바위일 경우 승리
		$result = 2;
	} else {
		// 유저가 보일 경우 패배
		$result = 1;
	}
} else if( $computer === 1 ) {
	// 컴퓨터가 바위일 경우
	if( $user === 0 ) {
		// 유저가 가위일 경우 패배
		$result = 1;
	} else if( $user === 1 ) {
		// 유저가 바위일 경우 무승부
		$result = 0;
	} else {
		// 유저가 보일 경우 승리
		$result = 2;
	}
} else {
	// 컴퓨터가 보일 경우
	if( $user === 0 ) {
		// 유저가 가위일 경우 승리
		$result = 2;
	} else if( $user === 1 ) {
		// 유저가 바위일 경우 패배
		$result = 1;
	} else {
		// 유저가 보일 경우 무승부
		$result = 0;
	}
}

// 결과 구문 생성(승리:2, 패배:1, 무승부:0)
$result_str = "";
switch( $result ) {
	case 0:
		$result_str = "무승부";
		break;
	case 1:
		$result_str = "패배";
		break;
	default:
	$result_str = "승리";
		break;
}

printf($msg, $result_str, rsp_num_to_str($user), rsp_num_to_str($computer));


// ------------------------------
// 함수명	: rsp_num_to_str(int $num)
// 설명		: 가위바위보 숫자를 문자로 변환
// 파라미터	: int $num	0 || 1 || 2
// 리턴		: string	가위 || 바위 || 보
// ------------------------------
function rsp_num_to_str(int $num) {
	$result = "";
	// 가위:0, 바위:1, 보:2
	switch( $num ) {
		case 0:
			$result = "가위";
			break;
		case 1:
			$result = "바위";
			break;
		default:
		$result = "보";
			break;
	}
	return $result;
}