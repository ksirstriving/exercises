<?php
/**
 * @file BubbleSort.php
 * @author likai
 * @date 2019/2/24
 * @brief 冒泡排序
 */
function bubbleSort(&$arr) {
    $len = count($arr);
    for ($i = 0; $i < $len - 1; $i++) {
        for ($j = $i + 1; $j < $len; $j++) {
            if ($arr[$i] > $arr[$j]) {
                $temp    = $arr[$i];
                $arr[$i] = $arr[$j];
                $arr[$j] = $temp;
            }
        }
    }
}

$arr = [2,1,6,4,5,3,7,8,9];
bubbleSort($arr);
var_dump($arr);