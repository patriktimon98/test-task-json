<?php

$json = array();

$id = uniqid();
$name = $_POST['name'];
$age = $_POST['age'];
if (!$age)
    $age = 0;
$gender = $_POST['gender'];
$color = $_POST['color'];

if ($name && $gender && $color) {
    $file = file_get_contents('cat.json');

    if ($file) {
        $catsList = json_decode($file);
        unset($file);
        $catsList [] = array('id' => $id, 'name' => $name, 'age' => $age, 'gender' => $gender, 'color' => $color);
        $result = file_put_contents('cat.json', json_encode($catsList));
        unset($catsList);

        if ($result) {
            $json['data'] = 'ok';
            echo json_encode($json);
        } else {
            $json['data'] = 'error';
            echo json_encode($json);
        }
    } else {
        $json['data'] = 'error';
        echo json_encode($json);
    }
} else {
    $json['data'] = 'empty';
    echo json_encode($json);
}



