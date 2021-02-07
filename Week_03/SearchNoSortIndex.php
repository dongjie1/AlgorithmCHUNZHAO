<?php
/**
 * 一个半无序数组，查找无序的地方
 * @param array $nums 半无序数组
 * @return int 返回无序地方的索引
 */

function search($nums){
    $left = 0;
    $right = count($nums)-1;

    while ($left <= $right) {
        $mid = $left + intval(($right-$left)/2);
        if ($nums[$mid] > $nums[$mid+1]){//如果mid比mid+1的值大则说明mid+1是最小的,mid+1就是无序开始的地方
            return $mid+1;
        }elseif($nums[$mid] < $nums[$mid-1]){//如果mid比mid-1的值小则说明mid是最小的,mid就是无序开始的地方
            return $mid;
        }elseif($nums[$mid] > $nums[$right]){
            $left = $mid + 1;
        }else{
            $right = $mid -1;
        }
    }
    return -1;
}

$nums = [4,5,6,9,0];
$index = search($nums);
var_dump($index);