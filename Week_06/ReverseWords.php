<?php
/**
 * 151. 翻转字符串里的单词
 * https://leetcode-cn.com/problems/reverse-words-in-a-string/
 */

class Solution {

    /**
     * @param String $s
     * @return String
     * 先把字符串分隔成数组，再反转数组
     *
     */
    function reverseWords1($s) {
        if (empty($s)) return '';

        $s = trim($s);
        $arr = explode(' ',$s);
        var_dump($arr);
        $arr = array_reverse($arr);
        var_dump($arr);

        $s = implode(' ',$arr);
        return $s;
    }

    /**
     * @param $s
     * @return false|string
     * 先把整个字符串反转，然后再反转字符串的是单个单词
     * 空间复杂度： O(1)
     */
    function reverseWords($s){
        $s = trim($s);
        $len = strlen($s);
        if (empty($s)) return false;
        $s = $this->reverseStr($s);

        $tmp = '';
        $res = '';
        for ($i=0; $i<$len; $i++){
            if ($s{$i} != ' '){//如果不是空格则表示是一个单词中的字母
                $tmp .= $s{$i};
            }else{
                if ($tmp != '') {//去掉单词中间多余的空格
                    $res .= $this->reverseStr($tmp) . ' ';
                    $tmp = '';
                }
            }
        }
        $res .= $this->reverseStr($tmp);//反转最后一个单词
        return $res;
    }

    private function reverseStr($s){
        if ($s == '') return '';
        $len = strlen($s);
        $i = 0; $j = $len - 1;
        while ($i<=$j){
            [$s{$i},$s{$j}] = [$s{$j},$s{$i}];
            $i++;
            $j--;
        }
        return $s;
    }
}

$s = "a good  0  0  example";
$obj = new Solution();
$s1 = $obj->reverseWords($s);
echo $s1;
//$obj->reverseStr('hello World!');