<?php
/**
 * 丑数ii
 * https://leetcode-cn.com/problems/ugly-number-ii/
 * https://leetcode-cn.com/problems/chou-shu-lcof/
 */

class Solution{
    function nthUglyNumber($n) {
        $p2 = $p3 = $p5 = 0;
        $dp = [1];
        for ($i=1; $i<$n; $i++) {
            $dp_2 = $dp[$p2] * 2;
            $dp_3 = $dp[$p3] * 3;
            $dp_5 = $dp[$p5] * 5;
            $dp[$i] = min($dp_2,$dp_3,$dp_5);

            if ($dp[$i] == $dp_2) {
                $p2++;
            }
            if ($dp[$i] == $dp_3) {
                $p3++;
            }
            if ($dp[$i] == $dp_5) {
                $p5++;
            }
        }

        return $dp[$n-1];
    }
}