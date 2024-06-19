<?php
// Обрабатываем операции с учетом смещения
function process_operations($offset, $limit) {
    // Здесь выполняется логика обработки операций
    // Например, это может быть работа с базой данных или выполнение других задач
    $operations = [];
    for ($i = $offset; $i < $offset + $limit && $i < 10000; $i++) {
        $operations[] = "Operation " . ($i + 1);
    }
    return $operations;
}

// Получаем смещение и лимит из запроса
$offset = isset($_GET['offset']) ? intval($_GET['offset']) : 0;
$limit = 1000; // Лимит операций за раз

// Обрабатываем операции
$operations = process_operations($offset, $limit);

// Определяем, закончились ли все операции
$allProcessed = ($offset + $limit) >= 10000;

// Возвращаем результат в формате JSON
echo json_encode([
    'offset' => $offset,
    'limit' => $limit,
    'operations' => $operations,
    'allProcessed' => $allProcessed
]);
