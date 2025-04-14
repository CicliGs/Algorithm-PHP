<?php

namespace Algorithm\Queue;

class Node
{
    public $data;
    public $prev;
    public $next;

    public function __construct($data)
    {
        $this->data = $data;
        $this->prev = null;
        $this->next = null;
    }
}

class DoublyLinkedQueue
{
    private $head;
    private $tail;

    public function __construct()
    {
        $this->head = null;
        $this->tail = null;
    }

    public function enqueue($data)
    {
        $node = new Node($data);
        if ($this->isEmpty()) {
            $this->head = $node;
            $this->tail = $node;
        } else {
            $this->tail->next = $node;
            $node->prev = $this->tail;
            $this->tail = $node;
        }
    }

    public function dequeue()
    {
        if ($this->isEmpty()) {
            throw new \UnderflowException("Queue is empty");
        }
        $data = $this->head->data;
        $this->head = $this->head->next;
        if ($this->head !== null) {
            $this->head->prev = null;
        } else {
            $this->tail = null;
        }
        return $data;
    }

    public function isEmpty()
    {
        return $this->head === null;
    }
} 