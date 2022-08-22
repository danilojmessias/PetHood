<?php
session_start();
require_once 'classe.php';
$p = new Pet($GLOBALS['DBNAME'], $GLOBALS['HOST'], $GLOBALS['USER'], $GLOBALS['SENHA']);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- https://codepen.io/razeshzone/pen/WBWERE -->
    <meta charset="UTF-8" />
    <title>PetHood || Blog</title>
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
    <link rel="stylesheet" href="css/menu.css">
</head>

<body>
    <header class="main-header">
        <div class="container">
            <nav class="navbar navbar-expand-lg main-nav px-0">
                <div class="col-2">
                    <a class="navbar-brand" href="#">
                        <img class="logo" src="img/logo_yellow.svg">
                    </a>
                </div>

                <div class="col-10">
                    <div class="d-flex flex-row-reverse" id="mainMenu">
                    <ul class="navbar-nav ml-auto text-uppercase f1">
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li>
                            <a href="blog.php">Blog</a>
                        </li>
                        <li>
                            <a href="sobre.php">Sobre</a>
                        </li>
                        <?php
                        if (isset($_SESSION['usuario'])) {
                            echo '<li><a href="user.php">AREA DO USUÁRIO</a></li>';
                        }
                        ?>
                        <li>
                            <?php
                            if (isset($_SESSION['usuario']))
                                echo '<a class="logout" href="logout.php">Logout</a>';
                            else
                                echo '<a class="login" href="telaLogin.php">Login</a>';
                            ?>
                        </li>
                        <li>
                            <input type="hidden"></input>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- /.container -->
    </header>

    <div class="container vago">
        <div class="content-vago">

            <div class="titulo">
                <div class='row justify-content-center'>
                    <div class='col-8 mt-4 mb-4'>
                        <h1 class='text-center p-2'>Blog</h1>
                    </div>
                </div>
            </div>

            <div class="conteudo-vago">
                <div class='row justify-content-center'>
                    <div class="col-4">
                        <img src="img/icon3.svg" class="image-fluid mx-auto">
                    </div>
                    <div class="col-4">
                        <h3 class="text-start">Titulo exemplo</h3>
                        <p class="text-start">Duis vel lorem id purus fringilla vulputate. Donec porttitor, odio in
                            pellentesque
                            placerat, sapien sapien elementum lectus, non vehicula ipsum nulla ut nisl. Sed iaculis
                            porttitor
                            tellus at dapibus. Donec hendrerit lorem at est aliquet, a porta quam volutpat. Donec faucibus
                            nibh
                            eget augue mattis malesuada. Sed posuere est eget vestibulum elementum. Vestibulum efficitur
                            urna
                            lorem, et luctus velit imperdiet nec. Donec erat ex, efficitur quis turpis id, bibendum suscipit
                            sapien. Suspendisse auctor est risus, at venenatis nibh fringilla quis. Donec et velit tempus,
                            commodo odio consequat, vestibulum metus. Nunc at posuere orci. Vivamus facilisis lacinia
                            pretium.
                        </p>
                    </div>
                    
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