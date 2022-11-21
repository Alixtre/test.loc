<?php
$file = fopen(FILES_PATH . "Logins.txt", "r");
while (!feof($file)) {
    $logins[] = explode(' ', fgets($file));
};
fclose($file);