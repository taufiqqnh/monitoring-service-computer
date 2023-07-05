<?php
session_start();

//session terdaftar, saatnya logout

session_unset();
session_destroy();

//unset($_SESSION['id']);
//unset($_SESSION['status']);
header("location: index.php");
