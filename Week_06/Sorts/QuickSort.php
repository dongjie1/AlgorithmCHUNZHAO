<?php

/**
 * 快速排序
 * @param $arr
 * @return mixed
 */
function quickSort($arr){
    $n = count($arr);
    quickSortRecursive($arr,0,$n-1);
    return $arr;
}
function quickSortRecursive(&$arr,$l,$r){
    if ($l >= $r) return;
    $p = partition($arr,$l,$r);
    quickSortRecursive($arr,$l,$p-1);
    quickSortRecursive($arr,$p+1,$r);
}
function partition(&$arr,$l,$r) {
    $pivot = $arr[$r];
    $i = $l;
    for ($j=$l; $j<$r; $j++){
        if ($arr[$j] < $pivot){
            [$arr[$i],$arr[$j]] = [$arr[$j],$arr[$i]];
            $i++;
        }
    }
    [$arr[$r],$arr[$i]] = [$arr[$i],$arr[$r]];
    return $i;
}

