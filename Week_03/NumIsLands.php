<?php
/**
 * 200. 岛屿数量
 * https://leetcode-cn.com/problems/number-of-islands/
 */

class Solution {

    /**
     * @param String[][] $grid
     * @return Integer
     */
    function numIslands($grid) {
        if (empty($grid)) return 0;

        $leni = count($grid);
        $lenj = count($grid[0]);

        $count = 0;
        for($i=0; $i<$leni; $i++){
            for ($j=0; $j<$lenj; $j++){
                if ($grid[$i][$j] == '1'){//当当前值为1时,数量+1,设置当前位置的上下左右都为0
                    $this->marking($grid,$i,$j,$leni,$lenj);//递归设置当前位置的上下左右及相邻为1的上下左右都为0
                    $count++;//数量+1
                }
            }
        }
        return $count;
    }

    /**
     * 递归设置当前位置的上下左右及相邻为1的上下左右都为0
     * @param $grid array
     * @param $i    int 行索引
     * @param $j    int 列索引
     * @param $leni int 行长度
     * @param $lenj int 列长度
     */
    function marking(&$grid,$i,$j,$leni,$lenj){
        if ($i<0 || $j<0 || $i>=$leni || $j>=$lenj || $grid[$i][$j]!='1'){
            return;
        }

        $grid[$i][$j] = '0';
        $this->marking($grid,$i-1,$j,$leni,$lenj);
        $this->marking($grid,$i+1,$j,$leni,$lenj);
        $this->marking($grid,$i,$j-1,$leni,$lenj);
        $this->marking($grid,$i,$j+1,$leni,$lenj);

    }
}