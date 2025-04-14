<?php

namespace Algorithm\DataStructures;

class Node
{
    public $key;
    public $value;
    public $next;

    public function __construct($key, $value)
    {
        $this->key = $key;
        $this->value = $value;
        $this->next = null;
    }
}

class HashTable
{
    private $buckets;
    private $size;

    public function __construct($size = 16)
    {
        $this->buckets = array_fill(0, $size, null);
        $this->size = $size;
    }

    private function hash($key)
    {
        return crc32($key) % $this->size;
    }

    public function put($key, $value)
    {
        $index = $this->hash($key);
        $node = new Node($key, $value);

        if ($this->buckets[$index] === null) {
            $this->buckets[$index] = $node;
        } else {
            $current = $this->buckets[$index];
            while ($current->next !== null) {
                if ($current->key === $key) {
                    $current->value = $value;
                    return;
                }
                $current = $current->next;
            }
            $current->next = $node;
        }
    }

    public function get($key)
    {
        $index = $this->hash($key);
        $current = $this->buckets[$index];

        while ($current !== null) {
            if ($current->key === $key) {
                return $current->value;
            }
            $current = $current->next;
        }

        return null;
    }

    public function remove($key)
    {
        $index = $this->hash($key);
        $current = $this->buckets[$index];
        $prev = null;

        while ($current !== null) {
            if ($current->key === $key) {
                if ($prev === null) {
                    $this->buckets[$index] = $current->next;
                } else {
                    $prev->next = $current->next;
                }
                return true;
            }
            $prev = $current;
            $current = $current->next;
        }

        return false;
    }
} 