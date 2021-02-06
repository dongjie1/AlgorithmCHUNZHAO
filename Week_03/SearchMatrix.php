<?php
/**
 * 74. 搜索二维矩阵
 * https://leetcode-cn.com/problems/search-a-2d-matrix/
 */

class Solution {
    /**
     * 把二维升序数组当成一个一维升序数组
     * 如果index为一维数组的索引
     * 那么二维数组中的行索引 row = index / n;
     * 那么二维数组中的列索引 col = index % n
     * @param $matrix
     * @param $target
     */
    function searchMatrix($matrix, $target){
        $m = count($matrix);
        $n = count($matrix[0]);

        $left = 0;
        $right = $m * $n - 1;

        while ($left <= $right) {
            $mid = intval(($left + $right) / 2);
            $row = intval($mid / $n);
            $col = intval($mid % $n);
            if ($matrix[$row][$col] == $target){
                return true;
            }elseif($matrix[$row][$col] >= $target){
                $right = $mid - 1;
            }else{
                $left = $mid + 1;
            }
        }
        return false;
    }

    /**
     * 先确定行
     * 再在行中二分查找
     * @param Integer[][] $matrix
     * @param Integer $target
     * @return Boolean
     */
    function searchMatrix2($matrix, $target) {
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