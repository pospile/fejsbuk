<?php

require('partials/db.php');
require("partials/Security.php");
session_start();


if (isset($_POST)){
    $name = $_POST['name'];
    $user = $_POST['email'];
    $pass = $_POST['pass'];
    $type = $_POST['type'];


    if ($type == "register") {
        $stmt = $conn->prepare("INSERT INTO tbUser (display_name, user, pass, ad_id) VALUES (?, ?, ?, ?)");
        $hash = hash('sha256', $pass);
        $security = new Security();
        $uuid = $security->UUID();
        $stmt->bind_param('ssss', $name, $user, $hash, $uuid);
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