<?php
/**
 * 547: 省份数量
 */

//include_once 'UnionFind.php';
include_once 'UnionFind2.php';

class Solution {
    /**
     * @param Integer[][] $isConnected
     * @return Integer
     * 使用并查集实现
     * include_once 'UnionFind.php'
     */
    function findCircleNum1($isConnected) {
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

    /**
     * @param $isConnected
     * @return int
     * 使用并查集实现
     * include_once 'UnionFind2.php'
     */
    function findCircleNum2($isConnected) {
        $len = count($isConnected);
        $uf = new UnionFind($len);
        for ($i=0; $i<$len; $i++) {
            for ($j = $i+1; $j<$len; $j++) {
                if ($isConnected[$i][$j] == 1) {
                    $uf->merge($i,$j);
                }
            }
        }
        return $uf->getNums();
    }

    /**
     * @param $isConnected
     * @return int
     * 广度优先搜索
     * 时间复杂度：O(n^2)，其中 n 是城市的数量。需要遍历矩阵 {isConnected} 中的每个元素。
     * 空间复杂度：O(n)，其中 n 是城市的数量。需要使用数组 {visited} 记录每个城市是否被访问过，数组长度是 n，广度优先搜索使用的队列的元素个数不会超过 n
     */
    function findCircleNum3($isConnected) {
        //isConnected 是无向图的邻接矩阵，len 为无向图的顶点数量
        $len = count($isConnected);
        $visited = [];//数组标识顶点是否被访问
        $queue = [];

        $cnt = 0;//累计遍历过的连通域的数量

        for ($i=0; $i<$len; $i++) {
            if (!$visited[$i]){//若当前顶点 i 未被访问，说明又是一个新的连通域，则bfs新的连通域且cnt+=1.
                $cnt++;
                $visited[$i] = true;

                $queue[] = $i;
                while (!empty($queue)) {
                    $v = array_shift($queue);
                    for ($j=0; $j<$len; $j++) {
                        if ($isConnected[$v][$j] == 1 && !$visited[$j]){
                            $visited[$j] = true;
                            $queue[] = $j;
                        }
                    }
                }
            }
        }
        return $cnt;
    }

    /**
     * @param $isConnected
     * 深度优先搜索
     * 时间复杂度：O(n^2)，其中 n 是城市的数量。需要遍历矩阵 {isConnected} 中的每个元素。
     * 空间复杂度：O(n)，其中 n 是城市的数量。需要使用数组 {visited} 记录每个城市是否被访问过，数组长度是 n，递归调用栈深度不会超过 n
     */
    function findCircleNum4($isConnected) {
        $len = count($isConnected);
        $visited = [];
        $cnt = 0;

        for ($i=0; $i<$len; $i++) {
            if (!$visited[$i]) {//若当前顶点 i 未被访问，说明又是一个新的连通域，则dfs新的连通域且cnt+=1.
                $cnt++;
                $this->dfs($i,$isConnected,$visited);
            }
        }
        return $cnt;
    }
    function dfs($i,$isConnected,&$visited) {
        $visited[$i] = true;//记录当前顶点访问
        //继续遍历与$i相邻的顶点，visited防止重复访问
        for ($j = 0; $j<count($isConnected); $j++) {
            if ($isConnected[$i][$j] == 1 && !$visited[$j]) {
                $visited[$j] = true;
                $this->dfs($j,$isConnected,$visited);
            }
        }
    }
}

$obj = new Solution();
$isConnected = [[1,1,1],[1,1,1],[1,1,1]];//[[1,1,0],[1,1,0],[0,0,1]];//[[1,0,0],[0,1,0],[0,0,1]];
var_dump($obj->findCircleNum3($isConnected));