<?php
require("partials/auth.php");
require ("partials/db.php");
require ("partials/Mail.php");

$result = $conn->query("CALL resetAdID({$_SESSION['user']['id']});");

$row = $result->field_count;

$mail = new Mail();
//$mail->SendMail($_SESSION['user']['user'], 'Změna reklamního id', 'Vaše reklamní id bylo změněno. Nyní již nebudou vaše reklamy personalizovány do doby, než se vaše id znovu naučí vaše chování.');

header("location: profile.php?aff=1");