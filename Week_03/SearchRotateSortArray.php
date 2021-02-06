<?php
/**
 * 33. 搜索旋转排序数组
 * https://leetcode-cn.com/problems/search-in-rotated-sorted-array/
 */

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    function search($nums, $target) {
        if (empty($nums)) return -1;

        $len = count($nums);
        if($len == 1){
            return $target==$nums[0] ? 0 : -1;
        }

        $left = 0;
        $right = $len-1;
        while($left <= $right){
            $mid = $left + intval(($right-$left) /2);
            if($nums[$mid] == $target){//找到即返回
                return $mid;
            }elseif($nums[$mid] >= $nums[0]){//左侧是升序段
                if ($nums[$mid] > $target && $target>=$nums[0]){//target在左侧升序段里
                    $right = $mid - 1;
                }else{//不在左侧
                    $left = $mid + 1;
                }
            }else{
                if ($nums[$mid] < $target && $nums[$len-1] >= $target){//在右侧
                    $left = $mid + 1;
                }else{
                    $right = $mid - 1;
                }
            }
        }

        return -1;
    }
}