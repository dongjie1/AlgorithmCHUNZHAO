<?php
/**
 * 从前序遍历与中序遍历构造二叉树
 * https://leetcode-cn.com/problems/construct-binary-tree-from-preorder-and-inorder-traversal/
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

    function buildTree2($preorder,$inorder) {
        if (empty($preorder) || empty($inorder)) {
            return null;
        }

        if (count($preorder) == 1) {
            return new TreeNode($preorder[0]);
        }

        $root = new TreeNode($preorder[0]);//前序第一个即为当前子树根节点
        //从中序数组里找根节点位置
        $pos = array_search($preorder[0],$inorder);
        //分隔左右子树
        $left_pre = array_slice($preorder,1,$pos);//前序左子树
        $right_pre = array_slice($preorder,$pos+1);//前序右子树

        $left_inorder = array_slice($inorder,0,$pos);//中序左子树
        $right_inorder = array_slice($inorder,$pos+1);//中序右子树

        $root->left = $this->buildTree2($left_pre,$left_inorder);
        $root->right = $this->buildTree2($right_pre,$right_inorder);

        return $root;
    }
}