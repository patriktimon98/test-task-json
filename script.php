<?php

$catsList = json_decode(file_get_contents('cat.json'));

if ($catsList)
    include('script.html');
else
    echo "List is empty";




