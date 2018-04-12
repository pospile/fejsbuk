<?php
require('partials/auth.php');
require('partials/db.php');

if (isset($_POST) && count($_POST) != 0) {

    if (count($_FILES) != 0 && $_FILES['file_upload']['tmp_name'] != "") {
        if ($_FILES['file_upload']['type'] != 'image/png' && $_FILES['file_upload']['type'] != 'image/jpg' && $_FILES['file_upload']['type'] != 'image/jpeg' && $_FILES['file_upload']['type'] != 'image/gif') {
            die('Unsupported filetype uploaded.');
        }
        if (file_exists('upload/' . $_FILES['file_upload']['name'])) {
            die('File with that name already exists.');
        }
        if (!move_uploaded_file($_FILES['file_upload']['tmp_name'], 'upload/' . $_FILES['file_upload']['name'])) {
            die('Error uploading file - check destination is writeable.');
        }

        $guid = uniqid();
        $sql = "INSERT into tbContent (title, description, content_url, content_type, author) values ('$guid', '{$_POST['content']}', 'upload/{$_FILES['file_upload']['name']}', 'photo', {$_POST['author']});";
        echo $sql;
        $result = $conn->query($sql);
        if ($result) {
            echo 'Povedlo se';
            header("location: index.php?uploaded=true");
        }
        else {
            echo 'Nepovedlo se';
            echo $conn->error;
        }
        $row = $result->fetch_assoc();
        var_dump($row);


    } else {
        echo 'je to jenom text';
        $guid = uniqid();
        $sql = "INSERT into tbContent (title, description, content_url, content_type, author) values ('$guid', '{$_POST['content']}', '', 'text', {$_POST['author']});";
        echo $sql;
        $result = $conn->query($sql);
        if ($result) {
            echo 'Povedlo se';
            header("location: index.php?uploaded=true");
        }
        else {
            echo 'Nepovedlo se';
            echo $conn->error;
        }
        /*
        $stmt = $conn->prepare("INSERT INTO tbUser (display_name, user, pass) VALUES (?, ?, ?)");
        $stmt->bind_param('sss', $name, $user, hash('sha256', $pass));
        $stmt->execute();
        $results = $stmt->fetch();
        */
    }
} else {
    header('Content-type:application/json;charset=utf-8');
    $data = ['error' => true, 'desc' => 'no data received'];
    print json_encode($data);
}