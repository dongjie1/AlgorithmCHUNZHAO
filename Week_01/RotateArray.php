<?php
/**
 * https://leetcode-cn.com/problems/rotate-array/
 * 189. 旋转数组
 */
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return NULL
     * 时间复杂度: O(n)
     * 空间复杂度: O(1)
     */
    function rotate(&$nums, $k) {
        for($i=0; $i<$k; $i++){
            $n = array_pop($nums);
            array_unshift($nums,$n);
        }
    }

    /**
     * @param $nums
     * @param $k
     * 时间复杂度: O(1)
     * 空间复杂度: O(n)
     */
    function rotate2(&$nums,$k){
        $len = count($nums);
        $arr1 = array_slice($nums,0,$len-$k);
        $arr2 = array_slice($nums,$len-$k,$k);
        $nums = array_merge($arr2,$arr1);
    }

    /**
     * @param $nums
     * @param $k
     * 时间复杂度: O(n)
     * 空间复杂度: O(n)
     */
    function rotate3(&$nums,$k){
        $tmp = $nums;
        $len = count($nums);
        for ($i=0; $i<$len; $i++){
            $nums[($i+$k)%$len] = $tmp[$i];
        }
    }
}