### 毕业总结：
#### 一.数据结构
    - 1.数组 Array
        - 内存中的一段连续空间
        - 时间复杂度: 查询O(1)，插入、删除O(n)
    - 2.链表 Linked List
        -  时间复杂度：添加、删除O(1)，搜索O(n)
        -  单链表、双向链表、循环链表
    - 3.栈 Stack
        - 先入后出
        - 时间复杂度: 添加、删除都是O(1)，查询O(n)
    - 4.队列 Queue
        - 先入先出
        - 时间复杂度: 添加、删除都是O(1)，查询O(n)
    - 5.双端队列 Deque
        - 双端都可进可出
        - 时间复杂度: 添加、删除都是O(1)，查询O(n)
    - 6.优先队列 Priority Queue
        - 时间复杂度: 取出O(1)，查询O(logN)
        - 底层数据结构多样复杂
    - 7.哈希表 HashTabls，Set、Map: HashMap,TreeMap
        - 时间复杂度: 添加、删除、查询都是O(1)
        - 为了防止碰撞冲突要设计合理的哈希函数
        - 遇到碰撞冲突可以使用链表等数据结构加到槽后面保存冲突的数据
    - 8.跳表:
        - 只能用于有序数据元素
        - 时间复杂度: 添加、查询、删除都是O(logn)，空间复杂度: O(n)
        - 实现方式是升维: 从一维升到二维...添加一级索引、二级索引...再进行二分查找
        - 相对于平衡树来说，优势是原理简单，容易实现，方便扩展，效率更高
    - 7.二叉树: Tree， 二叉搜索树: Binary Tree
        - 前中后序遍历: 递归实现、迭代实现
```php
#前序递归遍历
function preOrder(TreeNode $root) {
    if($root) {
        $path[] = $root;
        preOrder($root->left);
        preOrder($root->right);
    }
    return $path;
}
#中序递归遍历
function inOrder(TreeNode $root){
    if($root){
        inOrder($root->left);
        $path[] = $root;
        inOrder($root->right);
    }
    return $path;
}
#后序递归遍历
function postOrder(TreeNode $root){
    if($root) {
        postOrder($root->left);
        postOrder($root->right);
        $path[] = $root;
    }
    return $path;
}
#前序迭代遍历
function preOrder(TreeNode $root){
    if(!$root) return [];
    $path = [];
    $stack = [$root];
    while ($stack) {
        $node = array_pop($stack);
        $path[] = $node->val;
        
        $root->right && $stack[] = $root->right;//先放右再放左
        $root->left && $stack[] = $root->left;
    }
    return $path;
}
#中序迭代遍历
function inOrder(TreeNode $root){
    if(!$root) return [];
    $path = [];
    $stack = [];
    $cur = $root;
    while($cur || !empty($stack) {
        if($cur){
            $stack[] = $cur;
            $cur = $cur->left; //先一直向左到底
        }else{
            $node = array_pop($stack);
            $path = $node->val;
            $cur = $node->right;
        }
    }
    return path;
}
#后序迭代遍历
function postOrder(TreeNode $root){
    if(!$root) return [];
    $path = [];
    $stack = [$root];
    while($stack) {
        $cur = array_pop($stack);
        $path[] = $cur->val;
        
        $cur->left && $stack[] = $cur->left;
        $cur->right && $stack[] = $cur->right;
    }
    return $path;
}
```
    - 8.堆: 大顶堆、小顶堆
        - 二叉堆
            - 一棵完全二叉树
            - 可以用数组实现:
                - 根节点 0
                - 左子树节点 2*i-1，右子树节点 2*i+1
                - 父节点 floor((i-1)/2)
            - 插入、删除时间复杂度 O(logN)
            - 插入: HeapifyUp ,删除： HeapifyDown
    - 9.字典树、前缀树: Trie
    - 10.并查集: Disjoint Set

#### 二.算法
    - 1.查询 Search
    - 2.递归 Recursion
```php
function recursion($level,$param1,$param2...){
    //结束条件
    if($level >= LEVEL){
        //处理结果
        process_result();
        return;
    }
    //处理当前逻辑
    process($level,$params);
    
    //进入到下一层
    recursion($level+1,$params...);
    
    //清理当前层数据，如果有需要
    resetCurLevel();
}
```
    - 3.广度优先搜索 BFS
