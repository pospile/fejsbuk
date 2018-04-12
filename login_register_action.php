<?php

require('partials/db.php');
session_start();


if (isset($_POST)){
    //var_dump($_POST);
    $name = $_POST['name'];
    $user = $_POST['email'];
    $pass = $_POST['pass'];
    $type = $_POST['type'];


    if ($type == "register") {
        var_dump($type == "register");
        $stmt = $conn->prepare("INSERT INTO tbUser (display_name, user, pass) VALUES (?, ?, ?)");
        $stmt->bind_param('sss', $name, $user, hash('sha256', $pass));
        /* execute query */
        $stmt->execute();
        /* bind result variables */
        /* fetch value */
        $results = $stmt->fetch();

        $sql = "select * from tbUser where user = '". $conn->real_escape_string($user) ."'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();


        $_SESSION['user'] = $row;
        header("Location: index.php?success=zaregistrováno");
    }

    else {
        $sql = "select * from tbUser where user = '". $conn->real_escape_string($user) ."'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        var_dump($row);

        if ($row['pass'] ==  hash('sha256', $pass)){
            //var_dump("auth true");
            $_SESSION['user'] = $row;
            header("location: index.php");
        }
        else {
            header("location: login.php?success=false");
        }

    }

}