<?php
/**
 * 200: 岛屿数量
 * https://leetcode-cn.com/problems/number-of-islands/
 */

include_once 'UnionFind2.php';

class Solution{
    /**
     * @param $grid
     * 使用并查集:
     * 相邻的陆地（只需要向右看和向下看）合并，只要发生过合并，岛屿的数量就减少 1；
     * 在遍历的过程中，同时记录空地的数量；
     * 并查集中连通分量的个数 - 空地的个数，就是岛屿数量。
     */
    function numIsLands($grid){
        $rows = count($grid);
        $cols = count($grid[0]);

        if ($rows == 0) return 0;

        $spaces = 0;//空地的数量

        $uf = new UnionFind($rows * $cols);//初始化变为1维数组数量
        for ($i=0; $i<$rows; $i++) {
            for ($j=0; $j<$cols; $j++) {
                if ($grid[$i][$j] == 0){
                    $spaces++;
                }elseif ($grid[$i][$j] == 1) {//如果此位置的右边和下边为1则合并
                    $idx = $i*$cols+$j;//当前位置变成1维数组的索引
                    $down = ($i+1)*$cols+$j;//下边位置变成1维数组的索引
                    $right = $i*$cols+($j+1);//右面位置变成1维数组的索引

                    if ($i+1 < $rows && $grid[$i+1][$j] == 1){//下边为1合并
                        $uf->merge($idx,$down);
                    }
                    if ($j+1 < $cols && $grid[$i][$j+1] == 1){//右边为1合并
                        $uf->merge($idx,$right);
                    }

                }
            }
        }
        return $uf->getNums()-$spaces;
    }
}