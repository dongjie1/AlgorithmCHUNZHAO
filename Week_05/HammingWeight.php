<?php
/**
 * 191: 位1的个数
 * https://leetcode-cn.com/problems/number-of-1-bits/
 */

class Solution {
    /**
     * @param Integer $n
     * @return Integer
     * 使用位掩码&n != 0即说明当前位置为1
     * 时间复杂度: O(1)
     * 空间复杂度: O(1)
     */
    function hammingWeight1($n) {
        $ans = 0;
        if ($n == 0) return $ans;
        $mask = 1;//初始位掩码为1: 00000000000000000000000000000001
        for ($i=0; $i<32; $i++) {
            ($n & $mask) !=0 && $ans++;
            $mask <<= 1;//位掩码左移一位
        }
        return $ans;
    }

    /**
     * @param $n
     * $n & ($n-1) 使用$n最低位变为0，直到$n==0即说明没有1了
     * 时间复杂度: O(1)
     * 空间复杂度: O(1)
     */
    function hammingWeight($n) {
        $ans = 0;
        if ($n == 0) return $ans;

        while ($n != 0) {
            $ans++;
            $n &= ($n-1);
        }
        return $ans;
    }
}