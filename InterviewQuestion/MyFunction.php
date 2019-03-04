<?php
/**
 * @file MyFunction.php
 * @author likai
 * @date 2019/3/3
 * @brief 小练习
 */
class MyFunction {
    /**
     * 不引入第三个变量，交换变量值
     * @param $a
     * @param $b
     */
    public static function changeValue(&$a, &$b) {
        list($a, $b) = [$b, $a];
    }

    /**
     * 多线程读取文件
     * @param string $filename
     */
    public static function fileLock(string $filename) {
        $fp = fopen($filename, 'w+');
        if (flock($fp, LOCK_EX)) { // 取得共享锁
            /* ... */
            flock($fp, LOCK_UN); // 释放锁
        } else {
            echo 'Could not lock file.';
        }

        fclose($fp);
    }

    /**
     * 遍历文件夹下所有文件夹和文件
     * @param string $path
     */
    public static function getDirInfo(string $path) {
        $handle = opendir($path);
        while (($content = readdir($handle)) !== false) {
            $newDir = $path . DIRECTORY_SEPARATOR . $content;
            if (in_array($content, ['.', '..'])) {
                continue;
            }
            if (is_dir($newDir)) {
                echo "目录: $newDir \n";
                self::getDirInfo($newDir);
            } else {
                echo "文件: $path/$content \n";
            }
        }
    }

    /**
     * 返回url的扩展名
     * @param string $url
     * @return string
     */
    public static function getExtensionFromUrl(string $url) : string {
        $arr = parse_url($url);
        $result = pathinfo($arr['path']);
        return $result['extension'];
    }

    /**
     * 返回文件a相对于文件b的相对路径
     * @param string $a
     * @param string $b
     * @return string
     */
    public static function getRelPath(string $a, string $b): string {
        $arrA = explode('/', $a);
        $arrB = explode('/', $b);
        // 获取相同路径部分
        $intersection = array_intersect_assoc($arrA, $arrB);
        $depth = 0;

        // 获取同目录部分最后一个的数组下标
        $len = count($intersection);
        for ($i = 0; $i < $len; $i++) {
            if (!isset($intersection[$i])) {
                $depth = $i;
                break;
            }
        }

        // 相同目录部分转为..
        $samePath = array_fill(0, count($arrB) - $depth - 1, '..');
        // 截取目录a的差别部分
        $diffPath = array_slice($arrA, $depth);

        $arrRelPath = array_merge($samePath, $diffPath);
        return implode('/', $arrRelPath);
    }
}