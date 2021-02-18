<?php
/**
 * 403. 青蛙过河
 * https://leetcode-cn.com/problems/frog-jump/
 */

class Solution {

    /**
     * @param Integer[] $stones
     * @return Boolean
     */
    function canCross($stones) {
        $m = [];
        foreach ($stones as $pos) {
            $m[$pos] = $pos==0?[0]:[];
        }

        for ($i=0; $i<count($stones); $i++) {
            foreach($m[$stones[$i]] as  $k) {
                for($step=$k-1; $step<=$k+1; $step++) {
                    if($step > 0 && isset($m[$step+$stones[$i]])) {
                        $m[$step+$stones[$i]][] = $step;
                    }
                }
            }
        }

        return count($m[$stones[count($stones)-1]]) > 0;

    }
}