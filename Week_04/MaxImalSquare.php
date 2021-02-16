<?php
/**
 * 221. 最大正方形
 * https://leetcode-cn.com/problems/maximal-square/
 */

class Solution {

    /**
     * @param String[][] $matrix
     * @return Integer
     */
    function maximalSquare($matrix) {
        $max_side = 0;
        $row = count($matrix);
        $cols = count($matrix[0]);

        $dp = [];
        for ($i=0; $i<$row; $i++) {
            for ($j=0; $j<$cols; $j++) {
                if ($matrix[$i][$j] == '1') {
                    if ($i == 0 || $j == 0) {
                        $dp[$i][$j] = 1;
                    } else {
                        $dp[$i][$j] = min($dp[$i - 1][$j], $dp[$i - 1][$j - 1], $dp[$i][$j - 1]) + 1;
                    }
                    $max_side = max($dp[$i][$j], $max_side);
                }
            }
        }

        return $max_side*$max_side;

    }
}