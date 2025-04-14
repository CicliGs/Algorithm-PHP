<?php

namespace Algorithm\Sorting;

class Searcher
{
    /**
     * Linear Search implementation
     * Time Complexity: O(n)
     * Space Complexity: O(1)
     *
     * @param array $array
     * @param mixed $target
     * @return array{found: bool, index: int|null, steps: int}
     */
    public function linearSearch(array $array, mixed $target): array
    {
        $steps = 0;

        for ($i = 0; $i < count($array); $i++) {
            $steps++;
            if ($array[$i] === $target) {
                return [
                    'found' => true,
                    'index' => $i,
                    'steps' => $steps
                ];
            }
        }

        return [
            'found' => false,
            'index' => null,
            'steps' => $steps
        ];
    }

    /**
     * Binary Search implementation
     * Time Complexity: O(log n)
     * Space Complexity: O(1)
     * Note: Array must be sorted
     *
     * @param array $array
     * @param mixed $target
     * @return array{found: bool, index: int|null, steps: int}
     */
    public function binarySearch(array $array, mixed $target): array
    {
        $steps = 0;
        $left = 0;
        $right = count($array) - 1;

        while ($left <= $right) {
            $steps++;
            $mid = floor(($left + $right) / 2);

            if ($array[$mid] === $target) {
                return [
                    'found' => true,
                    'index' => $mid,
                    'steps' => $steps
                ];
            }

            if ($array[$mid] < $target) {
                $left = $mid + 1;
            } else {
                $right = $mid - 1;
            }
        }

        return [
            'found' => false,
            'index' => null,
            'steps' => $steps
        ];
    }
}
