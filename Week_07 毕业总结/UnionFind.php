<?php
/**
 * 并查集
 */
class UnionFind {
    private $parent;
    private $count;

    function __construct($n) {
        $this->count = $n;
        for ($i=0; $i<$n; $i++){
            $this->parent[$i] = $i;
        }
    }

    function find($x) {
        $root = $x;
        while ($this->parent[$root] != $root){
            $root = $this->parent[$root];
        }

        //压缩路径
        while ($root != $x) {
            $tmp = $this->parent[$x];
            $this->parent[$x] = $root;
            $x = $tmp;
        }

        return $root;
    }
    //合并
    function merge($p,$q){
        $rootP = $this->find($p);
        $rootQ = $this->find($q);
        if ($rootP != $rootQ) {
            $this->parent[$rootP] = $rootQ;
            $this->count--;
        }
    }

    function getNums() {
        return $this->count;
    }
}