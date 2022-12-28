<?php


require('../connection.php');


$query = "SELECT * FROM users";
$users = $db_conn->query($query);

$postoji = 0;
$userId = '';

while ($user = mysqli_fetch_array($users)) {

    if ($user['username'] == $_POST['username']) {

        if ($user['password'] == $_POST['password']) {
            $postoji = 1;
            $userId = $user['id'];
            break;
        }
    }
}

$res = [
    'result' => $postoji,
    'user' => $userId
];

echo json_encode($res);
