<?php

session_start();
if (empty($_SESSION)) {
    header('location:./actionConnexion.php');
}
else {
    session_destroy();
    header('location:./index.php');
}
