<?php
/**
 * 122. 买卖股票的最佳时机2
 * https://leetcode-cn.com/problems/best-time-to-buy-and-sell-stock-ii/
 */

class Solution {

    /**
     * @param Integer[] $prices
     * @return Integer
     */
    function maxProfit($prices) {
        $len = count($prices);
        $ans = 0;
        for($j=1; $j<$len; $j++){
            if($prices[$j] > $prices[$j-1]){
                $ans += $prices[$j]-$prices[$j-1];
            }
        }
        return $ans;
    }
}