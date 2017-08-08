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

			$row = $resultado[0];

			$this->setIdusuario($row['idusuario']);
			$this->setLogin($row['login']);
			$this->setLogoff($row['logoff']);
			//$this->setCadastro($row['cadastro']);
			$this->setCadastro(new DateTime ($row["cadastro"]));
		}		
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