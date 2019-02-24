<?php
/**
 * @file ShellSort.php
 * @author likai
 * @date 2019/2/24
 * @brief 希尔排序
 * 这个是插入排序的修改版，根据步长由长到短分组，进行排序，直到步长为1为止，属于插入排序的一种。
 */
function shellSort(&$arr) {
    $len = count($arr);
    $inc = $len; // 设置步长
    do {
        $inc = ceil($inc / 2);
        for ($i = $inc; $i < $len; $i++) {
            $temp = $arr[$i];
            for ($j = $i - $inc; $j >= 0 && $arr[$j + $inc] < $arr[$j]; $j -= $inc) {
                $arr[$j + $inc] = $arr[$j];
            }
            $arr[$j + $inc] = $temp;
        }
//        echo $inc . ':' . implode(',',$arr) . "\n";
    } while ($inc > 1);
}

$arr = [2,1,6,4,5,3,7,8,9];
shellSort($arr);
//var_dump($arr);
//echo implode(',', $arr) . "\n";