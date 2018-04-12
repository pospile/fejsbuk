<?php
session_start();
if (!isset($_SESSION['user'])){
    session_regenerate_id();
    header("Location: login.php");
}