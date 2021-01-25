### 1.二叉树的遍历:
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