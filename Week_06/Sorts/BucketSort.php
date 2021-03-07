<?php
/**
 * 桶排序
 */
include_once 'QuickSort.php';
function bucketSort($arr,$bucketSize = 5) {
    if (empty($arr)) return [];

    $max = max($arr);
    $min = min($arr);

    $bucketNum = floor(($max-$min)/$bucketSize);
    $buckets = [];

    foreach ($arr as $value) {
        $index = floor(($value-$min)/$bucketNum);
        $buckets[$index][] = $value;
    }

    $arr = [];
    for ($i=0; $i<count($buckets); $i++) {
        $tmp = quickSort($buckets[$i]);//这里使用快速排序,也可以使用其它排序方法或自带sort函数
        for($j = 0; $j<count($tmp); $j++){
            $arr[] = $tmp[$j];
        }
    }
    return $arr;
}

$arr = [9,3,2,4,6,2,8,5,1,7,6,1,8,0,7];
$arr = bucketSort($arr);
echo '[',implode(',',$arr),']';
