<?php
/**
*	题目1：现有16人，男女各半，要求将16人分为四组，每组有2男2女，每次分组结果不同
*	题目2：在题目1输出的结果下，再次进行分组，要求第二次分组结果中的每个人在第一次分组中都不是同一组
*	例：男：['男1', '男2', '男3', '男4', '男5', '男6', '男7', '男8']
*		女：['女1', '女2', '女3', '女4', '女5', '女6', '女7', '女8']
*
*	输出1： ['男1', '男2', '女1', '女2']
*			['男3', '男4', '女3', '女4']
*			['男5', '男6', '女5', '女6']
*			['男7', '男8', '女7', '女8']
*
*	输出2： ['男1', '男4', '女5', '女8']
*			['男2', '女3', '女6', '男7']
*			['女1', '女4', '男5', '男8']
*			['女2', '男3', '男6', '女7']
*/


$boy = ['b1', 'b2', 'b3', 'b4', 'b5', 'b6', 'b7', 'b8'];
$girl = ['g1', 'g2', 'g3', 'g4', 'g5', 'g6', 'g7', 'g8'];

$output1 = output1($boy, $girl);
echo "output1:\n";
var_dump($output1);

$output2 = output2($output1);
echo "output2:\n";
var_dump($output2);



function output1($boy, $girl){
	shuffle($boy);
	shuffle($girl);
	$group = array();
	$group_length = count($boy) / 2;
	for($i=0;$i<$group_length;$i++){
		$group[$i][] = array_pop($boy);
		$group[$i][] = array_pop($boy);
		$group[$i][] = array_pop($girl);
		$group[$i][] = array_pop($girl);
	}
	return $group;
}

/*二位数组对角线取值，即可保证第二轮分组的每组成员在第一次分组中都不在同一组内*/
function output2($array){
	$group = array();
	$length = count($array);
	for($i=0;$i<$length;$i++){
		$group[$i][0] = $array[0][$i];
		for($j=1;$j<$length;$j++){
			$num = ($i + $j) % 4;
			$group[$i][$j] = $array[$j][$num];
		}
	}
	return $group;
}