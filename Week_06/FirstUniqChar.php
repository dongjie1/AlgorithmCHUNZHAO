<?php
/**
 * 387. 字符串中的第一个唯一字符
 * https://leetcode-cn.com/problems/first-unique-character-in-a-string/
 */

class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function firstUniqChar($s) {
        if ($s == '') return -1;
        $m = [];
        for ($i=0; $i<strlen($s); $i++) {
            $m[$s{$i}]++;
        }
        for ($i=0; $i<strlen($s); $i++) {
            if ($m[$s{$i}] == 1) {
                return $i;
            }
        }
        return -1;
    }
}
//leetcode submit region end(Prohibit modification and deletion)