```php
//递归
function bfs(&$res,$node,$level) {
    if(!$node) return [];
    $res[$level][] = $node->val;
    
    $node->left && bfs($res,$node->left,$level+1);
    $node->right && bfs($res,$node->right,$level+1);
}
//迭代
function bfs($root){
    if(!$root) return [];
    
    $res = [];
    $nodes = [$root];
    while ($nodes) {
        $len = count($nodes);
        $row = []; //当前层数据
        for($i=0; $i<$len; $i++) {
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
    - 4.深度优先搜索 DFS
```php
//递归
function dfs($node,$visited){
    //递归终止条件
    if ($visited[$node->val]) {
        return;
    }
    //处理数据
    $visited[$node->val] = true;
    
    //到下一层(二叉树)
    $node->left && dfs($node->left,$visited);
    $node->right && dfs($node->right,$visited);
    //N叉树
//    foreach($node->children as $i => $child){
//        if(!in_array($child,$visited)){
//            dfs($child,$visited);
//        }
//    }
}
//迭代
function dfs($root){
    $res = [];
    $visited = [];
    
    $nodes = [$root];
    while ($nodes) {
        $node = array_shift($nodes);
        $visited[$node->val] = true;
        $res[] = $node->val;
        
        //二叉树
        $node->left && $nodes[] = $node->left;
        $node->right && $nodes[] = $node->rigth;
        //N叉树
//        foreach ($node->children as $child) {
//            if (!$visited[$child->val]){
//                $nodes[] = $child;
//            }
//        }
    }
    return $res;
}
```
    - 5.分治 Divide & Conquer
```php
function divide_conquer($problems,$params...){
    //递归终止条件
    if (empty($problems)){
        //处理结果
        process_result();
        return;
    }
    
    //处理
    $data = prepre_data($problems);
    $subproblems = split_problem($problems,$data);//分成多个问题
    //分别处理各子问题
    $sub_res1 = divide_conquer($subproblems[0],$params...);
    $sub_res2 = divide_conquer($subproblems[1],$params...);
    $sub_res3 = divide_conquer($subproblems[2],$params...);
    ...
    //合并结果
    $result = merge($sub_res1,$sub_res2,$sub_res3,...);
    
    return $result;
}
```
    - 6.回溯 Backtracking 
        - 一般用于子集，全排列等
```php
function backtracking($res,$nums,$list,$index){
    //递归终止条件
    if($index >= count($nums)){
        $res[] = $list;
        return;
    }
    //未选择当前index时
    backtracking($res,$nums,$list,$index+1);
    //选择当前index时
    $list[] = $nums[$index];
    backtracking($res,$nums,$list,$index+1);
    
    //revert states  重置list $n是$list长度
    unset($list[$n-1]);
    
}
```
    - 7.贪心 Greedy
    - 8.动态规划
        - 状态的定义
        - dp方程
    - 9.二分查找 Binary Search 
```php
function binarySearch($nums,$target){
    $n = count($nums);
    if($n == 0) return -1;
    
    $left = 0;
    $right = $n-1;
    while($left < $right){
        $mid = ($left+$right) >> 1;
        if ($nums[$mid] == $target) {
            return $mid;
        }elseif($nums[$mid] < $target) {
            $left = $mid + 1;
        }else{
            $right = $mid - 1;
        }
    }
    return -1;
}
```
    - 10.排序
        - 十大排序算法
    - 11.布隆过滤器
        - 一组bit数组
        - 查询到的所有位置都为0时一定不存在
        - 查询到的所有位置都为1时可能存在
    - 位运算
        - 指定位置运算
            - 将x最右边的n位清零: x & (~0<<n)
            - 获取x的第n位是0或1: (x>>n) & 1
            - 获取x的第n位幂值: x & (1<<n)
            - 仅将第n位置为1: x | (1<<n)
            - 仅将第n位置为0: x & (~(1<<n))
        - 常用位运算
            - 判断奇偶:
                - 奇: x%2==1 -->  (x & 1) == 1
                - 偶: x%2==0 -->  (x & 1) == 0
            - 右移相当于除以2: x=x/2 --> x=(x>>1)
            - 清零最低位1: x & (x-1)
            - 得到最低位1: x & -x,  -x=~x+1
            - x & ~x = 0