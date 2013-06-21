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
        $newData = array(); 
        $this->processChildren($node, $newData, 0);     
        print_r($newData);
    }

    public function processChildren($node, &$newData, $depth) 
    {	
		if ($depth == 0) {				
			$newData[$depth] = $node->value;
		} 
				
		$depth++;
			
		if ($node->leftChild) {
			$newData[$depth][] = $node->leftChild->value;
			$this->processChildren($node->leftChild, $newData, $depth);
	  	} 	
	  	if ($node->rightChild) {
	  		$newData[$depth][] = $node->rightChild->value;
			$this->processChildren($node->rightChild, $newData, $depth);  
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
$printer->printTreeByDepth($node1);