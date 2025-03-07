<?php

require_once '../controllers/UsersController.php';
header('Access-Control-Allow-Origin: http://localhost:8080');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, token");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Content-Type: application/json');

$headers = apache_request_headers();

$newUser = new UsersController();
switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        $data = $newUser->show();
        echo json_encode($data);
        break;
    case 'POST':
        $data = $newUser->save();
        echo $data;
        break;
    case 'PUT':
        $data = $newUser->update();
        echo  $data;
        break;
    case 'DELETE':
        $data = $newUser->delete();
        echo  $data;
        break;
}
