<?php
class Solution {

    /**
     * @param Integer[] $digits
     * @return Integer[]
     * 时间复杂度: O(n)
     * 空间复杂度: O(1)
     *
     */
    function plusOne($digits) {
        if(empty($digits)) return [];

        $len = count($digits)-1;
        for($i=$len; $i>=0; $i--){
            $digits[$i]++;
            $digits[$i] %= 10;
            if($digits[$i] != 0){
                return $digits;
            }elseif($i == 0){//遍历完了digits[$i]=0说明还有进位,在数组前面插入1
//                array_unshift($digits,1);
                $digits[0] = 1;
                $digits[] = 0;
            }
        }

        return $digits;
    }
}