<?php

require('partials/db.php');
session_start();


if (isset($_POST)){
    $name = $_POST['name'];
    $user = $_POST['email'];
    $pass = $_POST['pass'];
    $type = $_POST['type'];


    if ($type == "register") {
        $stmt = $conn->prepare("INSERT INTO tbUser (display_name, user, pass) VALUES (?, ?, ?)");
        $hash = hash('sha256', $pass);
        $stmt->bind_param('sss', $name, $user, $hash);
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

        if ($row['pass'] ==  hash('sha256', $pass)){
            $_SESSION['user'] = $row;
            header("location: index.php");
        }
        else {
            header("location: login.php?success=false");
        }

    }

}