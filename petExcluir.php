<?php
session_start();
require_once 'classe.php';
include 'verifica_login.php';
echo $_GET['id_up'];
$p = new Pet($GLOBALS['DBNAME'], $GLOBALS['HOST'], $GLOBALS['USER'], $GLOBALS['SENHA']);
$p->excluirPet($_GET['id_up']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir</title>
</head>

<body>

</body>
<script>
    alert('Pet excluído com sucesso!');
    window.location.href='user.php';
</script>

</html>