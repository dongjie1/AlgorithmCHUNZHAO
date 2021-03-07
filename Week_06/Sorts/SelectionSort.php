<?php
/**
 * 选择排序
 */
function selectionSort(&$arr){
    $len = count($arr);

    if($len <= 1) return;

    for ($i=0; $i<$len; $i++){
        $p = $i; //先假设最小值的位置

        //查找最小值位置
        for($j=$i+1; $j<$len; $j++){
            if($arr[$p] > $arr[$j]){
                $p = $j;
            }
        }

        //交换数据
        $tmp = $arr[$p];
        $arr[$p] = $arr[$i];
        $arr[$i] = $tmp;
    }
}