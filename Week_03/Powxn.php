<?php
/**
 * Pow(x, n)
 * https://leetcode-cn.com/problems/powx-n/
 */


class Solution {

    /**
     * @param Float $x
     * @param Integer $n
     * @return Float
     */
    function myPow($x, $n) {
        if ($n < 0){//当$n为负数的处理
            $x = 1 / $x;
            $n = -$n;
        }
        return $this->powxn($x ,$n);
    }

    function powxn($x, $n){
        if ($n == 0) return 1;
        if ($n == 1) return $x;

        $res = $this->powxn($x, $n / 2); //每次只计算$x的$n/2次幂

        $res = $res * $res;//结果为每次结果的平方: 2^10 = 2^5 * 2^5
        if ($n % 2 == 1){//如果$n为奇数则再乘以$x本身: 2^7 = 2^3 * 2^3 * 2
            $res *= $x;
        }
        return $res;
    }
}