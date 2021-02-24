<?php
/**
 * 并查集实现
 */
class UnionFind{
    private $parent = [];
    private $count = 0;

    public function add($x) {
        if (!isset($this->parent[$x])) {
            $this->parent[$x] = null;
            $this->count++;
        }
    }

    public function find($x) {
        $root = $x;
        while ($this->parent[$root] !== null) {
            $root = $this->parent[$root];
        }

        //压缩路径
        while ($root != $x) {
            $ap = $this->parent[$x];
            $this->parent[$x] = $root;
            $x = $ap;
        }
        return $root;
    }

    public function merge($x, $y) {
        $rootX = $this->find($x);
        $rootY = $this->find($y);

        if ($rootX != $rootY) {
            $this->parent[$rootX] = $rootY;
            $this->count--;
        }
    }

    public function getNums() {
        return $this->count;
    }
}