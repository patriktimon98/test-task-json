<?php

$msql = @mysqli_connect('localhost', 'root', '');
$db = mysqli_select_db($msql, 'test_task');

$json = array();

$id = $_POST['id'];
$name = $_POST['name'];
$age = $_POST['age'];
if (!$age)
    $age = 0;
$gender = $_POST['gender'];
$color = $_POST['color'];

if ($id && $name && $gender && $color) {
    $file = file_get_contents('cat.json');

    if ($file) {
        $catsList = json_decode($file);
        unset($file);

        $i = 0;
        foreach ($catsList as $cat) {
            if ($cat->id == $id) {
                $cat->name = $name;
                $cat->age = $age;
                $cat->gender = $gender;
                $cat->color = $color;

                break;
            }
            $i++;
        }

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



