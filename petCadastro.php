<?php
session_start();
include('verifica_login.php');
require_once 'classe.php';
$p = new Pet($GLOBALS['DBNAME'],$GLOBALS['HOST'],$GLOBALS['USER'], $GLOBALS['SENHA']);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<!-- https://codepen.io/razeshzone/pen/WBWERE -->

	<meta charset="UTF-8" />
	<title>PetHood || Editar Pet</title>
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

	<?php

	if ($_POST['petName'] != '') {
		if ($_GET['id_up'] != '') {
			$id_upd = $_GET['id_up'];
		}
	}
	if ($_GET['id_up'] != '') {
		$id_update = $_GET['id_up'];
		$res = $p->buscarPet($id_update);
		$att = 1;
	}
	?>
	<header class="main-header">
        <div class="container">
            <nav class="navbar navbar-expand-lg main-nav px-0">
                <div class="col-2">
                    <a class="navbar-brand" href="index.php">
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

            <div class="conteudo-vago">
                <div class='row justify-content-center'>

                    <div class="titulo mt-2">
                        <div class='row justify-content-center'>
                            <div class='col-8 my-5'>
                                <h1 class='titulo text-center p-2'>Editar Pet</h1>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 mt-5">
                            <form method='POST' action='envioPet.php'>
                                <? if ($_GET['id_up'] != '') {
                                ?>
                                    <input type='hidden' name='att' id='att' value='<?php echo $att ?>' readonly='true'>
                                    <input type='hidden' name='id_upd' id='id_upd' value='<?php echo $id_update ?>' readonly='true' >
                                <?
                                }
                                ?>
                                <div class="row justify-content-center">
                                    <div class="col-4">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="petName" name="petName" placeholder="name@example.com" value="<?php if ($res != '') {
                                                                                                                                                            echo $res['nome_pet'];
                                                                                                                                                        } ?>" required>
                                            <label for="floatingInput">Nome do seu Pet 💛 </label>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-floating">
                                            <select class="form-select" id="petPorte" name="petTipo" aria-label="petTipo" required>
                                                <option value="" disabled <?php if (!isset($res)) { ?>selected<? } ?>> -- Escolha aqui -- </option>
                                                <option value="1" <?php if ($res['id_esp'] == 1) { ?>selected<? } ?>> Cachorro 🐶</option>
                                                <option value="2" <?php if ($res['id_esp'] == 2) { ?>selected<? } ?>> Gato 🐱</option>
                                                <option value="3" <?php if ($res['id_esp'] == 3) { ?>selected<? } ?>> Codorninha 🦅</option>
                                                <option value="4" <?php if ($res['id_esp'] == 4) { ?>selected<? } ?>> Tartaruga 🐢</option>
                                                <option value="5" <?php if ($res['id_esp'] == 5) { ?>selected<? } ?>> Coelho 🐇 </option>
                                                <option value="6" <?php if ($res['id_esp'] == 6) { ?>selected<? } ?>> Fazenda 🐮 </option>
                                                <option value="7" <?php if ($res['id_esp'] == 7) { ?>selected<? } ?>> Outro 🐫 </option>
                                            </select>
                                            <label for="petPorte">O que ele(a) é? </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-4">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="petAge" name="petAge" placeholder="name@example.com" value="<?php if ($res != '') {
                                                                                                                                                            echo $res['idade_pet'];
                                                                                                                                                        } ?>"required>
                                            <label for=" floatingInput">Quantos aninhos ele(a) tem? </label>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-floating">
                                            <select class="form-select" id="petPorte" name="petPorte" aria-label="petPorte" required>
                                                <option value="" disabled <?php if (!isset($res)) { ?>selected<? } ?>> -- Escolha aqui -- </option>
                                                <option value="1" <?php if ($res['id_porte'] == 1) { ?>selected<? } ?>>Pequeno</option>
                                                <option value="2" <?php if ($res['id_porte'] == 2) { ?>selected<? } ?>>Médio</option>
                                                <option value="3" <?php if ($res['id_porte'] == 3) { ?>selected<? } ?>>Grande</option>
                                            </select>
                                            <label for="petPorte">Porte do seu pet </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-4">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="petPeso" name="petPeso" placeholder="name@example.com" value="<?php if ($res != '') {
                                                                                                                                                            echo $res['peso_pet'];
                                                                                                                                                        } ?>"required>
                                            <label for=" petPeso">Com quantos quilinhos ele(a) tá? </label>
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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<!-- Scripts -->
	<script src="scripts/index.js"></script>

</body>


