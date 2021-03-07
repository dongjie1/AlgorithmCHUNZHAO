<?php
/**
 * 冒泡排序
 */
function bubbleSort(&$nums=array()){
    $len = count($nums);

    if($len <= 1) return;

    for($i = 0; $i<$len; $i++){
        $flag = false; //标志是否还有交换数据，提前跳出循环标志
        for($j = 0; $j<$len-$i-1; $j++){
            if($nums[$j] > $nums[$j+1]){
                $tmp = $nums[$j];
                $nums[$j] = $nums[$j+1];
                $nums[$j+1] = $tmp;

                $flag = true;
            }
        }

        if(!$flag) break; //如果没有数据交换了，提前跳出循环
    }
}

$nums = [9,3,4,2,8,5,1,7];
bubbleSort($nums);
print_r($nums);