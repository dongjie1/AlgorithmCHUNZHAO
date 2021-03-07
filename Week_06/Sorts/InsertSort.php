<?php
/**
 * 插入排序
 */
function insertionSort(&$arr)
{
    $n = count($arr);
    if ($n <= 1) return;

    for ($i = 1; $i < $n; ++$i) {
        $value = $arr[$i];
        $j = $i - 1;
        // 查找插入的位置
        for (; $j >= 0; --$j) {
            if ($arr[$j] > $value) {
                $arr[$j + 1] = $arr[$j];  // 数据移动
            } else {
                break;
            }
        }
        $arr[$j + 1] = $value; // 插入数据
    }
}

$ns = [9,3,4,2,8,5,1,7];
insertionSort($ns);
print_r($ns);