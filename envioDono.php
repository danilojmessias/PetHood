<?php

session_start();
require_once 'classe.php';

$p = new Pet($GLOBALS['DBNAME'], $GLOBALS['HOST'], $GLOBALS['USER'], $GLOBALS['SENHA']);
if (isset($_POST['donoFirstName'])) {
    //dados pessoais
    $nome_dono = $_POST['donoFirstName'] . ' ' . $_POST['donoLastName'];
    $tel_dono = $_POST['donoTel'];
    $email_dono = $_POST['donoEmail'];
    $cpf = $_POST['donoCPF'];

    //endereco

    $logradouro =  $_POST['logradouro'] . ', ' . $_POST['donoNum'] . ' - ' . $_REQUEST['bairro'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $cep =  $_POST['donoCEP'];

    //acesso
    $donoUser = $_POST['donoUser'];
    $donoSenha = $_POST['donoSenha'];
    //querys
    $resultado = $p->cadastrarDono($tel_dono, $nome_dono, $email_dono, $cpf, $donoUser);
    if ($resultado == false) {
?>
        <script>
            alert('Falha no cadastro dono entre em contato com o suporte. Tel: 7070-7070');
            window.location.href = 'telaLogin.php';
        </script>
        <?php
    } else {
        $dados = $p->buscaDonoId($donoUser);
        $resultado = $p->cadastrarEndereco($dados['id_dono'], $logradouro, $cidade, $estado, $cep);

        if ($resultado == false) {
        ?>
            <script>
                alert('Falha no cadastro endereco entre em contato com o suporte. Tel: 7070-7070');
                window.location.href = 'telaLogin.php';
            </script>
            <?php
        } else {
            $resultado = $p->cadastrarLogin($donoUser, $donoSenha, 1);
            if ($resultado == false) {
            ?>
                <script>
                    alert('Falha no cadastro login entre em contato com o suporte. Tel: 7070-7070');
                    window.location.href = 'telaLogin.php';
                </script>
            <?php
            } else {
            ?>
                <script>
                    alert('Enviado com Sucesso, logue com seu usuario e senha');
                    window.location.href = 'telaLogin.php';
                </script>
<?php
            }
        }
    }
}
?>
<?php
if (isset($_GET['id_up'])) {
    $id_update = addslashes($_GET['id_up']);
    $res = $p->buscarPet($id_update);
}
?>

<head>
    <meta charset="UTF-8" />
    <title>Pet WebHolder</title>
    <link rel="shortcut icon" href="img/min_icon.png">

    <!-- Roboto import -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <div class="content">
            <div class="titulo">
                <div class='row justify-content-center'>
                    <div class='col-8 mt-4 mb-4'>
                        
                    </div>
                </div>
            </div>

            <div class="conteudo-principal">
                <div class='row justify-content-center'>
                    <!-- Pode colocar o conteudo aqui -->
                    <!-- Esse texto abaixo é só uma estrutura de exemplo -->
                    <div class="col-4">
                        <img src="img/icon1.svg" class="image-fluid">
                    </div>
                    <div class="col-4">
                        
                    </div>
                    <!-- Ou aqui -->
                </div>
            </div>

        </div>
    </div>

    <div class="main-footer bg-dark">
        <div class="container">
            <footer id="sticky-footer" class="flex-shrink-0 py-4 text-white-50">
                <div class="container text-center">
                    <small>Feito com ❤️ por <a href="https://github.com/danileras" target="_blank">Danilo Messias</a> e <a href="https://github.com/DonTheGust" target="_blank">Gustavo Lourenço</a>, Copyright &copy;</small>
                </div>
            </footer>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- Scripts -->
    <script src="scripts/index.js"></script>
</body>

</html>