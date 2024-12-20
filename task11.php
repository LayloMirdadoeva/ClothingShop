<?php

// Пример объекта для интернет-каталога
class Product {
    public $name;
    public $category; // 'мужская', 'женская', 'детская'
    public $price;

    public function __construct($name, $category, $price) {
        $this->name = $name;
        $this->category = $category;
        $this->price = $price;
    }
}

// Функция сортировки и отображения
function sortAndDisplayProducts(array $products, callable ...$criteria) {
    // Сортировка с использованием usort и указанных критериев
    usort($products, function($a, $b) use ($criteria) {
        foreach ($criteria as $criterion) {
            $result = $criterion($a, $b);
            if ($result !== 0) {
                return $result;
            }
        }
        return 0; // Если все критерии равны
    });

    // Вывод таблицы
    echo "<table border='1'>";
    echo "<tr><th>Name</th><th>Category</th><th>Price</th></tr>"; // Заголовки таблицы
    foreach ($products as $product) {
        echo "<tr><td>{$product->name}</td><td>{$product->category}</td><td>{$product->price}</td></tr>";
    }
    echo "</table>";
}

// Пример массива объектов
$products = [
    new Product('Футболка', 'мужская', 500),
    new Product('Платье', 'женская', 700),
    new Product('Кроссовки', 'мужская', 1500),
    new Product('Детская куртка', 'детская', 1200),
    new Product('Юбка', 'женская', 600),
    new Product('Шорты', 'мужская', 300),
];

// Сортируем по категории (в алфавитном порядке), затем по цене (возрастание)
sortAndDisplayProducts($products, 
    function($a, $b) {
        return strcmp($a->category, $b->category); // Сортировка по категории
    },
    function($a, $b) {
        return $a->price <=> $b->price; // Сортировка по цене
    }
);

?>
