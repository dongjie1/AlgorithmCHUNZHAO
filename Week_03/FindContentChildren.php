<?php
/**
 * 455. 分发饼干
 * https://leetcode-cn.com/problems/assign-cookies/
 */

class Solution {

    /**
     * @param Integer[] $g
     * @param Integer[] $s
     * @return Integer
     */
    function findContentChildren($g, $s) {
        $gn = count($g);
        $sn = count($s);

        if ($sn == 0) return 0;

        //先排序
        sort($g);
        sort($s);

        $num = 0;

        //尺寸最大的先满足胃口最大的: 从后向前遍历
//        $index = $sn-1;
//        for ($i=$gn-1; $i>=0; $i--){
//            if($index >=0 && $s[$index]>=$g[$i]){
//                $num++;
//                $index--;
//            }
//        }

        //胃口最小的最先满足: 从前向后遍历
        $index = 0;
        for ($i=0; $i<$sn; $i++){
            if ($index<$gn && $g[$index]<=$s[$i]){
                $num++;
                $index++;
            }
        }

        return $num;
    }
}