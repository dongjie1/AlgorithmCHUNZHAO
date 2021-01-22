<?php
class Solution {

    /**
     * @param Integer[] $height
     * @return Integer
     * 使用栈
     * 时间复杂度: O(n)
     * 空间复杂度: O(n)
     */
    function trap($height) {
        $ans = 0;
        $stack = [];//使用栈保存索引下标

        for ($i=0; $i<count($height); $i++){
            while(!empty($stack) && $height[$stack[count($stack)-1]] < $height[$i]){
                $cur = array_pop($stack);
                if(empty($stack)) break;

                $l = $stack[count($stack)-1];
                $r = $i;
                $h = min($height[$l],$height[$r]) - $height[$cur];
                $ans += $h * ($r - $l - 1);
            }
            $stack[] = $i;
        }
        return $ans;
    }
}