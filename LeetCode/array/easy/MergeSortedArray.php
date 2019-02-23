<?php
/**
 * @file MergeSortedArray.php
 * @author likai
 * @date 2019/2/23
 * @brief 88.合并两个有序数组
 * 给定两个有序整数数组 nums1 和 nums2，将 nums2 合并到 nums1 中，使得 num1 成为一个有序数组。
 * 说明:
 * 初始化 nums1 和 nums2 的元素数量分别为 m 和 n。
 * 你可以假设 nums1 有足够的空间（空间大小大于或等于 m + n）来保存 nums2 中的元素。
 */
class MergeSortedArray {
    /**
     * 从数组末尾开始排序
     * @param Integer[] $nums1
     * @param Integer $m
     * @param Integer[] $nums2
     * @param Integer $n
     */
    function solution(&$nums1, $m, $nums2, $n) {
        $len = $m + $n - 1;
        $m--;
        $n--;
        while ($m >= 0 && $n >= 0) {
            if ($nums1[$m] > $nums2[$n]) {
                $nums1[$len--] = $nums1[$m--];

            } else {
                $nums1[$len--] = $nums2[$n--];
            }
        }
        // 如果 $nums2 还有为合并的元素
        while ($n >= 0) {
            $nums1[$len--] = $nums2[$n--];
        }
    }
}

//$nums1 = [1,2,3,0,0,0];
//$m = 3;
//$nums2 = [2,5,6];
//$n = 3;
$nums1 = [2,0];
$m = 1;
$nums2 = [1];
$n = 1;

$solution = new MergeSortedArray();
$solution->solution($nums1, $m, $nums2, $n);
var_dump($nums1);