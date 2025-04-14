<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Algorithm\Sorting\Searcher;

$searcher = new Searcher();

$arrays = [
    'Unsorted array' => [64, 34, 25, 12, 22, 11, 90],
    'Sorted array' => [11, 12, 22, 25, 34, 64, 90],
    'Array with duplicates' => [1, 2, 2, 3, 3, 3, 4, 5],
    'Empty array' => [],
];

$searchValues = [11, 90, 100, 3];

foreach ($arrays as $arrayName => $array) {
    echo "\nTesting array: $arrayName\n";
    echo 'Array: ' . implode(', ', $array) . "\n\n";

    foreach ($searchValues as $value) {
        echo "Searching for value: $value\n";

        // Linear Search
        $linearResult = $searcher->linearSearch($array, $value);
        echo "Linear Search:\n";
        echo '  Found: ' . ($linearResult['found'] ? 'Yes' : 'No') . "\n";
        if ($linearResult['found']) {
            echo '  Index: ' . $linearResult['index'] . "\n";
        }
        echo '  Steps: ' . $linearResult['steps'] . "\n";

        // Binary Search (only for sorted arrays)
        if ($arrayName === 'Sorted array') {
            $binaryResult = $searcher->binarySearch($array, $value);
            echo "Binary Search:\n";
            echo '  Found: ' . ($binaryResult['found'] ? 'Yes' : 'No') . "\n";
            if ($binaryResult['found']) {
                echo '  Index: ' . $binaryResult['index'] . "\n";
            }
            echo '  Steps: ' . $binaryResult['steps'] . "\n";
        }

        echo str_repeat('-', 30) . "\n";
    }

    echo str_repeat('=', 50) . "\n";
}

echo "\nAlgorithm Complexity:\n";
echo "Linear Search:\n";
echo "  Time Complexity: O(n) - в худшем случае нужно проверить все элементы\n";
echo "  Space Complexity: O(1) - используется только константное количество памяти\n\n";
echo "Binary Search:\n";
echo "  Time Complexity: O(log n) - на каждом шаге размер поиска уменьшается вдвое\n";
echo "  Space Complexity: O(1) - используется только константное количество памяти\n";
echo "  Note: Требуется отсортированный массив\n";
