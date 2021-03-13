<?php
/**
 * 15. 三数之和
 * https://leetcode-cn.com/problems/3sum/
 */

class Solution{
    function threeSum($nums) {
        $len = count($nums);
        $res = [];
        if ($len < 3) return $res;

        sort($nums);//先排序
        for ($i=0; $i<$len; $i++) {
            if ($nums[$i] > 0) break;//因为已经排序了，所以如果nums[i]大于0则和必定大于0，退出循环
            if ($i > 0 && $nums[$i] == $nums[$i-1]) continue; //重复元素会导致结果重复，去掉

            //双指针
            $l = $i + 1;
            $r = $len - 1;
            while ($l < $r) {
                $sum = $nums[$i] + $nums[$l] + $nums[$r];
                if ($sum == 0) {
                    $res[] = [$nums[$i], $nums[$l], $nums[$r]];
                    while ($l < $r && $nums[$l] == $nums[$l+1]) $l++; //去重
                    while ($l < $r && $nums[$r] == $nums[$r-1]) $r--; //去重
                    $l++;
                    $r--;
                }elseif($sum < 0) {
                    $l++;
                }else{
                    $r--;
                }
            }
        }
        return $res;
    }
}
