<?php
/**
 * @file SearchMatrix.php
 * @author likai
 * @date 2019/2/23
 * @brief 240.搜索二维矩阵
 * 编写一个高效的算法来搜索 m x n 矩阵 matrix 中的一个目标值 target。该矩阵具有以下特性：
 * 每行的元素从左到右升序排列。
 * 每列的元素从上到下升序排列。
 */
class SearchMatrix {
    /**
     * 解法一：
     * 逐行循环，target小于当前值时，循环下一行
     * @param $matrix
     * @param $target
     * @return bool
     */
    function solution($matrix, $target) {
        if ($matrix[0][0] == $target) {
            return true;
        }
        foreach ($matrix as $line) {
            foreach ($line as $n) {
                if ($target == $n) {
                    return true;
                } else {
                    if ($target < $n) {
                        break;
                    }
                }
            }
        }
        return false;
    }

    /**
     * 解法二：
     * 从右上角出发
     * 大于$matrix[0][n]的话，跳过此行
     * 小于$matrix[0][n]的话，n-1
     * @param $matrix
     * @param $target
     * @return bool
     */
    function solution2($matrix, $target) {
        $m = count($matrix);
        $n = count($matrix[0]);
        $i = 0;
        $j = $n - 1;

        while ($i < $m && $j > 0) {
            if ($matrix[$i][$j] == $target) {
                return true;
            } else if ($target > $matrix[$i][$j]) {
                $i++;
            } else {
                $j--;
            }
        }
        return false;
    }
}

$matrix = [
    [1, 4, 7, 11, 15],
    [2, 5, 8, 12, 19],
    [3, 6, 9, 16, 22],
    [10, 13, 14, 17, 24],
    [18, 21, 23, 26, 30],
];

$solution = new SearchMatrix();
var_dump($solution->solution2($matrix, 5));
var_dump($solution->solution2($matrix, 20));

