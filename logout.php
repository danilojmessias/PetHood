<?php
include 'verifica_login.php';
session_start();
session_destroy();
header('Location: telaLogin.php');
exit();