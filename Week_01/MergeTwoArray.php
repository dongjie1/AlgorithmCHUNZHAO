<?php

/**
 * https://leetcode-cn.com/problems/merge-sorted-array/
 * 88.合并两个有序数组
 */
class Solution {

    /**
     * @param Integer[] $nums1
     * @param Integer $m
     * @param Integer[] $nums2
     * @param Integer $n
     * @return NULL
     * 双指针，从后往前
     * 时间复杂度: O(m+n)
     * 空间复杂度: O(1)
     */
    function merge(&$nums1, $m, $nums2, $n) {
        $p1 = $m - 1;
        $p2 = $n - 1;
        $p = $m + $n -1;

        while ($p2 >= 0){
            if($nums2[$p2] >= $nums1[$p1]){
                $nums1[$p] = $nums2[$p2];
                $p2--;
            }else{
                $nums1[$p] = $nums1[$p1];
                $p1--;
            }
            $p--;
        }
    }

    /**
     * @param $nums1
     * @param $m
     * @param $nums2
     * @param $n
     * 直接合并后排序
     * 时间复杂度: O((n+m)log(n+m))
     * 空间复杂度: O(1)
     */
    function merge2(&$nums1, $m, $nums2, $n){
        $nums1 = array_merge(array_slice($nums1,0,$m),array_slice($nums2,0,$n));
        sort($nums1);
    }
}