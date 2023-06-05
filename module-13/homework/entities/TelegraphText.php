<?php
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

    public function __get($name){
        switch ($name) {
            case 'published':
                return $this->published;
            case 'slug':
                return $this->slug;
            case 'author':
                return $this->author;
            case 'text':
                return $this->loadText();
            //            case 'title':
        //                return $this->title;
        }
    }

    public function __set($name, $value){

        switch ($name) {
            case 'published':
                $this->setPublished($value);
                break;
            case 'slug':
                $this->setSlug($value);
                break;
            case 'author':
                $this->setAuthor($value);
                break;
            case 'text':
                $this->storeText($value);
                break;
            //            case 'title':
            //                $this->title = $value;
        }
    }
    public function showTelegraph(): void
    {
        echo $this->author . ' ' . $this->slug . ' ' . $this->published . PHP_EOL;
    }
    private function storeText(): void
    {
        $entry = [ 'text' => $this->text, 'title' => $this->title, 'author' => $this->author, 'published' => $this->published];
        $serFile = serialize($entry);
        file_put_contents($this->slug, $serFile);
    }

    private function loadText($slug) {
        if (file_exists($slug)) {
            $file = file_get_contents($slug);
            $unserFile = unserialize($file);
            $this->title = $unserFile['title'];
            $this->text = $unserFile['text'];
            $this->author = $unserFile['author'];
            $this->published = $unserFile['published'];
            return $unserFile['text'];
        } else {
            echo 'Файл ' . $slug . ' не существует' . PHP_EOL;
        }
    }

    public function editText($text, $title) {
        $this->text = $text;
        $this->title = $title;
    }
}