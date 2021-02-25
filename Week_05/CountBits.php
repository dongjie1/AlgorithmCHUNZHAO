<?php
/**
 * 338. 比特位计数
 * https://leetcode-cn.com/problems/counting-bits/
 */

class Solution {
    /**
     * @param $num
     * @return array
     * 判断奇偶
     * 奇数1的个数=前一个数的1的个数+1
     * 偶数1的个数=i/2的数的1的个数
     * 时间复杂度: O(n)
     * 空间复杂度: O(n)
     */
    function countBits($num) {
        $result[0] = 0;
        if ($num == 0 ) return $result;

        for ($i=1; $i<=$num; $i++) {
            if ($i & 1 == 1){//奇数
                $result[$i] = $result[$i-1]+1; //1的个数=前一个数的1的个数+1
            }else{//偶数
                $result[$i] = $result[intval($i/2)];//1的个数=i/2位置的数的1的个数
            }
        }
        return $result;
    }

    /**
     * @param $num
     * @return array
     * 使用 n&(n-1)最低位置0计算每个数的1的个数
     * 时间复杂度: O(n)
     * 空间复杂度: O(n)
     */
    function countBits2($num) {
        $result[0] = 0;
        if($num == 0) return $result;

        for ($i=1; $i<=$num; $i++){
            $result[$i] = $this->popcount($i);
        }
        return $result;
    }

    /**
     * 使用 n&(n-1)最低位置0计算num的1的个数
     * @param $num
     * @return int
     */
    function popcount($num) {
        $n = 0;
        while ($num != 0){
            $n++;
            $num &= $num -1; //每次最低位置0,直到num=0
        }
        return $n;
    }

    /**
     * @param $num
     * @return array
     * 时间复杂度: O(n)
     * 空间复杂度: O(n)
     */
    function countBits3($num) {
        $result[0] = 0;
        if($num == 0) return $result;

        for ($i=1; $i<=$num; $i++){
            $result[$i] = $result[$i&($i-1)] + 1;//i的1的个数=i&(i-1)的1的个数+1
        }
        return $result;
    }
}