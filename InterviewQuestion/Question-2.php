<?php
/**
 * @file Question-2.php
 * @author likai
 * @date 2019/2/26
 * @brief 括号匹配
 * 假设表达式中只有三种括号：圆括号()、方括号[]、花括号{}
 * 现给出一个包含这三种括号的字符串，如何检查是否合法
 */
$str = '({{[]}})';

function check ($str) {
    $str   = str_split($str);
    $count = count($str);
    $temp  = [];
    $left  = ['(', '[', '{'];
    $right = [')', ']', '}'];

    for ($i = 0; $i < $count; $i++) {
        if (in_array($str[$i], $left)) {
            $temp[] = $str[$i];
        }
        if (in_array($str[$i], $right)) {
            $t = array_pop($temp);
            switch ($str[$i]) {
                case ')':
                    if ($t !== '(') return false;
                    break;
                case ']':
                    if ($t !== '[') return false;
                    break;
                case '}':
                    if ($t !== '{') return false;
                    break;
            }
        }
    }

    return true;
}

var_dump(check($str));