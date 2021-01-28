<?php

/**
 * 二叉树的中序遍历
 */
class Solution {
    /**
     * 递归
     * @param TreeNode $root
     * @return int[]
     */
    private $path = [];
    public function inorder($root){
        if(!$root) return [];

        if($root->left) $this->inorder($root->left);
        $this->path[] = $root->val;
        if($root->right) $this->inorder($root->right);

        return $this->path;
    }

    /**
     * 迭代
     * @param TreeNode $root
     * @return int[]
     */
    public function inorder2($root){
        if(!$root) return [];

        $path = [];
        $stack = [];
        $cur = $root;

        while ($cur || !empty($stack)){
            if($cur){
                $stack[] = $cur;
                $cur = $cur->left;
            }else{
                $cur = array_pop($stack);
                $path[] = $cur->val;
                $cur = $cur->right;
            }
        }
        return $path;
    }
}