<?php

$searchRoot = '../';
$searchName = 'readme.txt';
$searchResult = [];


function search_files ($dir, $name): array
{
    $result = array();
    $files = scandir($dir);

    foreach ($files as $file) {
        if (($file == '.') || ($file == '..')) continue;

        if ( is_dir($dir . $file) )
        {
            array_push($result, ...search_files ($dir . $file . '/', $name));
        }
        elseif ($file === $name) {
                $result[] = $dir . $file;
        }




    }
    return $result;
}



$searchResult = search_files( $searchRoot, $searchName);

print_r($searchResult);