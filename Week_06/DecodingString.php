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


/**
 * 使用递归
 * @param $s
 * @return mixed
 */
function decodingString($s){
    return dfs($s,0)[1];
}

function dfs($s,$i) {
    $res = '';
    $multi = 0;

    while ($i < strlen($s)) {
        if ($s{$i} >= '0' && $s{$i} <= '9') {
            $multi = $multi * 10 + $s{$i};
        }elseif($s{$i} == '[') {
            $tmp = dfs($s,$i+1);
            $i = $tmp[0];
            $st = '';
            while ($multi > 0) {
                $st .= $tmp[1];
                $multi--;
            }
            $res .= $st;
            $multi = 0;
        }elseif($s{$i} == ']') {
            return [$i,$res];
        }else{
            $res .= $s{$i};
        }
        $i++;
    }
    return [$i,$res];
}

$s = '3[a]2[bc]';
$res = decodingString($s);
var_dump($res);