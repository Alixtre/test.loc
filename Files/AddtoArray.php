<?php
$file = fopen(ROOT_PATH . DIRECTORY_SEPARATOR . "Files" . DIRECTORY_SEPARATOR . "Logins.txt", "r");
while (!feof($file)) {
    $logins[] = explode(' ', fgets($file));
};
fclose($file);