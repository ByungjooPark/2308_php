<?php
$arr = [
	["emp_no" => 10001,"gender" => "F"]
	,["emp_no" => 10002,"gender" => "M"]
];

// 남자인 경우에만 사원번호를 출력해주세요.
foreach($arr as $key => $item) {
	if($item["gender"] === "M") {
		echo $item["emp_no"];
	}
}
