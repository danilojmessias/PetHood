<!DOCTYPE html>
<html>


</html>

<?php

$GLOBALS['DBNAME'] = 'nome_do_banco_de_dados';
$GLOBALS['HOST'] = 'server';
$GLOBALS['USER'] = 'usuario';
$GLOBALS['SENHA'] = 'senha';
class Pet
{
	private $pdo;
	//constrói o objeto
	public function __construct()
	{

		try {
			$this->pdo = new PDO("mysql:dbname=" . $GLOBALS['DBNAME'] . ";host=" . $GLOBALS['HOST'], $GLOBALS['USER'], $GLOBALS['SENHA']);
		} catch (PDOException $e) {
			echo "Erro com o banco de dados: " . $e->getMessage();
			exit();
		} catch (Exception $e) {
			echo "Erro genérico: " . $e->getMessage();
		}
	}


	// Verifica Login

	public function verificaLogin($usuario, $senha)
	{
		$cmd = $this->pdo->prepare("SELECT user FROM Login WHERE user = '$usuario' and senha='$senha'");
		// print_r($cmd);
		$cmd->execute();

		if ($cmd->rowCount() == 0) {
			return false;
		} else {
			return true;
		}
	}


	//----BUSCAR ID DO DONO---
	public function buscaDonoId($usuario)
	{
		$res = array();
		$cmd = $this->pdo->prepare("SELECT id_dono FROM Cliente WHERE user_cliente='$usuario'");
		$cmd->execute();
		// echo "<br>";
		// print_r($cmd);
		$res = $cmd->fetch(PDO::FETCH_ASSOC);
		return $res;
	}
	//----CRUD PETS ----------


	public function cadastrarPet($name_pet, $id_esp, $idade_pet, $id_porte, $peso_pet, $id_dono)
	{
		$name_pet = utf8_encode($name_pet);

		$cmd = $this->pdo->prepare("INSERT INTO Pet(nome_pet,id_esp,idade_pet,id_porte,peso_pet,id_dono) 
		VALUES ('$name_pet',$id_esp,$idade_pet,$id_porte,$peso_pet,$id_dono)");
		$cmd->execute();
		//echo "<br> query cad: ";
		//print_r($cmd);
		return true;
	}

	public function buscarPet($id_pet)
	{
		$res = array();
		$cmd = $this->pdo->prepare("SELECT * FROM Pet WHERE id_pet=$id_pet");
		$cmd->execute();
		$res = $cmd->fetch(PDO::FETCH_ASSOC);

		return $res;
	}


	public function buscaDadosPets($id_dono)
	{
		$res = array();
		$cmd = $this->pdo->query("SELECT p.id_pet,p.nome_pet,e.especie,p.idade_pet,p.peso_pet,po.porte 
			FROM Pet p 
			JOIN Especie e on e.id_esp = p.id_esp 
			JOIN Porte po on p.id_porte = po.id_porte 
			WHERE p.id_dono = $id_dono
		");
		$res = $cmd->fetchAll(PDO::FETCH_ASSOC);
		// echo "<br>";
		// print_r($cmd);
		// echo "<br>";
		return $res;
	}
	public function atualizarPet($id_upd, $name_pet, $id_esp, $idade_pet, $id_porte, $peso_pet)
	{
		$cmd = $this->pdo->prepare("UPDATE Pet 
		SET nome_pet = '$name_pet', id_esp = $id_esp, idade_pet = $idade_pet,id_porte = $id_porte,peso_pet=$peso_pet 
		WHERE id_pet =$id_upd");
		$cmd->execute();
		return true;
		// echo 'query: ';
		// print_r($cmd);
	}

	public function excluirPet($id_upd)
	{
		$cmd = $this->pdo->prepare("DELETE FROM Pet WHERE id_pet=$id_upd");
		$cmd->execute();
		//print_r($cmd);
		return true;
	}

	//----CRUD DONO -----

	public function cadastrarDono($tel_dono, $nome_dono, $email_dono, $cpf, $user_cliente)
	{
		$cmd = $this->pdo->prepare("SELECT cpf FROM Cliente WHERE cpf = $cpf");
		$cmd->execute();
		if ($cmd->rowCount() > 0) {
			return false;
		} else {
			$cmd = $this->pdo->prepare("SELECT user_cliente FROM Cliente where user_cliente = '$user_cliente'");
			//echo "<br> user query:";
			//print_r($cmd);
			$cmd->execute();
			if ($cmd->rowCount() > 0) {
				return false;
			} else {
				$cmd = $this->pdo->prepare("SELECT email_dono FROM Cliente where email_dono = '$email_dono'");
				//echo "<br> user query:";
				//print_r($cmd);
				$cmd->execute();
				if ($cmd->rowCount() > 0) {
					return false;
				} else {
					$nome_dono = utf8_decode($nome_dono);
					$email_dono = utf8_decode($email_dono);
					$user_cliente = utf8_decode($user_cliente);
					$cmd = $this->pdo->prepare("INSERT INTO Cliente(tel_dono,nome_dono,email_dono,cpf,user_cliente) 
				VALUES ($tel_dono,'$nome_dono','$email_dono','$cpf','$user_cliente')");
					$cmd->execute();
					//print_r($cmd);
					return true;
				}
			}
		}
	}
	public function cadastrarEndereco($id_dono, $logradouro, $cidade, $estado, $cep)
	{
		$logradouro = utf8_decode($logradouro);
		$cidade = utf8_decode($cidade);
		$estado = utf8_decode($estado);
		$cmd = $this->pdo->prepare("INSERT INTO Endereco(id_dono,logradouro,cidade,estado,cep) 
		VALUES ($id_dono,'$logradouro','$cidade','$estado','$cep')");
		$cmd->execute();
		// echo "<br>query end: ";
		// print_r($cmd);
		// echo "<br>";
		return true;
	}
	public function cadastrarLogin($user, $senha, $nivel)
	{
		$cmd = $this->pdo->prepare("SELECT user FROM Login where user = '$user'");
		echo "<br> login query:";
		//print_r($cmd);
		$cmd->execute();
		if ($cmd->rowCount() > 0) {
			return false;
		} else {
			$cmd = $this->pdo->prepare("INSERT INTO Login (user,senha,nivel) 
			VALUES ('$user', '$senha', $nivel);");
			$cmd->execute();
			return true;
		}
	}



	//debugs
	// public function teste()
	// {
	// 	$res = array();
	// 	$cmd = $this->pdo->prepare("SELECT * FROM pets");
	// 	$cmd->execute();
	// 	$res = $cmd->fetchAll();
	// 	print_r($cmd);
	// 	return $res;
	// }

	// public function teste2()
	// {
	// 	$cmd = $this->pdo->prepare("INSERT INTO epiz_31597876_inter.pets(nome_pet,tipo_pet,idade_pet,porte_pet,peso_pet) VALUES ('ozzy',2,7,2,5)");
	// 	$cmd->execute();
	// 	echo "abaixo temos algo: ";
	// 	print_r($cmd);
	// 	return true;
	// }
}
