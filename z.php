<?php
// Открываем исходный файл для чтения
$inputFile = 'C:\\Users\\Laylo\\Desktop\\input.txt'; // Указываем имя исходного файла
$outputFile = 'C:\\Users\\Laylo\\Desktop\\output.txt'; // Указываем имя файла, куда будем записывать результат

// Проверяем, существует ли исходный файл
if (!file_exists($inputFile)) {
    die("Файл $inputFile не существует.");
}

// Открываем файл для чтения
$inputHandle = fopen($inputFile, 'r');

// Открываем файл для записи
$outputHandle = fopen($outputFile, 'w');

// Читаем файл построчно
while (($line = fgets($inputHandle)) !== false) {
    // Заменяем символы 0 на 1 и наоборот в текущей строке
    $modifiedLine = str_replace(['0', '1'], ['1', '0'], $line);
    
    // Записываем модифицированную строку в новый файл
    fwrite($outputHandle, $modifiedLine);
}

// Закрываем оба файла
fclose($inputHandle);
fclose($outputHandle);

// Уведомление об успешной операции
echo "Замененные строки успешно записаны в файл $outputFile.";
?>
