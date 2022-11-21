<?php
require "config.php";

function AddtoArray(string $filename): array
{
    $file = fopen($filename, "r");
    while (!feof($file)) {
        $array[] = explode(' ', fgets($file));
    };
    fclose($file);
    return $array;
}
function Find(string $login, string $password, array $array): array
{
    foreach ($array as $value) {
        if (($value[1] == $login) && ($value[2] == $password)) {
            return $value;
        }
    }
    echo ("<br>User not found");
    return [null, null, null, null, null];
}

$array = AddtoArray(FILES_PATH . "Logins.txt");
echo "<pre>";
var_dump($array);
echo "<hr>";
var_dump(Find("Igor123", "pass", $array));
