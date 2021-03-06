<?php

/**
 * 205. 同构字符串
 * https://leetcode-cn.com/problems/isomorphic-strings/
 */
class Solution {

    /**
     * @param String $s
     * @param String $t
     * @return Boolean
     */
    function isIsomorphic($s, $t) {
        $len = strlen($s);
        $ms = [];
        $mt = [];
        for ($i=0; $i<$len; $i++) {
            if (($ms[$s{$i}] && $ms[$s{$i}] != $t{$i}) || $mt[$t{$i} && $mt[$t{$i} != $s{$i}]]) {
                return false;
            }
            $ms[$s{$i}] = $t{$i};
            $mt[$s{$i}] = $s{$i};
        }
        return true;
    }
}