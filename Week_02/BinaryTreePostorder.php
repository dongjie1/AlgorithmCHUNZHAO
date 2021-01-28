<?php
/**
 * 二叉树后序遍历
 */

class Solution{
    /**
     * 递归
     * @param TreeNode $root
     */
    private $path = [];
    function postorder($root) {
        if (!$root) return [];

        $root->left && $this->postorder($root->left);
        $root->right && $this->postorder($root->right);
        $this->path[] = $root->val;

        return $this->path;
    }

    /**
     * 迭代: 先遍历为根右左的顺序，再返回即为后序遍历的左右根
     * @param TreeNode $root
     */
    function postorder2($root){
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
}