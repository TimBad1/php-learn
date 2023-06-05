<?php

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
