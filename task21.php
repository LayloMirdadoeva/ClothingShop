<?php
abstract class Publication {
    protected $title;
    protected $author;
    protected $text;
    protected $date;
    protected $location;

    // Конструктор
    public function __construct($title, $author, $text, $date, $location) {
        $this->title = $title;
        $this->author = $author;
        $this->text = $text;
        $this->date = $date;
        $this->location = $location;
    }

    // Абстрактный метод для печати издания
    abstract public function printPublication();
}

class Article extends Publication {
    // Конструктор
    public function __construct($title, $author, $text, $date, $location) {
        parent::__construct($title, $author, $text, $date, $location);
    }

    // Метод для чтения информации из текстового файла
    public static function fromFile($filePath) {
        $data = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        if ($data === false || count($data) < 5) {
            throw new Exception("Ошибка чтения файла или недостаточно данных в файле: $filePath");
        }
        return new self($data[0], $data[1], $data[2], $data[3], $data[4]);
    }

    // Реализация метода печати издания
    public function printPublication() {
        echo "Статья: $this->title\n";
        echo "Автор: $this->author\n";
        echo "Текст: $this->text\n";
        echo "Дата: $this->date\n";
        echo "Место: $this->location\n";
    }
}

class News extends Publication {
    // Конструктор
    public function __construct($title, $author, $text, $date, $location) {
        parent::__construct($title, $author, $text, $date, $location);
    }

    // Метод для чтения информации из текстового файла
    public static function fromFile($filePath) {
        $data = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        if ($data === false || count($data) < 5) {
            throw new Exception("Ошибка чтения файла или недостаточно данных в файле: $filePath");
        }
        return new self($data[0], $data[1], $data[2], $data[3], $data[4]);
    }

    // Реализация метода печати издания
    public function printPublication() {
        echo "Новость: $this->title\n";
        echo "Автор: $this->author\n";
        echo "Текст: $this->text\n";
        echo "Дата: $this->date\n";
        echo "Место: $this->location\n";
    }
}

class Add extends Publication {
    // Конструктор
    public function __construct($title, $author, $text, $date, $location) {
        parent::__construct($title, $author, $text, $date, $location);
    }

    // Метод для чтения информации из текстового файла
    public static function fromFile($filePath) {
        $data = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        if ($data === false || count($data) < 5) {
            throw new Exception("Ошибка чтения файла или недостаточно данных в файле: $filePath");
        }
        return new self($data[0], $data[1], $data[2], $data[3], $data[4]);
    }

    // Реализация метода печати издания
    public function printPublication() {
        echo "Объявление: $this->title\n";
        echo "Автор: $this->author\n";
        echo "Текст: $this->text\n";
        echo "Дата: $this->date\n";
        echo "Место: $this->location\n";
    }
}

// Пример использования
try {
    $article = Article::fromFile('C:\\Users\\Laylo\\Desktop\\article.txt');
    $news = News::fromFile('C:\\Users\\Laylo\\Desktop\\news.txt');
    $add = Add::fromFile('C:\\Users\\Laylo\\Desktop\\add.txt');

    $article->printPublication();
    echo "\n";
    $news->printPublication();
    echo "\n";
    $add->printPublication();
} catch (Exception $e) {
    echo "Ошибка: " . $e->getMessage();
}
?>
