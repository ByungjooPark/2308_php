<?php

namespace model;

class BoardNameModel extends ParentsModel {
	public function getBoardNameList() {
		$sql =
			" SELECT "
			." 	b_type "
			." 	,b_name "
			." FROM boardname "
			." ORDER BY b_type "
			;
		
		try {
			$stmt = $this->conn->query($sql);
			$result = $stmt->fetchAll();
			return $result;
		} catch(Exception $e) {
			echo "BoardNameModel->getBoardNameList Error : ".$e->getMessage();
			exit();
		}
	}

}