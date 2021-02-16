<?php
/**
 * 120. 三角形最小路径和
 * https://leetcode-cn.com/problems/triangle/
 */

class Solution {

    /**
     * @param Integer[][] $triangle
     * @return Integer
     * 自底向上递推
     * 时间复杂度: O(n^2)
     * 空间复杂度: O(n^2)
     */
    function minimumTotal1($triangle) {
        $leni = count($triangle);

        $dp = $triangle;
        for ($i=$leni-2; $i>=0; $i--){
            $lenj = count($dp[$i]);
            for ($j=0; $j<$lenj; $j++){
                $dp[$i][$j] += min($dp[$i+1][$j],$dp[$i+1][$j+1]);
            }
        }
        return $dp[0][0];
    }

    /**
     * @param $triangle
     * @return mixed
     * 自底向上递推优化空间
     * 时间复杂度: O(n^2)
     * 空间复杂度: O(n)
     */
    function minimumTotal2($triangle) {
        $leni = count($triangle);

        $dp = [];
        for ($i=$leni-1; $i>=0; $i--) {
            for ($j=0; $j<=$i; $j++) {
                $dp[$j] = min($dp[$j],$dp[$j+1]) + $triangle[$i][$j];
            }
        }
        return $dp[0];
    }

    /**
     * 自顶向下递归
     */
    private $m = [];
    function minimumTotal($triangle) {
        return $this->dfs($triangle,0,0);
    }
    function dfs($triangle,$i,$j) {
        if ($i == count($triangle)) return 0;

        if (isset($this->m[$i][$j])) {
            return $this->m[$i][$j];
        }

        $this->m[$i][$j] = min($this->dfs($triangle,$i+1,$j),$this->dfs($triangle,$i+1,$j+1)) + $triangle[$i][$j];
        return $this->m[$i][$j];
    }
}