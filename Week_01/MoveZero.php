<?php

/**
 * https://leetcode-cn.com/problems/move-zeroes/
 * 283. 移动零
 */
class Solution {

    /**
     * @param Integer[] $nums
     * @return NULL
     * 时间复杂度: O(n)
     * 空间复杂度: O(1)
     */
    function moveZeroes(&$nums) {
        $j=0; //不等于0的数组下标
        for($i=0; $i<count($nums); $i++){
            if($nums[$i] != 0){
                $nums[$j] = $nums[$i];
                if($i != $j){
                    $nums[$i] = 0;
                }
                $j++;
            }
        }
    }
}