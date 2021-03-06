<?php
/**
 * 146. LRU缓存机制
 * https://leetcode-cn.com/problems/lru-cache/
 */

class LRUCache{
    private $cap; //缓存总长度
    private $cache;//缓存
    private $size;//当前长度
    private $head;//伪头
    private $tail;//伪尾

    public function __construct($cap){
        $this->cap = $cap;
        $this->cache = [];
        $this->size = 0;
        $this->head = new LRUCacheNode();
        $this->tail = new LRUCacheNode();
        $this->head->next = $this->tail;
        $this->tail->pre = $this->head;
    }

    public function get($key) {
        if (isset($this->cache[$key])) {
            $this->moveToHead($this->cache[$key]);
            return $this->cache[$key]->value;
        }
        return -1;
    }

    public function put($key, $value) {
        if (isset($this->cache[$key])) {
            $this->cache[$key] = $value;
            $this->moveToHead($this->cache[$key]);
        }else{
            if ($this->size == $this->cap) {
                $tail = $this->removeTail();
                unset($this->cache[$tail->key]);
                $this->size--;
            }
            $node = new LRUCacheNode($key, $value);
            $this->addToHead($node);
            $this->size++;
        }
    }

    private function addToHead(LRUCacheNode $node) {
        $node->next = $this->head->next;
        $node->pre = $this->head;
        $this->head->next->pre = $node;
        $this->head->next = $node;

    }
    private function moveToHead(LRUCacheNode $node) {
        $this->removeNode($node);
        $this->addToHead($node);
    }
    private function removeNode(LRUCacheNode $node) {
        $node->pre->next = $node->next;
        $node->next->pre = $node->pre;
    }
    private function removeTail() {
        $node = $this->tail->pre;
        $this->removeNode($node);
        return $node;
    }
}

class LRUCacheNode{
    public $key;
    public $value;
    public $pre;
    public $next;

    public function __construct($key=0, $value=0) {
        $this->key = $key;
        $this->value = $value;
        $this->pre = null;
        $this->next = null;
    }
}