<?php
/**
 * 二叉树前序遍历
 */
class Solution{

    private $path = [];

    /**
     * 递归
     * @param TreeNode $root
     * @return array
     */
    function preorder($root){
        if (!$root) return [];

        $this->path[] = $root->val;
        $root->left && $this->preorder($root->left);
        $root->right && $this->preorder($root->right);
    }

    /**
     * 迭代
     * @param TreeNode $root
     */
    function preorder2($root){
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
}