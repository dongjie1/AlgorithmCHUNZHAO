<?php
/**
 * 680. 验证回文字符串 Ⅱ
 * https://leetcode-cn.com/problems/valid-palindrome-ii/
 */

class Solution {
    /**
     * @param String $s
     * @return Boolean
     */
    function validPalindrome($s) {
        $len = strlen($s);
        $i=0; $j=$len-1;
        if ($this->valid($s,$i,$j)) return true;

        while ($i <= $j) {
            if ($s{$i} != $s{$j}) {
                return $this->valid($s,$i,$j-1) || $this->valid($s,$i+1,$j);
            }
            $i++;
            $j--;
        }
        return true;
    }

    function valid($s,$i,$j) {
        while ($i <= $j) {
            if ($s{$i} != $s{$j}) return false;
            $i++;
            $j--;
        }
        return true;
    }
}