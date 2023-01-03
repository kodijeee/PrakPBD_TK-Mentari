<?php
// mengaktifkan session pada php
session_start();
session_destroy();

header('location: login.php');
?>