<?php
/**
 * 647: 回文子串
 * https://leetcode-cn.com/problems/palindromic-substrings/
 */

class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function countSubstrings($s) {
        $n = strlen($s);
        if($n == 1) return 1;
        $ans = 0;

        for ($i=0; $i<$n*2-1; $i++) {
            $l = intval($i/2);
            $r = intval($i/2) + $i%2;
            while ($l >=0 && $r<$n && $s{$l} == $s{$r}) {
                $l--;
                $r++;
                $ans++;
            }
        }
        return $ans;
    }
}