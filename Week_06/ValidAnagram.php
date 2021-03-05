<?php
/**
 * 242: 有效的字母异位词
 * https://leetcode-cn.com/problems/valid-anagram/
 */

class Solution {
    /**
     * @param $s
     * @param $t
     * @return bool
     * 使用计数排序: 使用额外的空间保存$s里每个字母出现的次数
     * 时间复杂度: O(n)
     * 空间复杂度: O(n)
     */
    function isAnagram($s, $t){
        $len1 = strlen($s);
        $len2 = strlen($t);
        if ($len1 != $len2) return false;
        if ($len1 == 1 && $len1 == $len2){
            return $s == $t;
        }

        $cnt = [];
        for ($i=0; $i<$len1; $i++) {
            $cnt[$s{$i}]++;
        }

        for ($j=0; $j<$len2; $j++) {
            $cnt[$t{$j}] -= 1;
            if($cnt[$t{$j}] < 0){ //当前字母的数量和在s里的数量不一样
                return false;
            }
        }

        return true;
    }
}