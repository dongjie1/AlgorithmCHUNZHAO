<?php
class TreeNode
{
    public $val;
    public $left;
    public $right;

    public function __construct($val)
    {
        $this->val = $val;
        $this->left = null;
        $this->right = null;
    }
}

class TreeTraverse{
    public $traverse_path = [];
    /**
     * 前序遍历: 根左右
     * @param $root
     */
    public function preOrder(TreeNode $root){
        if($root){
            $this->traverse_path[] = $root->val;
            $this->preOrder($root->left);
            $this->preOrder($root->right);
        }
    }

    /**
     * 中序遍历:左根右
     * @param $root
     */
    public function inOrder(TreeNode $root){
        if($root){
            $this->inOrder($root->left);
            $this->traverse_path[] = $root->val;
            $this->inOrder($root->right);
        }
    }

    /**
     * 后序遍历: 左右根
     * @param TreeNode $root
     */
    public function postOrder(TreeNode $root){
        if($root){
            $this->postOrder($root->left);
            $this->postOrder($root->right);
            $this->traverse_path[] = $root->val;
        }
    }
}