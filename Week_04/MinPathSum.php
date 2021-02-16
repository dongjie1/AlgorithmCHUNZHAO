<?php
/**
 * 64. 最小路径和
 * https://leetcode-cn.com/problems/minimum-path-sum/
 */

class Solution {

    /**
     * @param Integer[][] $grid
     * @return Integer
     *
     * dp:
     * i==0 && j>0 时 dp[0][j] = dp[0][j-1]+grid[0][j]
     * i>0 && j==0 时 dp[i][j] = dp[i-1][0]+grid[i][0]
     * j>0 && j>0 时 dp[i][j] = min(dp[i-1][j],dp[i][j-1])+grid[i][j]
     */
    function minPathSum($grid) {
        $m = count($grid);
        $n = count($grid[0]);

        $dp[0][0] = $grid[0][0];
        for ($i=1; $i<$m; $i++) {
            for ($j=1; $j<$n; $j++) {
                if ($i == 0 && $j>0) {
                    $dp[0][$j] = $dp[0][$j-1] + $grid[0][$j];
                }
                if ($i > 0 && $j == 0) {
                    $dp[$i][0] = $dp[$i-1][0] + $grid[$i][0];
                }
                if ($i > 0 && $j > 0) {
                    $dp[$i][$j] = min($dp[$i-1][$j],$dp[$i][$j-1]) + $grid[$i][$j];
                }
            }
        }

        return $dp[$m-1][$n-1];
    }
}