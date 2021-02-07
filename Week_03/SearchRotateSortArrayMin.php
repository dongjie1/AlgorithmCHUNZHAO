<?php
/**
 * 153. 寻找旋转排序数组中的最小值
 * https://leetcode-cn.com/problems/find-minimum-in-rotated-sorted-array/
 */

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function findMin($nums) {
        $len = count($nums);
        if ($len == 1){
            return $nums[0];
        }
        if ($len == 2){
            return min($nums[0],$nums[1]);
        }

        $left = 0;
        $right = $len - 1;
        if($nums[$left] < $nums[$right]){
            return $nums[0];
        }

        while ($left <= $right) {
            $mid = intval(($left+$right)/2);
            if($nums[$mid] > $nums[$mid+1]) {
                return $nums[$mid+1];
            }elseif ($nums[$mid] < $nums[$mid-1]){
                return $nums[$mid];
            }elseif($nums[$mid] > $nums[$right]){
                $left = $mid + 1;
            }else{
                $right = $mid - 1;
            }
        }

        return null;
    }
}