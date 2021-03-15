<?php
class Solution {

    /**
     * @param String $beginWord
     * @param String $endWord
     * @param String[] $wordList
     * @return Integer
     */
    function ladderLength($beginWord, $endWord, $wordList) {
        ini_set('memory_limit','512M');
        $n = count($wordList);
        if($n == 0 || !in_array($endWord,$wordList)){
            return 0;
        }

        $tt = [];
        foreach($wordList as $word){
            $tt[$word] = 1;
        }
        $wordList = $tt;


        $visited = [];
        $beginVisited[$beginWord] = 1;
        $endVisited[$endWord] = 1;

        $step = 1;
        while(!empty($beginVisited) && !empty($endVisited)){
            $bn = count($beginVisited);
            $en = count($endVisited);
            if($bn > $en) {
                $tmp = $beginVisited;
                $beginVisited = $endVisited;
                $endVisited = $tmp;
            }

            $nextLevelVisited = [];
            foreach($beginVisited as $bw => $has){
                $cres = $this->changeWordLetter($bw,$endVisited,$visited,$wordList,$nextLevelVisited);
                if($cres) {
                    return $step+1;
                }
            }

            $beginVisited = $nextLevelVisited;
            $step++;
        }
        return 0;
    }

    function changeWordLetter($word,$endVisited,&$visited,$wordList,&$nextLevelVisited){
        for($i=0; $i<strlen($word);$i++) {
            $cur_ch = $word{$i};
            for($c=ord('a'); $c<=ord('z');$c++){
                if($cur_ch == chr($c)){
                    continue;
                }
                $word{$i} = chr($c);
                if(isset($wordList[$word])){
                    if($endVisited[$word]) return true;

                    if(!$visited[$word]) {
                        echo "\n $word ==> ";

                        $nextLevelVisited[$word] = 1;
                        $visited[$word] = 1;
                    }
                }

            }
            $word{$i} = $cur_ch;
        }
        return false;
    }
}

$obj = new Solution();
$beginWord = 'leet';
$endWord = 'code';
$wordList = ["lest","leet","lose","code","lode","robe","lost"];//6
$res = $obj->ladderLength($beginWord,$endWord,$wordList);
var_dump($res);
