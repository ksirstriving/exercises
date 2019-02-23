<?php
/**
 * @file MajorityElement.php
 * @author likai
 * @date 2019/2/23
 * @brief 169.求众数
 * 给定一个大小为 n 的数组，找到其中的众数。众数是指在数组中出现次数大于 [ n/2 ] 的元素。
 * 你可以假设数组是非空的，并且给定的数组总是存在众数。
 */
class MajorityElement {
    /**
     * 解法一：
     * 生成hash，大于[n/2]时输出结果
     * @param $nums
     * @return int
     */
    function solution($nums) {
        $result = 0;
        $map = [];
        $a = count($nums) / 2;
        foreach ($nums as $n) {
            $map[$n] = isset($map[$n]) ? ++$map[$n] : 1;
            if ($map[$n] > $a) {
                $result = $n;
                break;
            }
        }

        return $result;
    }

    /**
     * 解法二：
     * 摩尔投票法
     * @param $nums
     * @return int
     */
    function solution2($nums) {
        $result = $cnt = 0;
        foreach ($nums as $n) {
            if ($cnt == 0) {
                $result = $n;
            }
            if ($result != $n) {
                $cnt--;
            } else {
                $cnt++;
            }
        }

        return $result;
    }
}

$arr = [3,2,3];
$solution = new MajorityElement();
// 输出结果：3
echo $solution->solution($arr);
// 数据结果：3
echo $solution->solution2($arr);