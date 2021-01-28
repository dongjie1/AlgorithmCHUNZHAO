<?php
/**
 * N叉树层遍历
 * https://leetcode-cn.com/problems/n-ary-tree-level-order-traversal/
 */

class Solution{
    /**
     * @param NTreeNode $root
     *
     * 使用队列
     */
    function levelOrder($root){
        if(!$root) return [];

        $result = [];
        $queue = [$root];//先把第一层节点放入队列
        while ($queue) {
            $cur_level = [];//保存当前层节点值

            $tmp = [];//当前层节点
            foreach ($queue as $i => $q) {//遍历当前层所有节点
                $cur_level[] = $q->val;//保存当前层每个节点值
                $tmp = array_merge($tmp,$q->children);//把当前层每个节点的子节点合并成为下一层节点
            }
            $queue = $tmp;//更新queue,准备遍历下一层节点

            if(!empty($cur_level)) $result[] = $cur_level;//空节点不加到结果里
        }

        return $result;
    }
}