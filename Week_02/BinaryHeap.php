<?php
/**
 * 二叉堆
 */
class BinaryHeap{
    private $d = 2; //表示是2叉堆
    public $heap;
    public $size;
    public $capacity;

    public function __construct($capacity){
        $this->heap = array();
        $this->capacity = $capacity;
        $this->size = 0;
    }

    public function isEmpty(){
        return $this->size == 0;
    }

    public function isFull(){
        return $this->size == $this->capacity;
    }

    /**
     * 找父节点索引
     * @param $i
     * @return false|float
     */
    private function parent($i){
        return floor(($i - 1) / 2);
    }

    /**
     * 找子节点索引
     * @param $i
     * @param $k 1:左子节点索引(2*i+1)  2:右子节点索引(2*i+2)
     * @return float|int
     */
    private function kthChild($i,$k){
        return $this->d * $i + $k;
    }

    /**
     * 插入元素:先把新元素添加到结尾，再向上交换直到满足二叉堆条件
     * @param $v
     * @throws Exception
     */
    public function insert($v){
        if ($this->isFull()){
            throw new Exception('Heap is full, No space to insert new element');
        }

        $this->heap[$this->size] = $v;
        $this->size++;

        $this->heapifyUp($this->size-1);

    }

    /**
     * 删除一个元素:先把结尾的元素替换的要删除的位置，再向下交换直到满足二叉堆条件
     * @param int $i 要删除的元素的索引
     * @return int 删除的元素
     * @throws Exception
     */
    public function delete($i){
        if ($this->isEmpty()) {
            throw new Exception('Heap is empty');
        }

        $max = $this->heap[$i];
        $len = $this->size-1;
        $this->heap[$i] = $this->heap[$len];
        $this->heapifyDown($i);
        $this->size--;
        unset($this->heap[$len]);
        return $max;
    }

    public function findMax(){
        if ($this->isEmpty()) {
            throw new Exception('Heap is empty');
        }

        return $this->heap[0];
    }

    public function printHeap(){
        echo "\n[".implode(',',$this->heap)."]\n";
    }

    private function heapifyUp($i){
        $inser_v = $this->heap[$i];
        while ($i > 0 && $inser_v > $this->heap[$this->parent($i)]){
            $p = $this->parent($i);
            $this->heap[$i] = $this->heap[$p];
            $i = $p;
        }
        $this->heap[$i] = $inser_v;
    }

    private function heapifyDown($i){
        $tmp = $this->heap[$i];
        while ($this->kthChild($i,1) < $this->size){
            $child = $this->maxChild($i);
            if ($tmp >= $this->heap[$child]) {
                break;
            }
            $this->heap[$i] = $this->heap[$child];
            $i = $child;
        }
        $this->heap[$i] = $tmp;
    }

    private function maxChild($i){
        $l = $this->kthChild($i,1);
        $r = $this->kthChild($i,2);

        $max = $this->heap[$l] > $this->heap[$r] ? $l : $r;
        return $max;
    }
}

$heap = new BinaryHeap(10);
$heap->insert(4);
$heap->insert(14);
$heap->insert(9);
$heap->insert(1);
$heap->insert(7);
$heap->insert(5);
$heap->insert(3);
$heap->printHeap();
$del1 = $heap->delete(3);
$heap->printHeap();
$del2 = $heap->delete(5);
$heap->printHeap();
$heap->insert(20);
$heap->printHeap();