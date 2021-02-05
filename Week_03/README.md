### 1.分治
#### 1.1 分治思想:
- 也是一种递归
- 把一个问题分成多个子问题，分别解决
- 把多个子问题的结果合并为最后结果
#### 1.2 代码模板:
```php
function devide_conquer($problem,$param1,$param2,...) {
    //recursion terminator
    if (empty($probliem)){
        print_result;
        return;
    }
    
    //prepare data
    $data = prepare_data($problem);
    $subproblems = split_problem($problem,$data); //分成多个子问题
    
    //conquer subproblems //分别解决子问题
    $subresult1 = devide_conquer($subproblems[0],$param1,$param2,...);
    $subresult2 = devide_conquer($subproblems[1],$param1,$param2,...);
    $subresult3 = devide_conquer($subproblems[2],$param1,$param2,...);
    ...
    
    //process and generate the final result //合并子问题结果
    $result = process_subresult($subresult1,$subresult2,$subresult3,...);

    //revert the current level states 
}
```

### 2. 回溯
#### 2.1 回溯思想
- 也是一种递归
- 每次递归后回置状态
- 一般用于子集、全排列等
#### 2.2 代码模板同递归,注意最后的revert states
```php
    function recursion($ans,$nums,$list,$index){
        //terminator 
        if($index >= count($nums)) {
            $ans[] = $list;
            return;
        }
        
        //process logic, drill down
        //未选择当前$index数时
        recursion($ans,$nums,$list,$index+1);
        //选择当前$index数时
        $list[] = $nums[$index]; 
        recurstion($ans,$nums,$list,$index+1);
        
        //revert states
        remove($list[count($list)-1]);//重置$list
        
    }
```

### 3.深度优先搜索
#### 3.1 递归代码模板
```php
    $vistited = [];
    $res = [];
    function dfs($node,$visited){
        //terminator
        if ($visited[$node->val]){
        //already exists
            return;
        }
        
        $res[] = $node;
        $visited[$node->val] = true;
        
        //process current node here
        ...
        
        //drill down n叉树
        foreach($node->children() as $child){
            if(!in_array($child,$visited)){
                dfs($child,$visited);
            }
        }
        //二叉树
        $node->left && dfs($node->left,$visited);
        $node->right && dfs($node->right,$visited);
        
    }
```

#### 3.2 迭代代码模板
```php 
    function dfs($root){
        $visited = [];
        $res = [];
        
        $stack = [$root];
        while($stack){
            $node = array_shift($stack);
            $res[] = $node->val;
            $visited[$node->val] = true;
            
            foreach($node->children as $child){
                if(!$visited[$child->val]){
                    $stack[] = $child;
                }
            }
        }
        return $res;
    }
```

### 4. 广度优先搜索
#### 4.1 递归代码模板
```php
function bfs(&$res,$node,$level){
        if (!$node) return [];

        $res[$level][] = $node->val;

        $node->left && bfs($res,$node->left,$level+1);
        $node->right && bfs($res,$node->right,$level+1);
    }
```
#### 4.2 迭代
```php
function bfs($root) {
        $res = [];
        if(!$root) return $res;

        $nodes = [$root];
        while (!empty($nodes)){
            $len = count($nodes);
            $row = [];
            for($i=0; $i<$len; $i++){
                $node = array_shift($nodes);
                $row[] = $node->val;

                $node->left && $nodes[] = $node->left;
                $node->right && $nodes[] = $node->right;
            }

            $res[] = $row;
        }

        return $res;
    }

```

### 5.贪心算法
#### 5.1 
- 贪心算法是一种在每一步选择中都采取在当前状态下最好或最优(即最有利)的选择，从而希望导致结果是全局最好或最优的算法
- 贪心算法和动态规划的不同在于它对每个子问题的解决方案都做出选择，不回退。
- 动态规划会保存以前的运算结果，并根据以前的结果对当前进行选择，有回退功能
- 贪心算法: 当下做局部最优判断
- 回溯: 能够回退
- 动态规划: 最优判断+回退

### 6. 二分查找
#### 6.1 代码模板
```php
//$nums 是一个有序数组
function binarySearch($nums,$target){
    $left = 0;
    $right = count($nums)-1;
    
    while($left <= $right) {
        $mid = $left + ($right - $left) / 2;//为了防止数组越界
        if($mid == $target){
            return $mid;
        }elseif($nums[$mid] < $target){
            $left = $mid + 1;
        }else{
            $right = $mid - 1;
        }
    }
    return -1;
}
```
#### 6.2:  使用二分查找，寻找一个半有序数组 [4, 5, 6, 7, 0, 1, 2] 中间无序的地方
##### 6.2.1 思路:
- 根据二分查找 mid=(left+right)/2，比较 mid,mid-1,mid+1是否符合升序
- 如果 mid<mid-1 and mid<mid+1 返回mid
- 如果 mid>right 则无序的地方在右侧 left=mid+1, 否则在左侧 right=mid-1

```php
function search($nums){
    $left = 0;
    $right = count($nums)-1;

    while ($left <= $right) {
        $mid = $left + intval(($right-$left)/2);
        if ($nums[$mid] < $nums[$mid-1] && $nums[$mid]<$nums[$mid+1]){
            return [$mid-1,$mid];
        }elseif($nums[$mid] > $nums[$right]){
            $left = $mid + 1;
        }else{
            $right = $mid - 1;
        }
    }
    return [-1,-1];
}
```
