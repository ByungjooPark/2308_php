<?php

echo "숫자 맞추기 게임\n";
echo "1~100의 숫자를 입력해 주세요.\n";
$answer = mt_rand(1, 100); // 랜덤 숫자 획득
$cnt = 0; // 도전 횟수 카운트

while(true) {
	$cnt++;
	if($cnt > 5) {
		echo "기회 소진, 정답({$answer})-게임 끝-";
		break;
	}
	$input = (int)(trim(fgets(STDIN))); // 입력값 획득

	// 정답시 루프 종료, 그 외는 루프 계속
	if($input > $answer) {
		echo "DOWN\n";
	} else if($input < $answer) {
		echo "UP\n";
	} else {
		echo "정답!";
		break;
	}
}