<?php
/**
 * 36. 有效的数独
 * https://leetcode-cn.com/problems/valid-sudoku/
 */

class Solution {

    /**
     * @param String[][] $board
     * @return Boolean
     */
    function isValidSudoku($board) {
        $rows = [];//记录行数据
        $cols = [];//记录列数据
        $box = [];//记录9宫格数据

        for ($i=0; $i<9; $i++){
            for ($j=0; $j<9; $j++) {
                $n = $board[$i][$j];
                if ($n == '.') continue;

                if ($rows[$i][$n]) return false;
                if ($cols[$j][$n]) return false;

                $box_index = intval($i/3)*3 + intval($j/3);//9宫格索引
                if ($box[$box_index][$n]) return false;

                $rows[$i][$n] = 1;
                $cols[$j][$n] = 1;
                $box[$box_index][$n] = 1;
            }
        }
        return true;
    }
}