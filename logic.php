<?php

$filecontent = file_get_contents('wordlist.txt');

$words = preg_split('/[\s]+/', $filecontent, -1, PREG_SPLIT_NO_EMPTY);

print_r($words);


