<?php

namespace model;

class BoardModel extends ParentsModel {
	public function getBoardList($arrBoardInfo) {
		$sql =
			" SELECT "
			." 	id "
			."	,u_pk "
			."	,b_title "
			."	,b_content "
			."	,b_img "
			."	,created_at "
			."	,updated_at "
			." FROM board "
			." WHERE "
			." 		b_type = :b_type "
			." 	AND deleted_at IS NULL "
			." ORDER BY id DESC "
			;

		$prepare = [
			":b_type" => $arrBoardInfo["b_type"]
		];

		try {
			$stmt = $this->conn->prepare($sql);
			$stmt->execute($prepare);
			$result = $stmt->fetchAll();
			return $result;
		} catch (Exception $e) {
			echo "BoardModel->getBoardList Error : ".$e->getMessage();
			exit();
		}
	}

	// 작성글 인서트
	public function addBoard($arrAddBoardInfo) {
		$sql =
			" INSERT INTO board ( "
			." 	u_pk "
			." 	,b_type "
			." 	,b_title "
			." 	,b_content "
			." 	,b_img "
			." ) "
			." VALUES ( "
			." 	:u_pk "
			." 	,:b_type "
			." 	,:b_title "
			." 	,:b_content "
			." 	,:b_img "
			." ) "
			;
		$prepare = [
			":u_pk" => $arrAddBoardInfo["u_pk"]
			,":b_type" => $arrAddBoardInfo["b_type"]
			,":b_title" => $arrAddBoardInfo["b_title"]
			,":b_content" => $arrAddBoardInfo["b_content"]
			,":b_img" => $arrAddBoardInfo["b_img"]
		];
		
		try {
			$stmt = $this->conn->prepare($sql);
			$result = $stmt->execute($prepare);
			return $result;
		} catch (Exception $e) {
			echo "BoardModel->addBoard Error : ".$e->getMessage();
			exit();
		}
	}

	// 디테일 조회
	public function getBoardDetail($arrBoardDetailInfo) {
		$sql =
			" SELECT "
			." 	id "
			."	,u_pk "
			."	,b_title "
			."	,b_content "
			."	,b_img "
			."	,created_at "
			."	,updated_at "
			." FROM board "
			." WHERE "
			." 		id = :id "
			;

		$prepare = [
			":id" => $arrBoardDetailInfo["id"]
		];

		try {
			$stmt = $this->conn->prepare($sql);
			$stmt->execute($prepare);
			$result = $stmt->fetchAll();
			return $result;
		} catch (Exception $e) {
			echo "BoardModel->getBoardDetail Error : ".$e->getMessage();
			exit();
		}
	}

	// 삭제 처리
	public function removeBoardCard($arrDeleteBoardInfo) {
		$sql =
			" UPDATE board "
			." SET "
			." 	deleted_at = NOW() "
			." WHERE "
			." 	id = :id "
			." 	AND u_pk = :u_pk "
			;
		
		$prepare = [
			":id" => $arrDeleteBoardInfo["id"]
			,":u_pk" => $arrDeleteBoardInfo["u_pk"]
		];

		try {
			$stmt = $this->conn->prepare($sql);
			$stmt->execute($prepare);
			$result = $stmt->rowCount(); // 쿼리에 영향을 받은 레코드 수를 반환
			return $result;
		} catch(Exception $e) {
			echo "BoardModel->removeBoardCard Error : ".$e->getMessage();
			exit();
		}
	}
}