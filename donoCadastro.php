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
    <title>PetHood || Cadastro</title>
    <link rel="icon" href="img/min_icon.png">

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
                <a class="navbar-brand" href="index.php">
                    <img class="logo" src="img/logo_yellow.svg">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainMenu" aria-controls="mainMenu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar icon-bar-1"></span>
                    <span class="icon-bar icon-bar-2"></span>
                    <span class="icon-bar icon-bar-3"></span>
                </button>
                <div class="collapse navbar-collapse" id="mainMenu">
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
                        // if (isset($_COOKIE['login'])) {
                        //     echo '<li><a href="user.php">AREA DO USUÁRIO</a></li>';
                        // }
                        ?>

                        <li>
                            <input type="hidden"></input>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- /.container -->
    </header>

    <div class="container">
        <div class="content">
            <!-- <div class="titulo">
                <div class='row justify-content-center'>
                    <div class='col-8 mt-4'>
                        <h1 class='text-center'>Informe seus dados :)</h1>
                    </div>
                </div>
            </div> -->

            <div class="conteudo-principal">
                <div class='row justify-content-center'>
                    <div class="col-8">
                        <div class="content">
                            <div class="row">
                                <div class="col-12">
                                    <form method='POST' action='envioDono.php'>
                                        <div class="row align-items-center">
                                            <div class="col-12">
                                                <p class='fs-5 text-center'>Dados Pessoais</p>
                                            </div>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-4">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="donoFirstName" name="donoFirstName" placeholder="name@example.com" required>
                                                    <label for="floatingInput">Primeiro nome </label>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="donoLastName" name="donoLastName" placeholder="name@example.com" required>
                                                    <label for="floatingInput">Sobrenome </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-4">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="donoTel" name="donoTel" placeholder="name@example.com" onchange="validaTel()" value='' required>
                                                    <label for="floatingInput">Telefone </label>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="donoCPF" name="donoCPF" placeholder="name@example.com" onchange="TestaCPF()" required>
                                                    <label for="floatingInput">CPF </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-8">
                                                <div class="form-floating mb-3">
                                                    <input type="email" class="form-control" id="donoEmail" name="donoEmail" placeholder="name@example.com" required>
                                                    <label for="floatingInput">E-mail </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row align-items-center">
                                            <div class="col-12">
                                                <p class='fs-5 text-center'>Endereço</p>
                                            </div>
                                        </div>

                                        <div class="row justify-content-center">
                                            <div class="col-4">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="donoCEP" name="donoCEP" placeholder="name@example.com" onblur=" pesquisacep();" required />
                                                    <label for="floatingInput">CEP </label>
                                                </div>
                                            </div>
                                            <div class="col-4">

                                            </div>
                                        </div>

                                        <div class="row justify-content-center">
                                            <div class="col-6">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="logradouro" name="logradouro" placeholder="name@example.com" required value>
                                                    <label for="floatingInput">Logradouro </label>
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <div class="form-floating mb-3">
                                                    <input type="number" class="form-control" id="donoNum" name="donoNum" placeholder="name@example.com" required>
                                                    <label for="floatingInput">Número </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-3">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="bairro" name="bairro" placeholder="name@example.com" required value>
                                                    <label for="floatingInput">Bairro </label>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-floating mb-2">
                                                    <input type="text" class="form-control" id="cidade" name="cidade" placeholder="name@example.com" required value>
                                                    <label for="floatingInput">Cidade </label>
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <div class="form-floating mb-1">
                                                    <input type="text" class="form-control" id="estado" name="estado" placeholder="name@example.com" required value>
                                                    <label for="floatingInput">Estado </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row align-items-center">
                                            <div class="col-12">
                                                <p class='fs-5 text-center'>Acesso</p>
                                            </div>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-4">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="donoUser" minleght = "3" maxlength="15" name="donoUser" placeholder="name@example.com" required>
                                                    <label for="floatingInput">Usuário </label>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-floating mb-3">
                                                    <input type="password" class="form-control" id="donoSenha" minleght = "6" maxlength="15" name="donoSenha" placeholder="name@example.com" required>
                                                    <label for="floatingInput">Senha </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row justify-content-center ">
                                            <div class="d-grid p-4 col-2">
                                                <button type="submit" class="btn btn-dark">
                                                    Enviar
                                                </button>
                                            </div>
                                        </div>
                                        <input type='hidden' name='ibge' id='ibge' value>
                                    </form>
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

    <!-- Datatable Js -->
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <!-- <script src="js/main.js"></script> -->
    <script>
        function TestaCPF() {
            var Soma = 0
            var Resto
            var cpf = document.getElementById("donoCPF");
            var teste
            strCPF = String(cpf.value).replace(/[^\d]/g, '')

            if (strCPF.length !== 11)
                teste = false

            if ([
                    '00000000000',
                    '11111111111',
                    '22222222222',
                    '33333333333',
                    '44444444444',
                    '55555555555',
                    '66666666666',
                    '77777777777',
                    '88888888888',
                    '99999999999',
                ].indexOf(strCPF) !== -1)
                teste = false

            for (i = 1; i <= 9; i++)
                Soma = Soma + parseInt(strCPF.substring(i - 1, i)) * (11 - i);

            Resto = (Soma * 10) % 11

            if ((Resto == 10) || (Resto == 11))
                Resto = 0

            if (Resto != parseInt(strCPF.substring(9, 10)))
                teste = false

            Soma = 0

            for (i = 1; i <= 10; i++)
                Soma = Soma + parseInt(strCPF.substring(i - 1, i)) * (12 - i)

            Resto = (Soma * 10) % 11

            if ((Resto == 10) || (Resto == 11))
                Resto = 0

            if (Resto != parseInt(strCPF.substring(10, 11)))
                teste = false

            if (teste == false) {
                alert('CPF invalido')
                cpf.focus();
                cpf.value = '';

            } else {

            }
        }

        function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('logradouro').value = ("");
            document.getElementById('bairro').value = ("");
            document.getElementById('cidade').value = ("");
            document.getElementById('estado').value = ("");
            document.getElementById('ibge').value = ("");
        }

        function meu_callback(conteudo) {
            if (!("erro" in conteudo)) {
                //Atualiza os campos com os valores.
                document.getElementById('logradouro').value = (conteudo.logradouro);
                document.getElementById('bairro').value = (conteudo.bairro);
                document.getElementById('cidade').value = (conteudo.localidade);
                document.getElementById('estado').value = (conteudo.uf);
                document.getElementById('ibge').value = (conteudo.ibge);
            } //end if.
            else {
                //CEP não Encontrado.
                limpa_formulário_cep();
                alert("CEP não encontrado.");
            }
        }

        function pesquisacep() {
            cep = document.getElementById('donoCEP').value;
            // alert ("teste: "+valor)
            //Nova variável "cep" somente com dígitos.
            // var cep = valor.replace(/\D/g, '');
            console.log(cep)
            //Verifica se campo cep possui valor informado.
            if (cep != "") {

                //Expressão regular para validar o CEP.
                var validacep = /^[0-9]{8}$/;

                //Valida o formato do CEP.
                if (validacep.test(cep)) {

                    //Preenche os campos com "..." enquanto consulta webservice.
                    document.getElementById('logradouro').value = "...";
                    document.getElementById('bairro').value = "...";
                    document.getElementById('cidade').value = "...";
                    document.getElementById('estado').value = "...";
                    document.getElementById('ibge').value = "...";

                    //Cria um elemento javascript.
                    var script = document.createElement('script');

                    //Sincroniza com o callback.
                    script.src = 'https://viacep.com.br/ws/' + cep + '/json/?callback=meu_callback';

                    //Insere script no documento e carrega o conteúdo.
                    document.body.appendChild(script);

                } //end if.
                else {
                    //cep é inválido.
                    limpa_formulário_cep();
                    alert("Formato de CEP inválido.");
                }
            } //end if.
            else {
                //cep sem valor, limpa formulário.
                //limpa_formulário_cep();
            }
        }


        function validaTel() {
            var tel = document.getElementById("donoTel");
            strTel = String(tel.value).replace(/[^\d]/g, '')

            if (strTel.length == 11) {
                teste = true
            } else {
                if (strTel.length == 9) {
                    teste = true;
                } else {
                    teste = false
                }
            }

            if (teste == false) {
                alert('Telefone Inválido');
                tel.focus();
                tel.value = '';
            } else {
                tel.value = strTel;
            }
        }
    </script>

</body>

</html>