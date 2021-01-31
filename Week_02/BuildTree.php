<?php
/**
 * 从前序遍历与中序遍历构造二叉树
 */

class Solution {
    private $inorder_map = [];
    /**
     * @param Integer[] $preorder
     * @param Integer[] $inorder
     * @return TreeNode
     */
    function buildTree($preorder, $inorder) {
        $len = count($preorder);
        $r_len = count($inorder);
        if (empty($preorder) || empty($inorder) || $len != $r_len) return null;

        $this->inorder_map = [];
        foreach ($inorder as $k => $v){
            $this->inorder_map[$v] = $k;
        }

        return $this->myBuildTree($preorder,$inorder,0,$len-1,0,$len-1);
    }

    function myBuildTree($preorder, $inorder, $pre_left, $pre_right, $in_left, $in_right){
        if (empty($inorder) || empty($inorder) || $pre_left > $pre_right) return null;

        $root = new TreeNode($preorder[$pre_left]);

        $root_index = $this->inorder_map[$preorder[$pre_left]];

        $sub_left_tree = $root_index - $in_left;

        $root->left = $this->myBuildTree($preorder,$inorder,$pre_left+1,$pre_left+$sub_left_tree, $in_left,$root_index-1);
        $root->right = $this->myBuildTree($preorder,$inorder,$pre_left+$sub_left_tree+1,$pre_right,$root_index+1,$in_right);

        return $root;
    }
}