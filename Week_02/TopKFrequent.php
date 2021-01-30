<?php
/**
 * 前K个高频元素
 * https://leetcode-cn.com/problems/top-k-frequent-elements/
 */

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer[]
     * O(NlogN)
     */
    function topKFrequent($nums, $k) {
        $m = [];
        foreach($nums as $num){
            $m[$num]++;
        }

        $ans = [];
        arsort($m);

        foreach($m as $i => $v){
            $ans[] = $i;
            if (count($ans) == $k) break;
        }

        return $ans;
    }

    function topKFrequent2($nums, $k) {


    }
}