<?php
session_start();

//session terdaftar, saatnya logout

session_unset();
session_destroy();

//unset($_SESSION['id']);
header("location: index.php");
