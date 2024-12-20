<?php
// Указываем путь к исходному файлу и файлу для вывода
$inputFile = 'C:/Users/Laylo/Desktop/input.txt'; // Исходный файл
$outputFile = 'C:/Users/Laylo/Desktop/output.txt'; // Файл для записи результата

// Проверяем существование исходного файла
if (!file_exists($inputFile)) {
    die("Файл $inputFile не существует.");
}

// Открываем исходный файл для чтения
$inputHandle = fopen($inputFile, 'r');
if (!$inputHandle) {
    die("Не удалось открыть файл $inputFile для чтения.");
}

// Открываем файл для записи
$outputHandle = fopen($outputFile, 'w');
if (!$outputHandle) {
    die("Не удалось открыть файл $outputFile для записи.");
}

// Читаем файл построчно
while (($line = fgets($inputHandle)) !== false) {
    // Заменяем символы 0 на 1 и наоборот с помощью strtr
    $modifiedLine = strtr($line, '01', '10');
    
    // Записываем модифицированную строку в новый файл
    fwrite($outputHandle, $modifiedLine);
}

// Проверка на конец файла
if (!feof($inputHandle)) {
    die("Произошла ошибка при чтении файла $inputFile.");
}

// Закрываем оба файла
fclose($inputHandle);
fclose($outputHandle);

// Уведомление об успешной операции
echo "Замененные строки успешно записаны в файл $outputFile.";
?>
