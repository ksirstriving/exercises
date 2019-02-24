<?php
/**
 * @file InsertionSort.php
 * @author likai
 * @date 2019/2/24
 * @brief 插入排序
 * 每次选择一个元素，并且将这个元素和整个数组中的所有元素进行比较，然后插入到合适的位置。
 * 时间复杂度O(n^2)
 */
function insertionSort(&$arr) {
    $len = count($arr);
    for ($i = 1; $i < $len; $i++) {
        $tmp = $arr[$i];
        for ($j = $i - 1; $j >= 0; $j--) {
            if ($arr[$j] > $tmp) {
                $arr[$j + 1] = $arr[$j];
                $arr[$j] = $tmp;
            } else {
                // 前面的是已排序好的，跳过
                break;
            }
        }

    }
}


$arr = [2,1,6,4,5,3,7,8,9];
insertionSort($arr);
var_dump($arr);
