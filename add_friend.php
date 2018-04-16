<?php
require ("partials/auth.php");
require ("partials/db.php");


if (isset($_GET)) {
    $user1 = $_GET['id'];
    $user2 = $_GET['user'];


    $user1 = $conn->real_escape_string($user1);
    $user2 = $conn->real_escape_string($user2);
    $sql = "call CreateFriendShip({$user1}, {$user2})";
    $result = $conn->query($sql);
    header("location: friends.php?aff=".$result->field_count);
}