<?php
foreach ($logins as $value) {
    if (mb_strlen($value[2]) < 8) {
        $arr[] = $value;
    }
}
