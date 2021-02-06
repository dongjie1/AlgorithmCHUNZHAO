<?php
/**
 * 55. 跳跃游戏
 * https://leetcode-cn.com/problems/jump-game/
 */

class Solution {

    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    function canJump($nums) {
        $len = count($nums);
        if ($len < 2) return true;//如果总距离是1则总能到达

        $max_distance = $nums[0]; //初始化可以到达的最大距离
        for($i=0; $i<$len; $i++) {
            if ($i <= $max_distance) {//当前位置可以到达
                $max_distance = max($max_distance, $i+$nums[$i]);//更新可以到达的最大距离
            }else{
                break;
            }
        }

        return $max_distance >= $len-1;
    }
}