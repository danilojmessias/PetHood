<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
session_start();
require_once 'classe.php';
$p = new Pet($GLOBALS['DBNAME'], $GLOBALS['HOST'], $GLOBALS['USER'], $GLOBALS['SENHA']);

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- https://codepen.io/razeshzone/pen/WBWERE -->
    <meta charset="UTF-8" />
    <title>PetHood || Login</title>
    <link rel="shortcut icon" href="img/min_icon.png">

    <!-- Roboto import -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">

    <!-- Icones Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <!-- Bootstrap 5.2.0 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <!-- CDN Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

    <!-- Nossos estilos -->
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <div class="full-body">
        <?php
        if (isset($_SESSION['nao_autenticado'])) {
        ?>
            <div class="container">
                <div class="row p-4 bg-warning bg-opacity-25">
                    <div class="col-12 align-items-center ">
                        <div class="notification is-danger">
                            <p class="text-center"> Usuário ou senha inválidos.</p>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
        <h2>
            <button class="back-btn font-monospace" onclick="javascript:location.href='index.php'"> <i class="bi bi-arrow-left"></i> Voltar</button>
        </h2>

        <img class="bg1" src="img/bg1.svg">
        <img class="bg2" src="img/bg2.svg">
        <img class="bg3" src="img/bg3.svg">
        <!-- <img class="bg4" src="img/bg4.svg"> -->
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card my-5">

                        <form class="card-body cardbody-color p-lg-5" method="post" action="login.php">

                            <div class="text-center">
                                <img src="img/min_login.svg" class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3" width="200px" alt="profile">
                            </div>

                            <div class="mb-3">
                                <input type="text" class="form-control" id="user" name="user" maxlength="15" aria-describedby="emailHelp" placeholder="Login">
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control" id="psw" maxlength="15" name="psw" placeholder="Senha">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn-login px-5 py-1 mb-5">Login</button>
                            </div>
                            <div id="emailHelp" class="form-text text-center mb-5 text-dark">Não possui conta?
                                <a href="donoCadastro.php" class="text-dark fw-bold"> Registre-se</a>
                            </div>
                        </form>
                    </div>

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

    <!-- Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <!-- Popper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

    <!-- Datatable Js -->
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <!-- <script src="js/main.js"></script> -->

</body>

</html>