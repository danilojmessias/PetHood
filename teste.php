    
    <?php
    $cpf = $_POST['donoCPF'];
    $cpf = trim($cpf);
    $cpf = str_replace(".", "", $cpf);
    $cpf = str_replace(",", "", $cpf);
    $cpf = str_replace("-", "", $cpf);
    $cpf = str_replace("/", "", $cpf);


    echo $cpf;
    ?>