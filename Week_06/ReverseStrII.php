<?php
/**
 * 541. 反转字符串 II
 * https://leetcode-cn.com/problems/reverse-string-ii/
 */

class Solution {
    /**
     * @param String $s
     * @param Integer $k
     * @return String
     */
    function reverseStr($s, $k) {
        $len = strlen($s);
        $ans = '';
        for ($i=0; $i<$len; $i+=(2*$k)) {
            if ($i+$k < $len) {//只反转i~i+k
                $tmp = $this->reverse(substr($s,$i,$k));
                $ans .= $tmp . substr($i+$k,$k);
                continue;
            }
            //剩下的全部反转
            $ans .= $this->reverse(substr($s,$i));
        }
        return $ans;
    }

    private function reverse($s) {
        if ($s == '') return $s;
        $len = strlen($s);
        $i = 0; $j = $len - 1;
        while ($i <= $j) {
            [$s{$i}, $s{$j}] = [$s{$j}, $s{$i}];
            $i++;
            $j--;
        }
        return $s;
    }
}