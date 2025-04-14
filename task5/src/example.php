<?php

require_once 'HashTable.php';

use Algorithm\DataStructures\HashTable;

$hashTable = new HashTable();

// Добавление элементов в хеш-таблицу
$hashTable->put('key1', 'value1');
$hashTable->put('key2', 'value2');
$hashTable->put('key3', 'value3');

// Получение элементов из хеш-таблицы
echo "key1: " . $hashTable->get('key1') . "\n";
echo "key2: " . $hashTable->get('key2') . "\n";

// Удаление элемента
$hashTable->remove('key2');

// Попытка получить удаленный элемент
echo "key2: " . $hashTable->get('key2') . "\n";

// Проверка существующих элементов
echo "key3: " . $hashTable->get('key3') . "\n";
