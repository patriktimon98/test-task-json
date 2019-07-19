<?php

$json = array();

$id = $_POST['id'];

if ($id) {
    $file = file_get_contents('cat.json');

    if ($file) {
        $catsList = json_decode($file);
        unset($file);

        $i = 0;
        foreach ($catsList as $cat) {
            if ($cat->id == $id) {
                array_splice($catsList, $i, 1);
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
