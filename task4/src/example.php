<?php

require_once 'src/DoublyLinkedQueue.php';

use Algorithm\Queue\DoublyLinkedQueue;

function testQueue()
{
    $queue = new DoublyLinkedQueue();

    echo "Enqueue elements: 1, 2, 3\n";
    $queue->enqueue(1);
    $queue->enqueue(2);
    $queue->enqueue(3);

    echo "Dequeue elements:\n";
    while (!$queue->isEmpty()) {
        echo $queue->dequeue() . "\n";
    }

    echo "\nAttempt to dequeue from empty queue:\n";
    try {
        $queue->dequeue();
    } catch (\UnderflowException $e) {
        echo $e->getMessage() . "\n";
    }
}

testQueue(); 