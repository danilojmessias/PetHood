<?php
session_start();
require_once 'classe.php';



$usuario = $_POST['user'];
$senha = $_POST['psw'];

echo 'errado';
echo $usuario;
echo "<br>";
echo $senha;


$p = new Pet($GLOBALS['DBNAME'], $GLOBALS['HOST'], $GLOBALS['USER'], $GLOBALS['SENHA']);

if (!$p->verificaLogin($usuario, $senha)) {
	$_SESSION['nao_autenticado'] = true;
	header('Location: telaLogin.php');
	// exit();
} else {
	setcookie("login", true);
	$_SESSION['usuario'] = $usuario;
	header('Location: user.php');
	// exit();
}
