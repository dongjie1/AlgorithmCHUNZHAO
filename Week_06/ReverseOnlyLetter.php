<?php
/**
 * 917. 仅仅反转字母
 * https://leetcode-cn.com/problems/reverse-only-letters/
 */

class Solution {

    /**
     * @param String $s
     * @return String
     */
    function reverseOnlyLetters($s) {
        if ($s == '') return '';
        $len = strlen($s);
        $i = 0; $j = $len - 1;
        while ($i <= $j) {
            if ($this->isLetter($s{$i}) && $this->isLetter($s{$j})){//前后都是字母直接互换
                [$s{$i}, $s{$j}] = [$s{$j}, $s{$i}];
                $i++;
                $j--;
            }
            if (!$this->isLetter($s{$i})){//前指针位置不是字母则后移
                $i++;
            }
            if (!$this->isLetter($s{$j})){//后指针位置不是字母则前移
                $j--;
            }
        }
        return $s;
    }

    private function isLetter($s){
        if (empty($s)) return false;
        $s = strtolower($s);
        $sn = ord($s);
        return $sn>=97 && $sn<=122;
    }
}

//$s = 'Test1ng-Leet=code-Q!';//'a-bC-dEf-ghIj';
$s = 'ab--cd';//'66z<*zj98';
$obj = new Solution();
$ss = $obj->reverseOnlyLetters($s);
echo $ss."\n";