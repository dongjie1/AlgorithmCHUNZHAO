<?php
/**
 * 56. 合并区间
 * https://leetcode-cn.com/problems/merge-intervals/
 */

class Solution {

    /**
     * @param Integer[][] $intervals
     * @return Integer[][]
     */
    function merge($intervals) {
        array_multisort($intervals);//先排序
        $n = 0;
        $ans = [];
        foreach ($intervals as $i => $interval){//再合并
            if ($ans[$n-1] && $ans[$n-1][1] >= $interval[0]){
                $end = max($ans[$n-1][1],$interval[1]);
                $ans[$n-1][1] = $end;
            }else{
                $ans[$n] = $interval;
                $n++;
            }
        }
        return $ans;
    }
}