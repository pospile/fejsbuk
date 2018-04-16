<?php
require('partials/auth.php');
require('partials/db.php');
require('partials/ImageScan.php');
require('vendor/autoload.php');

if (isset($_POST) && count($_POST) != 0) {

    if (empty($_POST['content']) || is_null($_POST['content'])){
        die("Tohle teda ne Georgi!");
    }

    $guid = uniqid();

    if (count($_FILES) != 0 && $_FILES['file_upload']['tmp_name'] != "") {
        /*
        if ($_FILES['file_upload']['type'] != 'image/png' && $_FILES['file_upload']['type'] != 'image/jpg' && $_FILES['file_upload']['type'] != 'image/jpeg' && $_FILES['file_upload']['type'] != 'image/gif' && $_FILES['file_upload']['type'] != 'video/mp4') {
            die('Unsupported filetype uploaded.' . $_FILES['file_upload']['type']);
        }
        */
        if (file_exists('upload/' . $guid)) {
            die('File with that name already exists.');
        }
        if (!move_uploaded_file($_FILES['file_upload']['tmp_name'], 'upload/' . $guid)) {
            die('Error uploading file - check destination is writeable.');
        }


        if ($_FILES['file_upload']['type'] == 'image/png' || $_FILES['file_upload']['type'] == 'image/jpg' || $_FILES['file_upload']['type'] == 'image/jpeg' || $_FILES['file_upload']['type'] == 'image/gif') {
            $type = 'photo';
        }
        else if ($_FILES['file_upload']['type'] == 'video/mp4') {
            $type = 'video';
        }
        else {
            $type = 'unsupported';
            die ("This file type is unsupported yet.");
        }

        $sql = "INSERT into tbContent (title, description, content_url, content_type, author) values ('$guid', '{$_POST['content']}', 'upload/{$guid}', '{$type}', {$_POST['author']});";




        //echo $sql;
        $result = $conn->query($sql);
        if ($result) {
            //echo 'Povedlo se';
            if ($_FILES['file_upload']['type'] == 'image/png' || $_FILES['file_upload']['type'] == 'image/jpg' || $_FILES['file_upload']['type'] == 'image/jpeg' || $_FILES['file_upload']['type'] == 'image/gif') {
                $id = $conn->insert_id;
                $clarifai = new \DarrynTen\Clarifai\Clarifai(
                    'babda998adb94fb2b1c644411fb7076b'
                );
                $modelResult = $clarifai->getModelRepository()->predictUrl(
                    'https://underholding.cz/zlo/upload/'.$guid,
                    \DarrynTen\Clarifai\Repository\ModelRepository::GENERAL
                );

                $json = json_encode($modelResult);
                $result = $conn->query("CALL CreateAnalysis('{$json}', {$id});");
                header("location: index.php?uploaded=true&type=".$type);
            }
        }
        else {
            echo 'Nepovedlo se';
            echo $conn->error;
            header("location: index.php?uploaded=false");

        }
        $row = $result->fetch_assoc();
        //var_dump($row);


    } else {
        //echo 'je to jenom text';
        $guid = uniqid();
        //$content = $conn->real_escape_string($_POST['content']);
        $content = $_POST['content'];
        $sql = "INSERT into tbContent (title, description, content_url, content_type, author) values ('$guid', '{$content}', '', 'text', {$_POST['author']});";
        //echo $sql;
        $result = $conn->query($sql);
        if ($result) {
            //echo 'Povedlo se';
            header("location: index.php?uploaded=true");
        }
        else {
            //echo 'Nepovedlo se';
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