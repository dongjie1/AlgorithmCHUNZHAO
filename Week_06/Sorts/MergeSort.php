<?php
/**
 * 归并排序
 */

function mergeSort(array $arr,$p,$r){
    $res = mergeSortRecursive($arr,$p,$r);
    print_r($res);
}
//递归
/**
 * @param array $arr 每次分隔的数组
 * @param int $p 数组的起始位置
 * @param int$r 数组的结束位置
 * @return array
 */
function mergeSortRecursive(array $arr,$p,$r){
    if($p >= $r){
        return [$arr[$r]];
    }

    //找到p,r的中间位置q
    $q = (int)(($p+$r)/2);

    $left = mergeSortRecursive($arr,$p,$q);
    $right = mergeSortRecursive($arr,$q+1,$r);

    return merge($left,$right);
}

//合并
function merge($left,$right){
    $tmp = [];
    $i = $j = 0;

    $left_legth = count($left);
    $right_legth = count($right);

    do{
        if($left[$i] <= $right[$j]){
            $tmp[] = $left[$i++];
        }else{
            $tmp[] = $right[$j++];
        }
    }while($i<$left_legth && $j<$right_legth);

    //检查哪边还有剩下的数据
    $start = $i;
    $end = $left_legth;
    $copy_arr = $left;
    if($j < $right_legth){
        $start = $j;
        $end = $right_legth;
        $copy_arr = $right;
    }

    //将剩余的数据copy到tmp
    do{
        $tmp[] = $copy_arr[$start++];
    }while($start<$end);

    return $tmp;
}

$arr = [8,4, 5,10, 6, 1, 3,12, 2,9];
$p = 0;
$r = count($arr)-1;
mergeSort($arr,$p,$r);