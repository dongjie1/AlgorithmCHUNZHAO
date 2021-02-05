<?php

/**
 * 二叉树的层序遍历
 * https://leetcode-cn.com/problems/binary-tree-level-order-traversal/
 */
class Solution {

    /**
     * 迭代
     * @param TreeNode $root
     * @return Integer[][]
     */
    function levelOrder2($root) {
        $res = [];
        if(!$root) return $res;

        $nodes = [$root];
        while (!empty($nodes)){
            $len = count($nodes);
            $row = [];
            for($i=0; $i<$len; $i++){
                $node = array_shift($nodes);
                $row[] = $node->val;

                $node->left && $nodes[] = $node->left;
                $node->right && $nodes[] = $node->right;
            }

            $res[] = $row;
        }

        return $res;
    }

    /**
     * 递归 bfs
     * @param $root
     * @return array
     */
    function levelOrder($root){
        $res = [];
        if (!$root) return $res;

        $this->bfs($res,$root,0);
        return $res;
    }
    function bfs(&$res,$node,$level){
        if (!$node) return [];

        $res[$level][] = $node->val;

        $node->left && $this->bfs($res,$node->left,$level+1);
        $node->right && $this->bfs($res,$node->right,$level+1);
    }
}