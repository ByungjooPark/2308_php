<?php
// GET Method

// URL의 구조
// http://www.naver.com/mini_board/src/list.php/?page=2&num=10
// 프로토콜 : 통신을 하기위한 규약, 약속, 규칙 (http 부분)
// 도메인 : 접속하고자 하는 서버의 ip 또는 별칭 (www.naver.com 부분)
// 패스 : 실행 시키고자 하는 처리의 주소 (mini_board/src/list.php 부분)
// 쿼리스트링(파라미터) : Get Method로 통신할 때 유저가 보내주는 데이터 (?page=2&num=10 부분)

print_r($_GET);

?>

<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<a href="/04_146_http_get_method.php/?page=1&num=10">test</a>
</body>
</html>