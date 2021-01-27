<?php
class Solution {
    /**
     * 递归
     * @param NTreeNode $root
     * @return integer[]
     */
    private $data = [];
    function preorder2($root) {
        if(!$root) return [];

        $this->data[] = $root->val;
        foreach($root->children as $child){
            $this->preorder($child);
        }

        return $this->data;
    }

    /**
     * 迭代
     * @param NTreeNode $root
     * @return array
     */
    function preorder($root){
        if (!$root) return [];

        $result = [];
        $stack = [$root];

        while (!empty($stack)){
            $node = array_pop($stack);
            $result[] = $node->val;
            for($i=count($node->children)-1; $i>=0; $i--){
                if (!empty($node->children[$i])){
                    $stack[] = $node->children[$i];
                }
            }
        }
        return $result;
    }
}