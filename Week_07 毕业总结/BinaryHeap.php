<?php
/**
 * 二叉堆
 */
class BinaryHeap {
    private $d = 2;
    private $capacity;
    private $size;
    private $heap;

    function __construct($capacity) {
        $this->capacity = $capacity;
        $this->size = 0;
        $this->heap = [];
    }

    function isEmpty() {
        return $this->size == 0;
    }

    function isFull() {
        return $this->size == $this->capacity;
    }

    /**
     * 查找父节点: 二叉堆用数组表示的话, 父节点 = floor(($i-1)/2)
     * @param $i
     * @return false|float
     */
    function parent($i) {
        return floor(($i-1)/2);
    }

    /**
     * 找左或右节点
     * @param $i
     * @param $k int 1:找左节点(2*i+1)  2:找右节点(2*i)+2
     */
    function kthChild($i, $k) {
        return $this->d * $i - $k;
    }

    /**
     * 插入: 先把元素添加到结尾，再向上交换移动直到满足二叉堆条件
     * @param $v
     */
    function insert($v) {
        if ($this->isFull()) {
            throw new Exception('heap is full, not space insert new element');
        }

        $this->heap[] = $v;
        $this->size++;

        $this->heapifyUp($this->size-1);
    }

    /**
     * 堆化,插入数据
     * @param $i int 要插入的数据索引
     */
    private function heapifyUp($i) {
        $inser_v = $this->heap[$i];
        while ($i>0 && $inser_v > $this->heap[$this->parent($i)]) {//不断向上找到要插入的节点位置
            $p = $this->parent($i); //父节点位置
            $this->heap[$i] = $this->heap[$p];//父节点值向下交换移动，准备把要插入数据的位置让出来
            $i = $p;//最后一次找到的i就是要插入的位置
        }
        $this->heap[$i] = $inser_v;
    }

    /**
     * 删除元素数据: 先把要结尾的元素交换到要删除的位置，再向下交换直到满足二叉树条件
     * @param $i int 要删除的元素位置
     * @return int 返回删除的元素
     */
    function delete($i) {
        if ($this->isEmpty()) {
            throw new Exception('Heap is empty, no element delete');
        }

        $v = $this->heap[$i];//要删除的元素
        $n = $this->size-1;
        $this->heap[$i] = $this->heap[$n];//把尾元素和要删除的元素交换

        $this->heapifyDown($i);
        $this->size--;
        unset($this->heap[$n]);

        return $v;
    }

    /**
     * 向下堆化, 删除元素时把结尾的元素交换到了删除的位置，所以要重新堆化以满足二叉堆条件
     * @param $i int 删除的位置(此时已经是之前结尾的元素值)
     */
    private function heapifyDown($i) {
        $v = $this->heap[$i];
        while ($this->kthChild($i,1) < $this->size) {//向下找出要交换的位置
            $child = $this->maxChild($i);//找出较大的子节点位置
            if ($v >= $this->heap[$child]) {
                break;
            }
            $this->heap[$i] = $this->heap[$child];//和较大的子节点交换
            $i = $child;
        }
        return $i;
    }

    /**
     * 返回左右节点中较大的节点位置
     * 向下堆化过程中，可以和左或右子节点交换，这里是和较大的节点交换以满足二叉堆条件
     * @param $i
     * @return float|int
     */
    private function maxChild($i) {
        $l = $this->kthChild($i,1); //左节点位置
        $r = $this->kthChild($i,2); //右节点位置

       $max = $this->heap[$l] > $this->heap[$r] ? $l : $r;
       return $max;
    }

    /**
     * 查找最大值 O(1)
     * @return mixed
     * @throws Exception
     */
    function findMax() {
        if ($this->isEmpty()) {
            throw new Exception('Heap is empty');
        }

        return $this->heap[0];
    }
}