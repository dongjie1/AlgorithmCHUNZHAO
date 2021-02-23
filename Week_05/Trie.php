<?php
/**
 * 208: 实现 Trie(前缀树)
 * https://leetcode-cn.com/problems/implement-trie-prefix-tree/
 */

class Trie {
    private $next;
    private $is_end;
    /**
     * Initialize your data structure here.
     */
    function __construct() {
        $this->next = [];
        $this->is_end = false;
    }

    /**
     * Inserts a word into the trie.
     * @param String $word
     * @return NULL
     */
    function insert($word) {
        if (empty($word)) return false;
        $curr = $this;
        for ($i=0; $i<strlen($word); $i++) {
            if (!isset($curr->next[$word{$i}])) $curr->next[$word{$i}] = new Trie();
            $curr = $curr->next[$word{$i}];
        }
        $curr->is_end = true;
    }

    /**
     * Returns if the word is in the trie.
     * @param String $word
     * @return Boolean
     */
    function search($word) {
        $node = $this->searchPrefix($word);
        return $node && $node->is_end;
    }

    /**
     * Returns if there is any word in the trie that starts with the given prefix.
     * @param String $prefix
     * @return Boolean
     */
    function startsWith($prefix) {
        $node = $this->searchPrefix($prefix);
        return !empty($node);
    }

    private function searchPrefix($word) {
        $cur = $this;
        for ($i=0; $i<strlen($word); $i++) {
            if (isset($cur->next[$word{$i}])) {
                $cur = $cur->next[$word{$i}];
            }else{
                return false;
            }
        }
        return $cur;
    }

}

$word = 'apple';
$obj = new Trie();
$res = $obj->insert($word); var_dump('insert: ',$res);
$ret_2 = $obj->search($word);var_dump('search: ',$ret_2);
$ret_3 = $obj->startsWith('apl');var_dump('startWith: ',$ret_3);