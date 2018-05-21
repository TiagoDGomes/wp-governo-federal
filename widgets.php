<?php

$path = __DIR__ . "/widgets/";

if ($handle = opendir($path)) {
    while (false !== ($file = readdir($handle))) {
        if ('.' === $file) continue;
        if ('..' === $file) continue;

        include_once($path . $file);
    }
    closedir($handle);
}