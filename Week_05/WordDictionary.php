<?php
/**
 * 211. 添加与搜索单词
 * https://leetcode-cn.com/problems/design-add-and-search-words-data-structure/
 */

class WordNode {
    public $next = null;
    public $isEnd = false;
}

/**
 * Class WordDictionary
 * 使用Trie字典树搜索，并考虑匹配字符(.)的情况
 */
class WordDictionary{
    private $root;
    public function __construct() {
        $this->root = new WordNode();
    }

    public function addWord($word) {
        $n = strlen($word);
        $cur = $this->root;
        for ($i=0; $i<$n; $i++) {
            $d = ord($word{$i})-97;
            if (!isset($cur->next[$d])) {
                $cur->next[$d] = new WordNode();
            }
            $cur = $cur->next[$d];
        }
        $cur->isEnd = true;
    }

    public function search($word) {
        return $this->dfs($word,$this->root,0);
    }

    private function dfs($word,WordNode $node,$start) {
        if ($start == strlen($word)) {
            return $node->isEnd;
        }

        if ($word{$start} == '.') {//如果是.，则把.换成26个字母搜索一遍，只要有一个返回true即可
            for ($i=0; $i<26; $i++) {
                if (!empty($node->next[$i]) && $this->dfs($word,$node->next[$i],$start+1)) {
                    return true;
                }
            }
            return false;
        }else{
            $d = ord($word{$start}) - 97;
            if (empty($node->next[$d])){
                return false;
            }
            return $this->dfs($word,$node->next[$d],$start+1);
        }
    }
}

$obj = new WordDictionary();
$obj->addWord('add');
$obj->addWord('bad');
$obj->addWord('cat');
echo "\n search add => ",$obj->search('add');
echo "\n search .ad => ",$obj->search('.ad');
echo "\n search .a. => ",$obj->search('cat');
echo "\n search pa. => ",$obj->search('pa.');