<?php

// HTTP(HyperText Transfer Protocol) 통신
// HTML파일을 Request, Response하며 통신
// 단, 요즘은 JSON 등등 여러 텍스트 형식도 통신이 가능

// URL의 구조
// http://www.naver.com/mini_board/src/list.php/?page=2&num=10
// 프로토콜 : 통신을 하기위한 규약, 약속, 규칙 (http 부분)
// 도메인 : 접속하고자 하는 서버의 ip 또는 별칭 (www.naver.com 부분)
// 패스 : 실행 시키고자 하는 처리의 주소 (mini_board/src/list.php 부분)
// 쿼리스트링(파라미터) : Get Method로 통신할 때 보내주는 데이터 (?page=2&num=10 부분)

// GET Method
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
	
	<br>
	<br>
	<form action="/04_146_http_get_method.php" method="get">
		<input type="hidden" name="tt" value="testtest">
		<button type="submit">form 테스트</button>
	</form>
</body>
</html>