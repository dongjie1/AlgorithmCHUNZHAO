<?php
/**
 * 547: 省份数量
 */

include_once 'UnionFind.php';

class Solution {
    /**
     * @param Integer[][] $isConnected
     * @return Integer
     * 使用并查集实现
     */

    function findCircleNum($isConnected) {
        $uf = new UnionFind();
        for ($i=0; $i<count($isConnected); $i++) {
            $uf->add($i);
            for ($j = 0; $j<$i; $j++) {
                if ($isConnected[$i][$j] == 1) {
                    $uf->merge($i,$j);
                }
            }
        }
        return $uf->getNums();
    }
}