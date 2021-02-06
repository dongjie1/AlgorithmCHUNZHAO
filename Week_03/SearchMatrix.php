<?php
/**
 * 74. 搜索二维矩阵
 * https://leetcode-cn.com/problems/search-a-2d-matrix/
 */

class Solution {

    /**
     * @param Integer[][] $matrix
     * @param Integer $target
     * @return Boolean
     */
    function searchMatrix($matrix, $target) {
        $m = count($matrix);
        $n = count($matrix[0]);
        if($m == 1){
            return $this->binarySearch($matrix[0],$target) != -1;
        }

        //二分查找出target在哪行
        $l = 0;
        $r = $m-1;
        $row = -1;  //target所在行索引
        while($l <= $r){
            $mid = intval(($l + $r)/2);
            if($matrix[$mid][0] == $target){
                return true;
            }elseif($matrix[$mid][0] < $target && $matrix[$mid][$n-1] >= $target){//如果当前行首小于target且行尾大于等于target则target在此行
                $row = $mid;
                break;
            }elseif($matrix[$mid][0] > $target){
                $r = $mid - 1;
            }else{
                $l = $mid + 1;
            }
        }

        if($row == -1){//如果不在任何一行返回false
            return false;
        }

        //在$row行中进行二分查找
        $ans = $this->binarySearch($matrix[$row],$target) != -1;
        return $ans;
    }

    /**
     * 二分查找每行数据中是否有target
     * @param $nums
     * @param $target
     * @return int
     */
    function binarySearch($nums,$target){
        $len = count($nums);
        $left = 0;
        $right = $len - 1;
        while($left <= $right){
            $mid = intval(($left + $right) / 2);
            if($nums[$mid] == $target){
                return $mid;
            }elseif($nums[$mid] > $target){
                $right = $mid - 1;
            }else{
                $left = $mid + 1;
            }
        }
        return -1;
    }
}