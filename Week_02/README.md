### 1.二叉树的遍历:
#### 1.1 递归遍历代码模板
- 前序遍历
  ```php
    public function preOrder(TreeNode $root){
        if($root){
            $this->traverse_path[] = $root->val;
            $this->preOrder($root->left);
            $this->preOrder($root->right);
        }
    }
    ```
- 中序遍历
  ```php
    public function inOrder(TreeNode $root){
        if($root){
            $this->inOrder($root->left);
            $this->traverse_path[] = $root->val;
            $this->inOrder($root->right);
        }
    }
  ```
- 后序遍历
    ```php 
    public function postOrder(TreeNode $root){
        if($root){
            $this->postOrder($root->left);
            $this->postOrder($root->right);
            $this->traverse_path[] = $root->val;
        }
    }
    ```
  
#### 1.2 迭代遍历代码模板
- 前序遍历
  ```php 
  function preorder($root){
        if (!$root) return [];

        $result = [];
        $stack = [$root];
        while ($stack){
            $node = array_pop($stack);
            $result[] = $node->val;

            $node->right && $stack[] = $node->right;//先放右再放左
            $node->left && $stack[] = $node->left;
        }

        return $result;
    }
  ```
- 中序遍历
  ```php
    public function inorder($root){
        if(!$root) return [];

        $path = [];
        $stack = [];
        $cur = $root; //访问节点的指针

        while ($cur || !empty($stack)){
            if($cur){//一直向左直到最底层
                $stack[] = $cur;//将访问的节点放进栈
                $cur = $cur->left;//左
            }else{
                $cur = array_pop($stack);// 从栈里弹出的数据，就是要处理的数据（放进path数组里的数据）
                $path[] = $cur->val;//中
                $cur = $cur->right; //右
            }
        }
        return $path;
    }
  ```
- 后序遍历
    ```php 
    public function postorder($root){
        if (!$root) return [];

        $result = [];
        $stack = [$root];
        while ($stack) {
            $node = array_pop($stack);
            $result[] = $node->val;

            $node->left && $stack[] = $node->left;
            $node->right && $stack[] = $node->right;
        }

        $result = array_reverse($result);
        return $result;
    }

    ```
  
### 2. 二叉搜索树:
- 也叫二叉排序树、有序二叉树、排序二叉树
- 可以是一棵空树
- 也可以是有以下性质的树：
    - 左子树上所有节点都小于它的根节点
    - 右子树上所有节点都大于它的根节点
    - 以此类推: 左右子树也都是二叉搜索树
    
- 中序遍历：升序遍历
- 插入、查询、删除都是O(log(n))

### 3. 树的面试题解法一般都是递归，为什么？
- 每棵树可以分解成相同结构的左右子树，树与子树的处理逻辑也就相同，递归很适合处理这种有重复性的逻辑

### 4. 堆 Heap:
- 可以快速找到一堆数中的最大值或最小值的一种数据结构
- 大顶堆/大根堆: 根节点最大的堆
- 小顶堆/小根堆: 根节点最小的堆
- 常见的堆：二叉堆，斐波那契堆等
- 常见的操作:
    - find-max: O(1)
    - delete-max: O(logN)
    - insert: O(logN) or O(1)
#### 4.1 二叉堆:
- 通过完全二叉树实现
- 是一棵完全树
- 树中任意节点的值总是>=其子节点的值
- 因为二叉堆是一个完全二叉树，所以可以使用数组来实现
    - 根节点索引: 0
    - 索引为i的左子节点索引: 2*i-1
    - 索引为i的右子节点索引: 2*i+2
    - 索引为i的父节点的索引: floor((i-1)/2)
- 操作:
    - 插入 insert HeapifyUp:
        - 1.把要插入的元素放到结尾
        - 2.依次把元素与父节点比较，当大于父节点时与父节点交换位置，一直到根节点
        - 3.长度+1
        - 4.时间复杂度: O(logN)
    - 删除堆顶操作 Delete-Max HeapifyDown：
        - 1.将堆尾元素替换到堆顶，把堆顶删掉
        - 2.从堆顶依次向下调整元素，与两个子节点比较，与两个子点中最大的交换位置，直到堆尾
        - 3.长度-1
        - 4.时间复杂度: O(logN)，与树的深度正比
    
### 5. 递归：
- 代码模板:
```phpregexp
function recursion(level,param1,param2,...){
    //recursion terminator: 递归终结条件
    if(level >= MAX_LEVEL){
        process_result
        return
    }
    
    //process logic in current level: 处理当前逻辑
    process(level,data,...)
    
    //drill down: 下探到下一层
    self.recursion(level+1,param1,param2,...)
    
    //reverse the current level status if needed: 清理当前层
}
```
- 思维要点:
    - 不要人肉递归
    - 找到最近重复子问题
    - 数学归纳法
    
- 递归优化:
    - 直接递归
    - 使用缓存保存已经访问到的数据，减少递归次数
    - 动态规化
  
