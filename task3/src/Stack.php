<?php

namespace Algorithm\Stack;

class Node
{
    public $data;
    public $next;

    public function __construct($data)
    {
        $this->data = $data;
        $this->next = null;
    }
}

class Stack
{
    private $top;

    public function __construct()
    {
        $this->top = null;
    }

    public function push($data)
    {
        $node = new Node($data);
        $node->next = $this->top;
        $this->top = $node;
    }

    public function pop()
    {
        if ($this->isEmpty()) {
            throw new \UnderflowException("Stack is empty");
        }
        $data = $this->top->data;
        $this->top = $this->top->next;
        return $data;
    }

    public function isEmpty()
    {
        return $this->top === null;
    }
}

function reverseString($string)
{
    $stack = new Stack();
    $length = mb_strlen($string);

    for ($i = 0; $i < $length; $i++) {
        $stack->push(mb_substr($string, $i, 1));
    }

    $reversed = '';
    while (!$stack->isEmpty()) {
        $reversed .= $stack->pop();
    }

    return $reversed;
}
