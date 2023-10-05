<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/mini_board/src/"); // 웹서버 root 패스 생성
define("FILE_HEADER", ROOT."header.php"); // 헤더 패스
define("ERROR_MSG_PARAM", "Parameter Error : %s"); // 파라미터 에러 메세지
require_once(ROOT."lib/lib_db.php"); // DB관련 라이브러리

$conn = null; // DB 연결용 변수
$http_method = $_SERVER["REQUEST_METHOD"]; // Method 확인
$arr_err_msg = []; // 에러 메세지 저장용

try {
	// DB 연결
	if(!my_db_conn($conn)) {
		// DB Instance 에러
		throw new Exception("DB Error : PDO Instance");
	}

	if($http_method === "GET") {
		// GET Method의 경우
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
	} else {
		// POST Method의 경우
		// 파라미터 획득
		$id = isset($_POST["id"]) ? $_POST["id"] : ""; // id 셋팅
		$page = isset($_POST["page"]) ? $_POST["page"] : ""; // page 셋팅
		$title =  trim( isset($_POST["title"]) ? $_POST["title"] : "" ); // title 셋팅
		$content = trim( isset($_POST["content"]) ? $_POST["content"] : "" ); // content 셋팅

		if($id === "") {
			$arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "id");
		}
		if($page === "") {
			$arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "page");
		}
		// id, page가 없을 경우(예외처리)
		if(count($arr_err_msg) >= 1) {
			throw new Exception(implode("<br>", $arr_err_msg));
		}
		
		// title, content가 없을 경우(처리 속행)
		if($title === "") {
			$arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "title");
		}
		if($content === "") {
			$arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "content");
		}

		if(count($arr_err_msg) === 0) {
			// 게시글 수정을 위헤 파라미터 셋팅
			$arr_param = [
				"id" => $id
				,"title" => $title
				,"content" => $content
			];
			
			// 게시글 수정 처리
			$conn->beginTransaction(); // 트랜잭션 시작
			
			if(!db_update_boards_id($conn, $arr_param)) {
				throw new Exception("DB Error : Update_Boards_id");
			}
			$conn->commit(); // commit
			
			header("Location: /mini_board/src/detail.php/?id={$id}&page={$page}"); // 디테일 페이지로 이동
			exit;
		}
	}

	// 게시글 데이터 조회를 위한 파라미터 셋팅
	$arr_param = [
		"id" => $id
	];

	// 게시글 데이터 조회
	$result = db_select_boards_id($conn, $arr_param);
	// 게시글 조회 예외처리
	if($result === false) {
		// 게시글 조회 에러
		throw new Exception("DB Error : PDO Select_id");
	} else if(!(count($result) === 1)) {
		// 게시글 조회 count 에러
		throw new Exception("DB Error : PDO Select_id Count, ".count($result));
	}
	$item = $result[0];

} catch(Exception $e) {
	if($http_method === "POST") {
		$conn->rollBack(); // rollback
	}
	// echo $e->getMessage(); // 예외발생 메세지 출력  //v002 del
	header("Location: /mini_board/src/error.php/?err_msg={$e->getMessage()}"); // v002 add
	exit; // 처리종료
} finally {
	db_destroy_conn($conn);
}

?>

<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/mini_board/src/css/common.css">
	<title>수정 페이지</title>
</head>
<body>
	<?php
		require_once(FILE_HEADER);
	?>
	<main class="container">
		<?php
			foreach($arr_err_msg as $val) {
		?>
				<p><?php echo $val ?></p>
		<?php
			}
		?>
		<form action="/mini_board/src/update.php" method="post">
			<table class="table-striped">
				<input type="hidden" name="id" value="<?php echo $id; ?>">
				<input type="hidden" name="page" value="<?php echo $page; ?>">
				<tr>
					<th class="radius-left">글 번호</th>
					<td class="radius-right"><?php echo $item["id"]; ?></td>
				</tr>
				<tr>
					<th class="radius-left">제목</th>
					<td class="radius-right"><input type="text" name="title" value="<?php echo $item["title"]; ?>"></td>
				</tr>
				<tr>
					<th class="radius-left">내용</th>
					<td class="radius-right"><textarea name="content" id="content" cols="30" rows="10"><?php echo $item["content"]; ?></textarea></td>
				</tr>
			</table>
			<section class="button">
				<button class="button_a" type="submit">완료</button>
				<a class="button_a" href="/mini_board/src/detail.php/?id=<?php echo $id; ?>&page=<?php echo $page; ?>">취소</a>
			</section>
		</form>
	</main>
</body>
</html>