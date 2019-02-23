<?php
/**
 * @file SingleNumber.php
 * @author likai
 * @date 2019/2/23
 * @brief 136.只出现一次的数字
 * 给定一个非空整数数组，除了某个元素只出现一次以外，其余每个元素均出现两次。找出那个只出现了一次的元素。
 */
class SingleNumber {

    /**
     * 第一次解法
     * @param Integer[] $nums
     * @return Integer
     */
    function solution1($nums) {
        $map = [];
        foreach($nums as $n) {
            $map[$n] = isset($map[$n]) ? ++$map[$n] : 1;
        }
        return array_search(1, $map);
    }

    /**
     * 异或运算
     * 0和任何数进行异或运算都等于任何数
     * 对同一个数异或两次，结果为0
     * @param Integer[] $nums
     * @return Integer
     */
    function solution2($nums) {
        $result = 0;
        for ($i=0;$i<count($nums);$i++) {
            $result = $nums[$i] ^ $result;
        }
        return $result;
    }
}

$arr1 = [2,2,1];
$arr2 = [4,1,2,1,2];

$solution = new SingleNumber();
// 输出结果： 4
echo $solution->solution2($arr2);
