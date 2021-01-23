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

    /**
     * @param $height
     * @return int
     * 双指针实现
     * 时间复杂度: O(n)
     * 空间复杂度: O(1)
     */
    function trap2($height){
        $ans = 0;
        $left = 0; $right = count($height)-1;
        $left_max = $right_max = 0;

        while ($left < $right){
            if($height[$left] < $height[$right]) {
                if ($height[$left] >= $left_max) {
                    $left_max = $height[$left];
                } else {
                    $ans += $left_max - $height[$left];
                }
                $left++;
            }else{
                if ($height[$right] >= $right_max){
                    $right_max = $height[$right];
                }else{
                    $ans += $right_max - $height[$right];
                }
                $right--;
            }
        }
        return $ans;
    }
}