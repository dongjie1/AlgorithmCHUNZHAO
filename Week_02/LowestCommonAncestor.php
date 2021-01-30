<?php
/**
 * 二叉树的最近公共祖先
 * https://leetcode-cn.com/problems/lowest-common-ancestor-of-a-binary-tree/
 */

class Solution {
    /**
     * @param TreeNode $root
     * @param TreeNode $p
     * @param TreeNode $q
     * @return TreeNode
     *
     * 时间复杂度 O(N)
     * 空间复杂度 O(N)
     */
    function lowestCommonAncestor($root, $p, $q) {
        if ($root == null || $root->val == $p->val || $root->val == $q->val) return $root;

        $left = $this->lowestCommonAncestor($root->left,$p,$q);
        $right = $this->lowestCommonAncestor($root->right,$p,$q);

        if(!$left) return $right;
        if(!$right) return $left;

        return $root;
    }
}