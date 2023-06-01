<?php

class TelegraphText {
    public $text, $title, $author, $published, $slug;

    public function __construct($author, $slug)
    {
        $this->author = $author;
        $this->slug = $slug;
        $this->published = date("Y-m-d");
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
            echo 'Файл ' . $slug . ' не существует' . PHP_EOL;
        }
    }

    public function editText($text, $title) {
        $this->text = $text;
        $this->title = $title;
    }
}

abstract class Storage {
    abstract function create(TelegraphText $obj);
    abstract function read($slug);
    abstract function update($slug, TelegraphText $obj);
    abstract function delete ($slug);
    abstract function list();
}

abstract class View {
    public $storage;
    public function __construct($storage) {
        $this->storage = $storage;
    }

    abstract function displayTextById($id);
    abstract function displayTextByUrl($url);
}

abstract class User {
    public $id, $name, $role;
    abstract function getTextsToEdit();
}

class FileStorage extends Storage {
    function create(TelegraphText $obj)
    {
        var_dump($obj);
        $serFile = serialize($obj);

        if(file_exists($obj->slug . '_' . $obj->published )) {
            $count = 1;
            while ( file_exists($obj->slug . '_' . $obj->published . '_' . $count )) {
                $count++;
            }
            file_put_contents($obj->slug . '_' . $obj->published . '_' . $count, $serFile);
            $slug = $obj->slug . '_' . $obj->published . '_' . $count;
        } else {
            file_put_contents($obj->slug . '_' . $obj->published, $serFile);
            $slug = $obj->slug . '_' . $obj->published;
        }

        return $slug;
    }

    function read($slug)
    {
        if (file_exists($slug)) {
            $handle = fopen($slug, "r");
            $contents = fread($handle, filesize($slug));
            fclose($handle);
            return $contents;
        } else {
            echo "Файл $slug не существует";
        }
    }

    function update($slug, TelegraphText $obj)
    {
        if (file_exists($slug)) {
            $serFile = serialize($obj);
            file_put_contents($slug, $serFile);
        } else {
            echo 'Файл ' . $slug . ' не существует' . PHP_EOL;
        }
    }

    function delete($slug)
    {
        {
            if (file_exists($slug)) {
                unlink($slug);
            } else {
                echo 'Файл ' . $slug . ' не существует' . PHP_EOL;
            }
        }
    }

    function list()
    {
        $searchRoot = '../';
        $searchResult = [];

        $files = scandir($searchRoot);
        foreach ($files as $file) {
            if(is_subclass_of($file, 'TelegraphText') ) {
                $searchResult[] = $file;
            }
        }
    return $searchResult;
    }
}

$telegraph = new TelegraphText('Pushkin', 'test_text_file');
$telegraph->showTelegraph();
$telegraph->editText('Ещё более новая запись', 'Супер-заголовок');
$telegraph->storeText();
$telegraph->loadText('test_text_file');

$new_telegraph = new FileStorage;
$new_telegraph->create($telegraph);
$new_telegraph->read('test_text_file');
$new_telegraph->update('test_text_file', $telegraph);