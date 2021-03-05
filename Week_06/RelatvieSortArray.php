<?php
/**
 * 1122. 数组的相对排序
 * https://leetcode-cn.com/problems/relative-sort-array/
 */

class Solution {
    /**
     * @param Integer[] $arr1
     * @param Integer[] $arr2
     * @return Integer[]
     * 使用计数排序
     */
    function relativeSortArray($arr1, $arr2) {
        if (empty($arr1) || empty($arr2)) return [];

        $cnt = array_fill(0,1000,0);
        foreach($arr1 as $a1) {
            $cnt[$a1]++;
        }

        $i = 0;
        //先放置arr2
        foreach ($arr2 as $a2) {
            while ($cnt[$a2] > 0) {
                $arr1[$i++] = $a2;
                $cnt[$a2]--;
            }
        }
        //最后放置cnt里剩下的
        foreach ($cnt as $a => $n){
            while ($n > 0){
                $arr1[$i++] = $a;
                $n--;
            }
        }

        return $arr1;
    }
}