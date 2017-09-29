<?php
	/*快速排序算法优化*/

	$arr = range(1, 100);
	shuffle($arr);

	// quickSort1($arr);
	// quickSort2($arr);
	// quickSort3($arr);
	quickSort4($arr);

	// 基准为数组首位
	function quickSort1($arr = array()){
		if (! is_array($arr)) return FALSE;
		$length = count($arr);
		if ($length <= 1) {
			return $arr;
		}
		$left = array();
		$right = array();
		for ($i=1; $i < $length; $i++) { 
			if ($arr[$i] < $arr[0]) {
				$left[] = $arr[$i];
			} else {
				$right[] = $arr[$i];
			}
		}
		$left = quickSort($left);
		$right = quickSort($right);
		return array_merge($left, array($arr[0]), $right);
	}	

	// 随机取基准
	function quickSort2($arr = array()){
		if (! is_array($arr)) return FALSE;
		$length = count($arr);
		if ($length <= 1) return $arr;
		$left = array();
		$right = array();
		$pivot = selectPivotRandom($length);
		for ($i=0;$i<$length;$i++) { 
			if ($i == $pivot) continue;
			if ($arr[$i] < $arr[$pivot]) {
			 	$left[] = $arr[$i];
			} else {
				$right[] = $arr[$i];
			} 
		}
		$left = quickSort2($left);
		$right = quickSort2($right);
		return array_merge($left, array($arr[$pivot]), $right);
	}

	// 取数组首中尾三者值的中间值为基准
	function quickSort3($arr = array()){
		if (! is_array($arr)) return FALSE;
		$length = count($arr);
		if ($length <= 1) return $arr;
		$left = array();
		$right = array();
		$pivot = selectMidPivot($arr, $length);
		for ($i=0;$i<$length;$i++) { 
			if ($i == $pivot) continue;
			if ($arr[$i] < $arr[$pivot]) {
			 	$left[] = $arr[$i];
			} else {
				$right[] = $arr[$i];
			} 
		}
		$left = quickSort3($left);
		$right = quickSort3($right);
		return array_merge($left, array($arr[$pivot]), $right);
	}	

	// 基于第三种之上，把与基准值相等的元素聚在一起，下次分割不用再对其分割
	function quickSort4($arr = array()){
		if (! is_array($arr)) return FALSE;
		$length = count($arr);
		if ($length <= 1) return $arr;
		$left = array();
		$right = array();
		$temp = array();
		$pivot = selectMidPivot($arr, $length);
		for ($i=0; $i < $length; $i++) { 
			if ($i == $pivot) continue;
			if ($arr[$i] < $arr[$pivot]) {
				$left[] = $arr[$i];
			} else if ($arr[$i] > $arr[$pivot]) {
				$right[] = $arr[$i];
			} else {
				$temp[] = $arr[$i];
			}
		}
		$left = quickSort4($left);
		$right = quickSort4($right);
		return array_merge($left, array($arr[$pivot]), $temp, $right);
	}

	// 随机取基准
	function selectPivotRandom($length){		
		return mt_rand(0,$length-1);
	}

	// 基准，三数取中
	function selectMidPivot($arr, $length){
		$mid = ($length + 1) >> 1;
		$temp = $mid;
		if ($arr[$mid] >= $arr[0] && $arr[$mid] <= $arr[$length-1]) {
			return $mid;
		} else if ($arr[0] >= $arr[$mid] && $arr[0] <= $arr[$length-1]) {
			return 0;
		} else {
			return $length-1;
		}
	}
