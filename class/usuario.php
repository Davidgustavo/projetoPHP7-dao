<?php

class Usuario {

	private $idusuario;
	private $login;
	private $logoff;
	private $cadastro;

	public function getIdusuario(){
		return $this->idusuario;
	}
	public function setIdusuario($value){
		$this->idusuario = $value;
	}
	public function getLogin(){
		return $this->login;
	}
	public function setLogin($value){
		$this->login = $value;
	} 
	public function getLogoff(){
		return $this->logoff;
	}
	public function setLogoff($value){
		$this->logoff = $value;
	} 
	public function getCadastro(){
		return $this->cadastro;
	}
	public function setCadastro($value){
		$this->cadastro = $value;
	} 
	public function loadById($id){

		$sql = new Sql();

		$resultado = $sql->select("SELECT * FROM tbusuarios WHERE idusuario = :ID", array(":ID"=>$id));
		//$resultado = $sql->select("SELECT * FROM tb_ususarios" , array(":ID"=>$id));

		if (count($resultado) > 0){

			$this->setData($resultado[0]);

			                             //Substituição pelo metodo setData
			//$row = $resultado[0];
			//$this->setIdusuario($row['idusuario']);
			//$this->setLogin($row['login']);
			//$this->setLogoff($row['logoff']);
			//$this->setCadastro($row['cadastro']);
			//$this->setCadastro(new DateTime ($row["cadastro"]));
		}		
	} 

	public static function getList(){

		$sql = new Sql();

		return $sql->select("SELECT * FROM tbusuarios ORDER BY login;");

	}

	public static function search($login){

		$sql = new Sql();

		return $sql->select("SELECT * FROM tbusuarios WHERE login LIKE :SEARCH  ORDER BY login", array(
			':SEARCH'=>"%".$login."%"

			));

	}

	public function login($login, $password){

		$sql = new Sql();

		$resultado = $sql->select("SELECT * FROM tbusuarios WHERE login = :LOGIN AND logoff = :PASSWORD", array(
		    ":LOGIN"=>$login,
		    ":PASSWORD"=>$password
		    ));
		
		if (count($resultado) > 0){
			
			$this->setData($resultado[0]);

			                                 //Substituição pelo metodo setData
			//$row = $resultado[0];
			//$this->setIdusuario($row['idusuario']);
			//$this->setLogin($row['login']);
			//$this->setLogoff($row['logoff']);
			//$this->setCadastro(new DateTime ($row["cadastro"]));
		} else {
			throw new Exception("Erro de Login e/ou Senha");

		}
	}

	public function setData($data){

		$this->setIdusuario($data['idusuario']);
		$this->setLogin($data['login']);
		$this->setLogoff($data['logoff']);
		$this->setCadastro(new DateTime($data["cadastro"]));


	}
	public function insert(){

		$sql = new Sql;

		$resultado = $sql->select("CALL sp_usuarios_insert(:LOGIN, :PASSWORD)", array(

			':LOGIN'=>$this->getLogin(),
			':PASSWORD'=>$this->getLogoff()
			));
			if (count($resultado) > 0){
				$this->setData($resultado[0]);
			}


	}
	public function update($login , $password){

		$this->setLogin($login);
		$this->setLogoff($password);

		$sql = new Sql();

		$sql->query("UPDATE tbusuarios SET login = :LOGIN, logoff = :PASSWORD WHERE idusuario = :ID", array(
			':LOGIN'=>$this->getLogin(),
			':PASSWORD'=>$this->getLogoff(),
			':ID'=>$this->getIdusuario()
			));

	}
	public function delete(){

		$sql = new Sql();

		$sql->query("DELETE FROM tbusuarios WHERE idusuario = :ID", array(
			':ID'=>$this->getIdusuario()
			));
		$this->setIdusuario(0);
		$this->setLogin("");
		$this->setLogoff("");
		$this->setCadastro(new DateTime());
	}	
	public function __construct($login = "", $password = ""){

		$this->setLogin($login);
		$this->setLogoff($password);

	}

	public function __toString(){

		return json_encode(array(
			"idusuario"=>$this->getIdusuario(),
			"login"=>$this->getLogin(),
			"logoff"=>$this->getLogoff(),
			//"cadastro"=>$this->getCadastro()
			"cadastro"=>$this->getCadastro()->format("d/m/Y H:i:s")

			));
	} 
}

?>