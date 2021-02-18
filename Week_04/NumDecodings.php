<?php
/**
 * 91. 解码方法
 * https://leetcode-cn.com/problems/decode-ways/
 */
class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function numDecodings($s) {
        if ($s{0} == '0') return 0;

        $pre = 1; $cur = 1;
        $len = strlen($s);
        for ($i=1; $i<$len; $i++) {
            $tmp = $cur;
            if ($s{$i} == '0') {
                if ($s{$i-1}== '1' || $s{$i-1} == '2')
                    $cur = $pre;
                else
                    return 0;
            }elseif($s{$i-1} == '1' || ($s{$i-1} == '2' && $s{$i}>='1' && $s{$i}<=6)){
                $cur += $pre;
            }
            $pre = $tmp;
        }
        return $cur;
    }
}