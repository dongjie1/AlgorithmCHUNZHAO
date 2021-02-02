<?php
/**
 * 电话号码的字母组合
 * https://leetcode-cn.com/problems/letter-combinations-of-a-phone-number/
 */

class Solution {
    private $letter_map = array(
        2 => 'abc',
        3 => 'def',
        4 => 'ghi',
        5 => 'jkl',
        6 => 'mno',
        7 => 'pqrs',
        8 => 'tuv',
        9 => 'wxyz'
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
        $letters = str_split($letters);

        foreach ($letters as $char) {
            //drill down
            $this->search($res,$digits, $s.$char,$i+1);
        }

        //revert states
    }
}