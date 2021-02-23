<?php
/**
 * 109: 颠倒二进制位
 * https://leetcode-cn.com/problems/reverse-bits/
 */

class Solution {
    /**
     * @param Integer $n
     * @return Integer
     * 十进制数转为二进制字符串反转后再转回十进制
     * 时间复杂度: O(1)
     * 空间复杂度: O(1)
     */
    function reverseBits1($n) {
        if ($n == 0 || $n == 4294967295) return $n;

        $s = decbin($n);
        $l = 0; $r = strlen($s)-1;
        while ($l < $r){
            [$s{$l},$s{$r}] = [$s{$r},$s{$l}];
            $l++;
            $r--;
        }
        $s = str_pad($s,32,0);//补全32位
        return bindec($s);
    }

    /**
     * @param $num
     * @return int
     * 分治合并
     * 反转左右16位，然后反转每个16位中的左右8位，依次类推，最后反转2位，反转后合并即可，利用位运算在原地反转
     * 时间复杂度: O(1)
     * 空间复杂度: O(1)
     */
    function reverseBits2($num) {
        $num = ($num >> 16) | ($num << 16);
        $num = (($num & 0xff00ff00) >> 8) | (($num & 0x00ff00ff) << 8);
        $num = (($num & 0xf0f0f0f0) >> 4) | (($num & 0x0f0f0f0f) << 4);
        $num = (($num & 0xcccccccc) >> 2) | (($num & 0x33333333) << 2);
        $num = (($num & 0xaaaaaaaa) >> 1) | (($num & 0x55555555) << 1);

        return $num;

    }

    /**
     * @param $num
     * @return int
     * 反转后的结果ans: ans = ans * 2 + num % 2; num = num/2;
     */
    function reverseBits3($num) {
        $ans = 0;
        for ($i=0; $i<32; $i++) {
            $ans = ($ans << 1) + ($num & 1);
            $num >>= 1;
        }
        return $ans;
    }

}