<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Algorithm\Sorting\Sorter;

$sorter = new Sorter();

$arrays = [
    [64, 34, 25, 12, 22, 11, 90],
    [5, 2, 8, 1, 9, 3, 7, 4, 6],
    [1, 2, 3, 4, 5, 6, 7, 8, 9],
    [9, 8, 7, 6, 5, 4, 3, 2, 1],
];

$descendingComparator = fn ($a, $b) => $b <=> $a;

foreach ($arrays as $index => $array) {
    echo 'Array #' . ($index + 1) . ': ' . implode(', ', $array) . "\n";

    echo 'Quick Sort (ascending): ' . implode(', ', $sorter->quickSort($array)) . "\n";
    echo 'Quick Sort (descending): ' . implode(', ', $sorter->quickSort($array, $descendingComparator)) . "\n";

    echo 'Merge Sort (ascending): ' . implode(', ', $sorter->mergeSort($array)) . "\n";
    echo 'Merge Sort (descending): ' . implode(', ', $sorter->mergeSort($array, $descendingComparator)) . "\n";

    echo 'Bubble Sort (ascending): ' . implode(', ', $sorter->bubbleSort($array)) . "\n";
    echo 'Bubble Sort (descending): ' . implode(', ', $sorter->bubbleSort($array, $descendingComparator)) . "\n";

    echo str_repeat('-', 50) . "\n";
}
