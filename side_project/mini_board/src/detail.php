<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/mini_board/src/"); // 웹서버 root 패스 생성
define("FILE_HEADER", ROOT."header.php"); // 헤더 패스
define("ERROR_MSG_PARAM", "Parameter Error : %s"); // 파라미터 에러 메세지
require_once(ROOT."lib/lib_db.php"); // DB관련 라이브러리

$id = ""; // 게시글 id
$conn = null; // DB Connect
$arr_err_msg = []; // 에러 메세지 저장용

try {
	// DB 연결
	if(!my_db_conn($conn)) {
		// DB Instance 에러
		throw new Exception("DB Error : PDO Instance");
	}

	// 파라미터 획득
	$id = isset($_GET["id"]) ? $_GET["id"] : ""; // id 셋팅
	$page = isset($_GET["page"]) ? $_GET["page"] : ""; // page 셋팅

	if($id === "") {
		$arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "id");
	}
	if($page === "") {
		$arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "page");
	}
	if(count($arr_err_msg) >= 1) {
		throw new Exception(implode("<br>", $arr_err_msg));
	}

	// 게시글 데이터 조회
	$arr_param = [
		"id" => $id
	];
	$result = db_select_boards_id($conn, $arr_param);

	// 게시글 조회 예외처리
	if($result === false) {
		// 게시글 조회 에러
		var_dump($result);
		throw new Exception("DB Error : PDO Select_id");
	} else if(!(count($result) === 1)) {
		// 게시글 조회 count 에러
		throw new Exception("DB Error : PDO Select_id count");
	}
	$item = $result[0];
} catch(Exception $e) {
	// echo $e->getMessage(); // 예외발생 메세지 출력  //v002 del
	header("Location: /mini_board/src/error.php/?err_msg={$e->getMessage()}"); // v002 add
	exit; // 처리종료
} finally {
	db_destroy_conn($conn); // DB 파기
}

?>

<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/mini_board/src/css/common.css">
	<title>상세 페이지</title>
</head>
<body>
	<?php
		require_once(FILE_HEADER);
	?>
	<main class="container">
		<table class="table-striped">
			<tr>
				<th class="radius-left">게시글 번호</th>
				<td class="radius-right"><?php echo $item["id"]; ?></td>
			</tr>
			<tr>
				<th class="radius-left">제목</th>
				<td class="radius-right"><?php echo $item["title"]; ?></td>
			</tr>
			<tr>
				<th class="radius-left">내용</th>
				<td class="radius-right"><?php echo $item["content"]; ?></td>
			</tr>
			<tr>
				<th class="radius-left">작성일자</th>
				<td class="radius-right"><?php echo $item["create_at"]; ?></td>
			</tr>
		</table>
		<section class="button">
			<a class="button_a" href="/mini_board/src/update.php/?id=<?php echo $id; ?>&page=<?php echo $page; ?>">수정</a>
			<a class="button_a" href="/mini_board/src/list.php/?page=<?php echo $page; ?>">취소</a>
			<a class="button_a" href="/mini_board/src/delete.php/?id=<?php echo $id; ?>&page=<?php echo $page; ?>">삭제</a>
		</section>
	</main>
</body>
</html>