<?php
/**
 * 231: 2的幂
 * https://leetcode-cn.com/problems/power-of-two/
 */

class Solution {

    /**
     * @param Integer $n
     * @return Boolean
     * 如果是2的幂的话二进制里只有一个1其它都是0，满足($n & -$n)==$n
     * 时间复杂度: O(1)
     * 空间复杂度: O(1)
     */
    function isPowerOfTwo1($n) {
        if ($n <= 0 ) return false;

        return ($n & -$n) == $n;
    }

    /**
     * @param $n
     * @return bool
     * 当 $n>0 时，满足$n的最高位为1，其它位为0，$n-1最高位为0,其它位为1，所有 ($n & ($n-1)) == 0
     * 时间复杂度: O(1)
     * 空间复杂度: O(1)
     */
    function isPowerOfTwo($n) {
        if ($n <= 0 ) return false;

        return ($n & ($n-1)) == 0;
    }
}