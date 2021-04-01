<?php
/**
 * 394. 字符串解码
 *
 */

/**
 * @param $s
 * @return string
 */
function decodingStr($s) {
    $res = '';
    $multi = 0;
    $stack_num = [];
    $stack_char = [];

    $n = strlen($s);
    for ($i=0; $i<$n; $i++) {
        if ($s{$i} >= '0' && $s{$i} <= '9') {
            $multi = $multi * 10 + $s{$i};
        }elseif($s{$i} == '[') {
            $stack_char[] = $res;
            $stack_num[] = $multi;

            $res = '';
            $multi = 0;
        }elseif($s{$i} == ']') {
            $_m = array_pop($stack_num);
            $char = array_pop($stack_char);
            $tmp = '';
            while ($_m > 0) {
                $tmp .= $res;
                $_m--;
            }
            $res = $char.$tmp;
        }else{
            $res .= $s{$i};
        }
    }
    return $res;
}

$s = '3[a]2[bc]';
$res = decodingStr($s);
var_dump($res);