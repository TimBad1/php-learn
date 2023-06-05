<?php
$log = 'log.txt';

interface LoggerInterface {
    public function logMessage(string $error);
    public function lastMessages(int $count);
}

interface EventListenerInterface {
    public function attachEvent(string $method, callable $funcName);
    public function detouchEvent (string $method);
}

class TelegraphText {
    private $text, $title, $author, $published, $slug;

    public function __construct($author, $slug)
    {
        $this->author;
        $this->setSlug($slug);
        $this->published = date("Y-m-d");
    }

    public function setAuthor(string $author): void
    {
        if (count($author) > 120) {
            echo 'Имя автора слишком длинное' . PHP_EOL;
            return;
        }
        $this->author = $author;
    }

    public function setSlug($slug): void
    {
        if(!preg_match('/^[\w\-]+$/i', $slug)) {
            echo 'Может содержать только буквы латинского алфавита, цифры и символы —_';
            return;
        }
        $this->slug = $slug;
    }

    public function setPublished(DateTime $published): void
    {
        if($published < date("Y-m-d")) {
            echo 'Дата должна быть больше или равна текущей' . PHP_EOL;
            return;
        }
        $this->published = $published;
    }









//$telegraph = new TelegraphText('Pushkin', 'test_text_file');
//$telegraph->showTelegraph();
//$telegraph->editText('Ещё более новая запись', 'Супер-заголовок');
//$telegraph->storeText();
//$telegraph->loadText('test_text_file');

//$new_telegraph = new FileStorage;
//$new_telegraph->create($telegraph);
//$new_telegraph->read('test_text_file');
//$new_telegraph->update('test_text_file', $telegraph);

//$new_telegraph->logMessage('first error');
//$new_telegraph->logMessage('second error');
//$new_telegraph->logMessage('third error');
//$new_telegraph->lastMessages(5);
