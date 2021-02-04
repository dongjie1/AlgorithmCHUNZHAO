<?php
/**
 * N皇后
 * https://leetcode-cn.com/problems/n-queens/
 */


class Solution {

    /**
     * @param Integer $n
     * @return String[][]
     */
    function solveNQueens($n) {
        $columns = [];
        $digonals1 = [];
        $digonals2 = [];

        $res = [];
        $queens = [];

        $this->backtrack($res,$queens,$n,0,$columns,$digonals1,$digonals2);

        $show = $this->show($res,$n);
        return $show;
    }

    /**
     * @param array $res      保存结果
     * @param array $queens     保存皇后位置
     * @param int $n
     * @param int $row  当前行
     * @param array $columns    列,放置的皇后占据的列; 皇后对应的列和行不能再放置
     * @param array $digonals1  主对角线,放置的皇后占据的主对角线(横坐标-列坐标)值; (横坐标-列坐标)值相等的坐标不能再放置皇后
     * @param array $digonals2  副对角线,放置的皇后占据的主对角线(横坐标+列坐标)值; (横坐标+列坐标)值相等的坐标不能再放置皇后
     */
    function backtrack(&$res,$queens,$n, $row, $columns,$digonals1,$digonals2){
        if ($n == $row){
            $res[] = $queens;
            return;
        }
        //查找每列中行下标为 $row 的是否可以放置
        for ($i=0; $i<$n; $i++) {
            if (!in_array($i,$columns) && !in_array($row-$i,$digonals1) && !in_array($row+$i,$digonals2)) {
                $queens[] = $i;
                $columns[] = $i;
                $digonals1[] = $row-$i;
                $digonals2[] = $row+$i;

                $this->backtrack($res,$queens,$n,$row+1,$columns,$digonals1,$digonals2);

                array_pop($queens);
                array_pop($columns);
                array_pop($digonals1);
                array_pop($digonals2);
            }
        }
    }

    function show($res,$n){
        $show = [];
        foreach ($res as $k => $queen){
            foreach ($queen as $item){
                $tmp = str_pad('',$n,'.');
                $tmp{$item} = 'Q';
                $show[$k][] = $tmp;
            }
        }
        return $show;
    }
}