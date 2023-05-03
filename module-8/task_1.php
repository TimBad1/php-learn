<?php

    class TelegraphText {
        public $text, $title, $author, $published, $slug;

        public function __construct($author, $slug)
        {
            $this->author = $author;
            $this->slug = $slug;
            $this->published = date("Y-m-d H:i:s");
        }

        public function showTelegraph() {
            echo $this->author . ' ' . $this->slug . ' ' . $this->published . PHP_EOL;
    }
        public function storeText($text, $title) {
            $entry = [ 'text' => $text, 'title' => $title, 'author' => $this->author, 'published' => date("Y-m-d H:i:s")];
            $serFile = serialize($entry);
            file_put_contents($this->slug, $serFile);
        }

        public function loadText($slug) {
            if (file_exists($slug)) {
                $file = file_get_contents($slug);
                $unserFile = unserialize($file);
//                print_r($unserFile);
                return $unserFile['text'];

            } else {
                echo "Файл $slug не существует";
            }
        }

        public function editText($text, $title) {
            if (file_exists($this->slug)) {
                $file = file_get_contents($this->slug);
                $unserFile = unserialize($file);
                $unserFile['text'] = $text;
                $unserFile['title'] = $title;
                $unserFile['published'] = date("Y-m-d H:i:s");
                $serFile = serialize($unserFile);
                file_put_contents($this->slug, $serFile);
            } else {
                $this->storeText($text, $title);
            }

            //$entry = [ 'text' => $text, 'title' => $title, 'author' => $this->author, 'published' => date("Y-m-d H:i:s")];
        }
    }

    $telegraph = new TelegraphText('Pushkin', 'test_text_file');
//    $telegraph->showTelegraph();
    $telegraph->editText('Ещё более новая запись', 'Супер-заголовок');
    $telegraph->storeText('новая запись', 'Заголовок новой записи');
    $telegraph->loadText('test_text_file');


