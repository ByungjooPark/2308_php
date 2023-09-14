<?php

// 버블 정렬
$arr = [5, 34, 3, 2, 6, 7, 12];

$last_idx_arr = count($arr) - 1;
for($cnt_cycle = 0; $cnt_cycle <= $last_idx_arr; $cnt_cycle++) {
	for($idx = 0; $idx <= $last_idx_arr - $cnt_cycle - 1; $idx++) {
		if( $arr[$idx] > $arr[$idx + 1] ) {
			$tmp = $arr[$idx];
			$arr[$idx] = $arr[$idx + 1];
			$arr[$idx + 1] = $tmp;
		}
		// echo "{$cnt_cycle} : {$idx}\n";
	}
}

print_r($arr);