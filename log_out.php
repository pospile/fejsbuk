<?
require("partials/auth.php");
session_destroy();
header("location: login.php?logout=true");