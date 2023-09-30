<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/mini_board/src/"); // 웹서버 root 패스 생성
define("FILE_HEADER", ROOT."header.php"); // 헤더 패스
define("ERROR_MSG_PARAM", "Parameter Error : %s"); // 파라미터 에러 메세지
require_once(ROOT."lib/lib_db.php"); // DB관련 라이브러리

$conn = null; // DB Connection 변수
$http_method = $_SERVER["REQUEST_METHOD"]; // Method 확인
$arr_err_msg = []; // 에러 메세지 저장용

// POST로 request가 왔을 때 처리
if($http_method === "POST") {
	try {
		// 파라미터 획득
		$title = isset($_POST["title"]) ? $_POST["title"] : ""; // title 셋팅
		$content = isset($_POST["content"]) ? $_POST["content"] : ""; // content 셋팅

		if($title === "") {
			$arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "title");
		}
		if($content === "") {
			$arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "content");
		}
		if(count($arr_err_msg) >= 1) {
			throw new Exception(implode("<br>", $arr_err_msg));
		}

		// DB 접속
		if(!my_db_conn($conn)) {
			// DB Instance 에러
			throw new Exception("DB Error : PDO Instance");
		}
		$conn->beginTransaction(); // 트랜잭션 시작

		// 게시글 작성을 위헤 파라미터 셋팅
		$arr_param = [
			"title" => $_POST["title"]
			,"content" => $_POST["content"]
		];

		// insert
		if(!db_insert_boards($conn, $arr_param)) {
			// DB Insert 에러
			throw new Exception("DB Error : Insert Boards");
		}

		$conn->commit(); // 모든 처리 완료 시 커밋

		// 리스트 페이지로 이동
		header("Location: list.php");
		exit;
	} catch(Exception $e) {
		$conn->rollBack();
		echo $e->getMessage(); // Exception 메세지 출력
		exit;
	} finally {
		db_destroy_conn($conn); // DB 파기
	}
}

?>

<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/mini_board/src/css/common.css">
	<title>작성 페이지</title>
</head>
<body>
	<?php
		require_once(FILE_HEADER);
	?>
	<main class="container">
		<form action="/mini_board/src/insert.php" method="post">
			<table class="table-striped">
				<tr>
					<th class="radius-left">
						<label for="title">제목</label>
					</th>
					<td class="radius-right">
						<input type="text" name="title" id="title">
					</td>
				</tr>
				<tr>
					<th class="radius-left">
						<label  for="contents">내용</label>
					</th>
					<td class="radius-right">
					<textarea rows="6" cols="10" name="content" id="contents"></textarea>
					</td>
				</tr>
			</table>
			<section class="button">
				<button class="button_a" type="submit">작성</button>
				<a class="button_a" href="/mini_board/src/list.php">취소</a>
			</section>
		</form>
	</main>
</body>
</html>