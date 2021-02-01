<?php
/**
 * 子集
 * https://leetcode-cn.com/problems/subsets/
 */

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     * 回溯
     */
    function subsets($nums) {
        $res = [];
        if (empty($nums)) return $res;

        $this->dfs($res,$nums,[],0);
        return $res;
    }
    function dfs(&$ans,$nums,$list,$index){
        //terminator
        if ($index == count($nums)) {
            $ans[] = $list;
            return;
        }

        //process logic , drill down
        $this->dfs($ans,$nums,$list,$index+1);//未选择当前数
        $list[] = $nums[$index];
        $this->dfs($ans,$nums,$list,$index+1);//选择当前数

        //revert states
        array_pop($list);//重置$list状态
    }



}