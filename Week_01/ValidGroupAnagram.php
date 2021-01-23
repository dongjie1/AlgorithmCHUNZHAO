<?php

/**
 * https://leetcode-cn.com/problems/group-anagrams/
 * 49. 字母异位词分组
 */
class Solution {

    /**
     * @param String[] $strs
     * @return String[][]
     * 用排序后的单词为key，值为排序后相同的词数组
     */
    function groupAnagrams($strs) {
        $res = [];
        foreach($strs as $str){
            $s_arr = str_split($str);
            sort($s_arr);
            $_s = implode('',$s_arr);
            $tmp[$_s][] = $str;
        }

        return $res;
    }

    /**
     * @param $strs
     * @return array
     * 字符计数方法
     */
    function groupAnagrams1($strs){
        $res = [];
        foreach ($strs as $str){
            $tmp = array();
            for($i=0; $i<strlen($str); $i++){
                $tmp[ord($str[$i])]++;
            }
            $key = '';
            for($i=ord('a'); $i<=ord('z'); $i++){
                $key .= '#'.$tmp[$i]?:0;
            }
            $key = md5($key);
            $res[$key][] = $str;
        }
        return $res;
    }
}