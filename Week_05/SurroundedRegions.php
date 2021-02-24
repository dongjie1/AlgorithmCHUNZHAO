<?php
/**
 * 130： 被围绕的区域
 * https://leetcode-cn.com/problems/surrounded-regions/
 */

class Solution {

    /**
     * @param String[][] $board
     * @return NULL
     * 深度优先:先把边缘的O替换成#，再把中间的O换成X，把#换回O
     */
    function solve(&$board) {
        $rows = count($board);
        $cols = count($board[0]);

        for ($i=0; $i<$rows; $i++) {
            for ($j=0; $j<$cols; $j++) {
                if ($i == 0 || $j ==0 || $i==$rows-1 || $j==$cols-1) {
                    $this->dfs($board,$i,$j,$rows,$cols);//把边缘的O换成#
                }
            }
        }

        for ($i=0; $i<$rows; $i++) {
            for ($j=0; $j<$cols; $j++) {
                if ($board[$i][$j] == 'O'){//把中间的O换成X
                    $board[$i][$j] = 'X';
                }
                if ($board[$i][$j] == '#'){//把#挽回O
                    $board[$i][$j] = 'O';
                }
            }
        }
    }

    function dfs(&$board,$i,$j,$rows,$cols){
        if ($i<0 || $j<0 || $i>=$rows || $j>=$cols || $board[$i][$j]=='X' || $board[$i][$j]=='#'){
            return;
        }

        $board[$i][$j] = '#';

        $this->dfs($board,$i-1,$j,$rows,$cols);
        $this->dfs($board,$i+1,$j,$rows,$cols);
        $this->dfs($board,$i,$j-1,$rows,$cols);
        $this->dfs($board,$i,$j+1,$rows,$cols);
    }
}