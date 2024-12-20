<?php
function displayDirectoryStructure($dir, $indent = 0) {
    if ($handle = opendir($dir)) {
        while (false !== ($entry = readdir($handle))) {
            if ($entry != "." && $entry != "..") {
                echo str_repeat("&emsp;", $indent) . $entry . "<br>";
                if (is_dir($dir . DIRECTORY_SEPARATOR . $entry)) {
                    displayDirectoryStructure($dir . DIRECTORY_SEPARATOR . $entry, $indent + 4);
                }
            }
        }
        closedir($handle);
    } else {
        echo "Не удалось открыть каталог: $dir\n";
    }
}

$rootDir = 'C:/OSPanel/home';
if (is_dir($rootDir)) {
    displayDirectoryStructure($rootDir);
} else {
    echo "Каталог не существует: $rootDir";
}
?>