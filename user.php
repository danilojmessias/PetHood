<?php
session_start();
include 'classe.php';
include 'verifica_login.php';
$p = new Pet($GLOBALS['DBNAME'], $GLOBALS['HOST'], $GLOBALS['USER'], $GLOBALS['SENHA']);
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- https://codepen.io/razeshzone/pen/WBWERE -->
    <meta charset="UTF-8" />
    <title>PetHood || Area do Usuario</title>
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

    <?php
    if ($_SESSION['usuario']) {
        setcookie("login", true);
    } else {
        setcookie("login", false);
    }

    ?>

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
                        <li>
                            <a href="user.php">AREA DO USUÁRIO</a>
                        </li>
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

            <div class="conteudo-vago">
                <div class='row justify-content-center'>

                    <div class="titulo mt-2">
                        <div class='row justify-content-center'>
                            <div class='col-8 my-5'>
                                <?php
                                echo "<h1 class='titulo text-center p-2'>Bem-vindo(a) " . $_SESSION['usuario'] . "</h1>"
                                ?>

                            </div>
                        </div>
                    </div>

                    <div class="col-4">
                        <p class="text-start mb-3">Selecione ao lado o que deseja fazer :)</p>
                        <p class="text-start mb-3">Inclusive, por agora só realizamos cadastros e consultas a Pets, mas logo
                            logo teremos atualizações!</p>
                        <p class="text-start mb-3">Duis vel lorem id purus fringilla vulputate. Donec porttitor, odio in
                            pellentesque placerat,
                            sapien
                            sapien elementum lectus, non vehicula ipsum nulla ut nisl. Sed iaculis porttitor tellus at
                            dapibus.
                            Donec hendrerit lorem at est aliquet, a porta quam volutpat. Donec faucibus nibh eget augue
                            mattis
                            malesuada. </p>
                    </div>

                    <div class="col-4">
                        <ul class="nav d-flex flex-column user-options">
                            <li class="mb-3">
                                <a class="" href="#" data-bs-toggle="modal" data-bs-target="#telaPetCadastro">Cadastrar
                                    Pet</a>
                            </li>
                            <li class="mb-3">
                                <a class="" href="#" data-bs-toggle="modal" data-bs-target="#telaPetConsulta">Consultar
                                    Pet</a>
                            </li>
                            <li class="mb-3">
                                <a class="disabled">Marcar Consulta</a>
                            </li>
                            <li class="mb-3">
                                <a class="disabled">Verificar agenda</a>
                            </li>

                            <!-- <form action='#' method='post'>
                                <input type='submit' name='botao' value='Salvar'>
                                <input type='submit' name='botao' value='Excluir'>
                            </form> -->

                        </ul>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="telaPetCadastro" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Cadastrar Pet</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    <form method='POST' action='envioPet.php'>
                                        <div class="row justify-content-center">
                                            <div class="col-4">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="petName" name="petName" placeholder="name@example.com">
                                                    <label for="floatingInput">Nome do seu Pet 💛 </label>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-floating">
                                                    <select class="form-select" id="petPorte" name="petTipo" aria-label="petTipo">
                                                        <option value="" disabled selected> -- Selecione -- </option>
                                                        <option value="1">Cachorro 🐶</option>
                                                        <option value="2">Gato 🐱</option>
                                                        <option value="3">Codorninha 🦅</option>
                                                        <option value="4">Tartaruga 🐢</option>
                                                        <option value="5">Coelho 🐇 </option>
                                                        <option value="6">Fazenda 🐮 </option>
                                                        <option value="7">Outro 🐫 </option>
                                                    </select>
                                                    <label for="petPorte">O que ele(a) é? </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-4">
                                                <div class="form-floating mb-3">
                                                    <input type="number" class="form-control" id="petAge" name="petAge" placeholder="name@example.com">
                                                    <label for="floatingInput">Quantos aninhos ele(a) tem? </label>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-floating">
                                                    <select class="form-select" id="petPorte" name="petPorte" aria-label="petPorte">
                                                        <option value="" disabled selected> -- Selecione -- </option>
                                                        <option value="1">Pequeno</option>
                                                        <option value="2">Médio</option>
                                                        <option value="3">Grande</option>
                                                    </select>
                                                    <label for="petPorte">Porte do seu pet </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-4">
                                                <div class="form-floating mb-3">
                                                    <input type="number" class="form-control" id="petPeso" name="petPeso" placeholder="name@example.com">
                                                    <label for="petPeso">Com quantos quilinhos ele(a) tá? </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row justify-content-center ">
                                            <div class="d-grid p-4 col-2">
                                                <button type="submit" class="btn btn-dark">Enviar</button>
                                            </div>
                                        </div>
                                    </form>


                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                    <!-- <button type="submit" class="btn btn-primary">Salvar</button> -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="telaPetConsulta" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Consultar Pet</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <table id="tabelaPet" class="display" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nome</th>
                                                <th>Tipo</th>
                                                <th>Idade</th>
                                                <th>Peso</th>
                                                <th>Porte</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            $dadosdono = $p->buscaDonoId($_SESSION['usuario']);
                                            $dados = $p->buscaDadosPets($dadosdono['id_dono']);

                                            if (count($dados) > 0) {
                                                for ($i = 0; $i < count($dados); $i++) {
                                                    echo '<tr>';
                                                    foreach ($dados[$i] as $key => $value) {
                                                        echo "<td>" . utf8_encode($value) . "</td>";
                                                    }
                                            ?>
                                                    <td>
                                                        <input id='id_upd'.$i hidden value="<?php echo $dados[$i]['id_pet'];?>"/>
                                                        <a href="petCadastro.php?id_up=<?php echo $dados[$i]['id_pet']; ?>"> Editar </a>
                                                        <a onclick="confirmaExcluir(<?php echo $dados[$i]['id_pet']?>)" href="#"> Excluir </a>
                                                    </td>
                                            <?php
                                                    echo "</tr>";
                                                }
                                            }
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Nome</th>
                                                <th>Tipo</th>
                                                <th>Idade</th>
                                                <th>Peso</th>
                                                <th>Porte</th>
                                                <th></th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                </div>
                            </div>
                        </div>
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
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script> -->
    <!-- Scripts -->

    <!-- Datatable Js -->
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <!-- <script src="js/main.js"></script> -->

    <script>
        $(document).ready(function() {
            $('#tabelaPet').DataTable({
                "language": {
                    "lengthMenu": "Mostrando _MENU_ registros por página",
                    "zeroRecords": "Nada encontrado",
                    "info": "Mostrando página _PAGE_ de _PAGES_",
                    "infoEmpty": "Nenhum registro disponível",
                    "infoFiltered": "(filtrado de _MAX_ registros no total)",
                    "search": "Pesquisa:",
                    "paginate": {
                        "first": "Inicio",
                        "last": "Final",
                        "next": "Proxima",
                        "previous": "Anterior"
                    }
                }
            });
        });
    </script>
    <script>

        function confirmaExcluir(i) {
            var dialog = confirm("Deseja realmente excluir?");
            if (dialog) {
                window.location.href = "petExcluir.php?id_up="+i;
            } else {
                console.log('Data Not Saved')
            }
        }
    </script>

</body>

</html>