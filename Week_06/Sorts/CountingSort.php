<?php
/**
 * 计数排序
 */

function countingSort($arr) {
    $len = count($arr);
    $count = array_fill(0,$len,0);

    foreach ($arr as $value) {
        $count[$value]++;
    }
    $idx = 0;
    for($i=0; $i<count($count); $i++) {
        while ($count[$i] > 0) {
            $arr[$idx++] = $i;
            $count[$i]--;
        }
    }

    return $arr;
}

$arr = [9,3,2,4,6,2,8,5,1,7,6,1,8,0,7];
$arr = countingSort($arr);
echo '[',implode(',',$arr),']';