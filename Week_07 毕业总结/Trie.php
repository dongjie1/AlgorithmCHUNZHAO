<?php
/**
 * 字典树、前缀树
 */
class Trie{
    private $next;
    private $isWord;

    function __construct(){
        $this->next = [];
        $this->isWord = false;
    }

    function addWord($word){
        if (empty($word)) return;
        $n = strlen($word);
        $cur = $this;
        for ($i=0; $i<$n; $i++) {
            if (!isset($cur->next[$word{$i}])){
                $cur->next[$word{$i}] = new Trie();
            }
            $cur = $cur->next[$word{$i}];
        }
        $cur->isWord = false;
    }

    function search($word){
        $has = $this->searchPrefix($word);
        return $has && $has->isWord;
    }

    function searchWith($prefix){
        $has = $this->searchPrefix($prefix);
        return !empty($has);
    }

    function searchPrefix($prefix){
        $n = strlen($prefix);
        $cur = $this;
        for ($i=0; $i<$n; $i++) {
            if (isset($cur->next[$prefix{$i}])){
                $cur = $cur->next[$prefix{$i}];
            }else{
                return null;
            }
        }
        return $cur;
    }

}