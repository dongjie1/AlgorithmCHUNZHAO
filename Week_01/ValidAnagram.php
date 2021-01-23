<?php

/**
 * https://leetcode-cn.com/problems/valid-anagram/description/
 * 242. 有效的字母异位词
 */
class Solution {

    /**
     * @param String $s
     * @param String $t
     * @return Boolean
     * 直接排序后比较
     */
    function isAnagram2($s, $t) {
        if(strlen($s) != strlen($t)) return false;

        $s_arr = str_split($s);
        $t_arr = str_split($t);
        sort($s_arr);
        sort($t_arr);

        $s1 = implode('',$s_arr);
        $t1 = implode('',$t_arr);
        return $s1 == $t1;
    }

    /**
     * @param $s
     * @param $t
     * @return bool
     * 使用额外的空间保存$s里每个字母出现的次数
     * 时间复杂度: O(n)
     * 空间复杂度: O(n)
     */
    function isAnagram($s, $t){
        if(strlen($s) != strlen($t)) return false;
        if(strlen($s) == 1 && strlen($t) == 1){
            return $s==$t;
        }

        $tmp = [];
        for($i=0; $i<strlen($s); $i++){
            $tmp[$s[$i]] += 1;
        }

        for($i=0; $i<strlen($t); $i++){
            $tmp[$t[$i]] -= 1;
            if($tmp[$t[$i]] < 0){
                return false;
            }
        }

        return true;
    }
}