<?php
/**
 * 557. 反转字符串中的单词 III
 * https://leetcode-cn.com/problems/reverse-words-in-a-string-iii/
 */

class Solution {
    function reverseWords1($s) {
        if ($s == '') return '';
        $arr = explode(' ',$s);

        $arr = array_map('self::reverse',$arr);

        $s = implode(' ',$arr);
        return $s;
    }

    /**
     * @param String $s
     * @return String
     */
    function reverseWords2($s) {
        if ($s == '') return '';

        $tmp = '';
        $ans = '';
        for ($i=0; $i<strlen($s); $i++) {
            if ($s{$i} != ' ') {
                $tmp .= $s{$i};
            }else{
                $ans .= $this->reverse($tmp) . ' ';
                $tmp = '';
            }
        }
        $ans .= $this->reverse($tmp);
        return $ans;
    }

    private function reverse($s) {
        if ($s == '') return '';

        $len = strlen($s);
        $i=0; $j=$len-1;
        while ($i <= $j) {
            [$s{$i},$s{$j}] = [$s{$j}, $s{$i}];
            $i++;
            $j--;
        }
        return $s;
    }
}