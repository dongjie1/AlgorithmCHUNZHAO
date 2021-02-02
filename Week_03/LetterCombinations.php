<?php
/**
 * 电话号码的字母组合
 * https://leetcode-cn.com/problems/letter-combinations-of-a-phone-number/
 */

class Solution {
    private $letter_map = array(
        2 => ['a','b','c'],
        3 => ['d','e','f'],
        4 => ['g','h','i'],
        5 => ['j','k','l'],
        6 => ['m','n','o'],
        7 => ['p','q','r','s'],
        8 => ['t','u','v'],
        9 => ['w','x','y','z']
    );
    /**
     * @param String $digits
     * @return String[]
     */
    function letterCombinations($digits) {
        $res = [];
        if (empty($digits)) return $res;

        $this->search($res,$digits,'',0);
        return $res;
    }

    function search(&$res, $digits, $s, $i){
        //terminator
        if ($i == strlen($digits)){
            $res[] = $s;
            return;
        }

        //process
        $letters = $this->letter_map[$digits{$i}];

        foreach ($letters as $char) {
            //drill down
            $this->search($res,$digits, $s.$char,$i+1);
        }

        //revert states
    }
}