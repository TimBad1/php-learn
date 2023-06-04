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

abstract class Storage implements LoggerInterface, EventListenerInterface {
    abstract function create(TelegraphText $obj);
    abstract function read($slug);
    abstract function update($slug, TelegraphText $obj);
    abstract function delete ($slug);
    abstract function list();

    public function logMessage(string $error)
    {
        $current = file_get_contents('log.txt');
        $current .= $error . PHP_EOL;
        file_put_contents('log.txt', $current);
    }

    public function lastMessages(int $count)
    {
        $lines = file('log.txt');
        if(count($lines) < $count) {
            for($i = 0; $i < count($lines); $i++) {
                echo $lines[$i];
            }
        } else {
            for($i = count($lines) - $count; $i < count($lines); $i++) {
                echo $lines[$i];
            }
        }
    }
    public function attachEvent(string $method, callable $funcName)
    {
        // TODO: Implement attachEvent() method.
    }
    public function detouchEvent(string $method)
    {
        // TODO: Implement detouchEvent() method.
    }
}

abstract class View {
    public $storage;
    public function __construct($storage) {
        $this->storage = $storage;
    }

    abstract function displayTextById($id);
    abstract function displayTextByUrl($url);
}

abstract class User implements EventListenerInterface{
    protected $id, $name, $role;
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
