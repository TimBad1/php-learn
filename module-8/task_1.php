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
        public function storeText() {
            $entry = [ 'text' => $this->text, 'title' => $this->title, 'author' => $this->author, 'published' => $this->published];
            $serFile = serialize($entry);
            file_put_contents($this->slug, $serFile);
        }

        public function loadText($slug) {
            if (file_exists($slug)) {
                $file = file_get_contents($slug);
                $unserFile = unserialize($file);
                $this->title = $unserFile['title'];
                $this->text = $unserFile['text'];
                $this->author = $unserFile['author'];
                $this->published = $unserFile['published'];
                return $unserFile['text'];

            } else {
                echo "Файл $slug не существует";
            }
        }

        public function editText($text, $title) {
                $this->text = $text;
                $this->title = $title;
        }
    }

//    $telegraph = new TelegraphText('Pushkin', 'test_text_file');
//    $telegraph->showTelegraph();
//    $telegraph->editText('Ещё более новая запись', 'Супер-заголовок');
//    $telegraph->storeText();
//    $telegraph->loadText('test_text_file');