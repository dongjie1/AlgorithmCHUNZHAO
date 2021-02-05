<?php
/**
 * 众数
 * https://leetcode-cn.com/problems/majority-element/
 */

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     * 使用数组保存数据出现的次数
     */
    function majorityElement2($nums) {
        $m = [];
        $len = count($nums);
        foreach ($nums as $num){
            $m[$num]++;
            if($m[$num] > intval($len/2)) return $num;
        }
        return 0;
    }

    /**
     * @param $nums
     * @return mixed
     * 因为众数数量大于len/2,所以排序后，索引为len/2的即为众数
     */
    function majorityElement3($nums){
        sort($nums);
        $len = count($nums);
        return $nums[$len/2];
    }

    /**
     * 摩尔投票法
     * @param $nums
     */
    function majorityElement($nums){
        $count = 0;
        $candidate = $nums[0];

        foreach ($nums as $num) {
            if ($count == 0) {
                $candidate = $num;
            }
            $count += ($num == $candidate) ? 1 : -1;
        }
        return $candidate;
    }
}