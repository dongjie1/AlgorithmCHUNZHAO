<?php
/**
 * 200: 岛屿数量
 * https://leetcode-cn.com/problems/number-of-islands/
 */

include_once 'UnionFind2.php';

class Solution{
    /**
     * @param $grid
     * 使用并查集
     */
    function numIsLands($grid){
        $len = count($grid);

        if ($len == 1) {
            if ($grid[0][0] == '0') return 0;
            if ($grid[0][0] == '1') return 1;
        }

        $uf = new UnionFind($len);
        for ($i=0; $i<$len; $i++) {
            for ($j=$i+1; $j<$len; $j++) {
                if ($grid[$i][$j] == 1) {
                    $uf->merge($i,$j);
                }
            }
        }
        return $uf->getNums();
    }
}