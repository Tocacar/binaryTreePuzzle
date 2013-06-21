<?php

class BinaryTreeNode
{
    public $value;
    public $leftChild;
    public $rightChild;

    public function __construct($value)
    {
        $this->value = $value;
    }
}

class TreePrinter
{
    public function printTree($node)
    {
        echo "$node->value\n\r";

        if ($node->leftChild) {
            $this->printTree($node->leftChild);
        }
        if ($node->rightChild) {
            $this->printTree($node->rightChild);
        }
    }

    public function printTreeByDepth($node)
    {      
        $stack = array($node);
    	while ($currentNode = array_shift($stack)) {   	  		
    		
    		echo $currentNode->value.PHP_EOL;
    		
    		$children = array();
            $this->processChildren($currentNode, $children);
            
            foreach ($children as $child) {
            	$stack[] = $child;
        	}    		        
        }                    
    }

    public function processChildren($node, &$stack) 
    {	
		if ($node->leftChild) {
        	$stack[] = $node->leftChild;
        }
        
        if ($node->rightChild) {
        	$stack[] = $node->rightChild;
        }

	}
}

$node1 = new BinaryTreeNode(1);
$node2 = new BinaryTreeNode(2);
$node3 = new BinaryTreeNode(3);
$node4 = new BinaryTreeNode(4);
$node5 = new BinaryTreeNode(5);
$node6 = new BinaryTreeNode(6);
$node7 = new BinaryTreeNode(7);

$node1->leftChild = $node2;
$node1->rightChild = $node3;
$node2->leftChild = $node4;
$node2->rightChild = $node5;
$node3->leftChild = $node6;
$node4->rightChild = $node7;

$printer = new TreePrinter();
$printer->printTree($node1);
echo PHP_EOL.PHP_EOL;
$printer->printTreeByDepth($node1);