<?php

namespace Algorithm\Sorting;

class Sorter
{
    /**
     * Quick Sort implementation
     *
     * @param array $array
     * @param callable|null $comparator
     * @return array
     */
    public function quickSort(array $array, ?callable $comparator = null): array
    {
        if (count($array) <= 1) {
            return $array;
        }

        $comparator = $comparator ?? fn ($a, $b) => $a <=> $b;

        $pivot = $array[0];
        $left = [];
        $right = [];

        for ($i = 1; $i < count($array); $i++) {
            if ($comparator($array[$i], $pivot) <= 0) {
                $left[] = $array[$i];
            } else {
                $right[] = $array[$i];
            }
        }

        return array_merge(
            $this->quickSort($left, $comparator),
            [$pivot],
            $this->quickSort($right, $comparator)
        );
    }

    /**
     * Merge Sort implementation
     *
     * @param array $array
     * @param callable|null $comparator
     * @return array
     */
    public function mergeSort(array $array, ?callable $comparator = null): array
    {
        if (count($array) <= 1) {
            return $array;
        }

        $comparator = $comparator ?? fn ($a, $b) => $a <=> $b;

        $mid = floor(count($array) / 2);
        $left = array_slice($array, 0, $mid);
        $right = array_slice($array, $mid);

        $left = $this->mergeSort($left, $comparator);
        $right = $this->mergeSort($right, $comparator);

        return $this->merge($left, $right, $comparator);
    }

    /**
     * Helper method for merge sort
     *
     * @param array $left
     * @param array $right
     * @param callable $comparator
     * @return array
     */
    private function merge(array $left, array $right, callable $comparator): array
    {
        $result = [];
        $i = 0;
        $j = 0;

        while ($i < count($left) && $j < count($right)) {
            if ($comparator($left[$i], $right[$j]) <= 0) {
                $result[] = $left[$i];
                $i++;
            } else {
                $result[] = $right[$j];
                $j++;
            }
        }

        return array_merge(
            $result,
            array_slice($left, $i),
            array_slice($right, $j)
        );
    }

    /**
     * Bubble Sort implementation
     *
     * @param array $array
     * @param callable|null $comparator
     * @return array
     */
    public function bubbleSort(array $array, ?callable $comparator = null): array
    {
        $comparator = $comparator ?? fn ($a, $b) => $a <=> $b;
        $n = count($array);

        for ($i = 0; $i < $n - 1; $i++) {
            for ($j = 0; $j < $n - $i - 1; $j++) {
                if ($comparator($array[$j], $array[$j + 1]) > 0) {
                    $temp = $array[$j];
                    $array[$j] = $array[$j + 1];
                    $array[$j + 1] = $temp;
                }
            }
        }

        return $array;
    }
}
