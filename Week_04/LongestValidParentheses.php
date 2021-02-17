<?php
/**
 * 32. 最长有效括号
 * https://leetcode-cn.com/problems/longest-valid-parentheses/
 */

class Solution {

    /**
     * @param String $s
     * @return Integer
     * 动态规划:
     * dp[i] = 2 + dp[i-1] + dp[i-dp[i-1]-2]
     * 时间复杂度： O(n)
     * 空间复杂度： O(n)
     */
    function longestValidParentheses1($s) {
        $len = strlen($s);
        if ($len <= 1) return 0;
        $dp = [0];//dp初始都为0
        for ($i=0; $i<$len; $i++){
            //遇到 ) 时计算dp, $i-$dp[$i-1]-1 是与 ) 对称的位置
            if ($s{$i} == ')' && $i-$dp[$i-1]-1>=0 && $s{($i-$dp[$i-1]-1)} == '(') {
                $dp[$i] = 2 + $dp[$i-1] + $dp[$i-$dp[$i-1]-2];
            }
        }
        return max($dp);
    }

    /**
     * @param $s
     * 使用栈
     * 时间复杂度： O(n)
     * 空间复杂度： O(n)
     */
    function longestValidParentheses2($s) {
        $len = strlen($s);
        if($len <= 1) return 0;

        $stack = [-1];
        $max_length = 0;
        for ($i=0; $i<$len; $i++) {
            if ($s{$i} == '(') {
                $stack[] = $i;
            }else{
                array_pop($stack);
                if (empty($stack)){
                    $stack[] = $i;
                }else{
                    $length = $i - $stack[count($stack)-1];
                    $max_length = max($length,$max_length);
                }
            }
        }
        return $max_length;
    }

    /**
     * @param $s
     * 统计左右括号出现次数，顺序和逆序都遍历一次
     */
    function longestValidParentheses3($s){
        $len = strlen($s);
        if($len <= 1) return 0;

        $left_num = 0;
        $right_num = 0;
        $max_length = 0;

        //从前到后顺序遍历
        for ($i=0; $i<$len; $i++) {
            if ($s{$i} == '(') $left_num++;
            if ($s{$i} == ')') $right_num++;
            if ($left_num == $right_num){
                $max_length = max($max_length,$left_num + $right_num);
            }
            if ($right_num > $left_num) {
                $left_num = $right_num = 0;
            }
        }

        //从后到前逆序遍历
        //先重置左右计数
        $left_num = $right_num = 0;
        for ($i=$len-1; $i>=0; $i--) {
            if ($s{$i} == '(') $left_num++;
            if ($s{$i} == ')') $right_num++;
            if ($left_num == $right_num) {
                $max_length = max($max_length,$left_num + $right_num);
            }
            if ($left_num > $right_num){
                $left_num = $right_num = 0;
            }
        }

        return $max_length;
    }
}