<?php
// Функция для чтения содержимого файла
function readFileContent($filename) {
    try {
        // Проверка существования файла
        if (!file_exists($filename)) {
            throw new Exception("Файл не найден: $filename");
        }

        // Открытие файла
        $file = fopen($filename, "r");
        if (!$file) {
            throw new Exception("Не удалось открыть файл: $filename");
        }

        // Чтение содержимого файла
        $content = fread($file, filesize($filename));
        fclose($file);

        // Вывод содержимого файла
        echo "Содержимое файла:\n$content";
    } catch (Exception $e) {
        // Обработка исключений
        echo "Ошибка: " . $e->getMessage();
    }
}

// Пример использования функции
readFileContent("C:\Users\Laylo\Desktop\article.txt");
?>
