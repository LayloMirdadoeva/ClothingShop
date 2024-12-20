<?php
// Функция для создания директории
function createDirectory($dirname) {
    // Проверка существования директории
    if (is_dir($dirname)) {
        throw new Exception("Директория уже существует: " . basename($dirname));
    }

    // Создание директории
    if (!mkdir($dirname)) {
        throw new Exception("Не удалось создать директорию: " . basename($dirname));
    }

    echo "Директория успешно создана: " . basename($dirname);
}

// Пример использования функции
try {
    createDirectory("C:\\Users\\Laylo\\Desktop\\laylo_directory");
} catch (Exception $e) {
    // Обработка исключений
    echo "Ошибка: " . $e->getMessage();
}
?>

