<?php

require_once ("config.php"); 

//use Cliente\Cadastro;
//$cad = new Cadastro();
//$cad->setNome(" Djalma Sindeaux");
//$cad->setEmail("djalma@hcode.com.br");
//$cad->setSenha("123456");
//echo $cad;
//$cad->registrarVenda();

$sql = new Sql();
$usuarios = $sql->select("select * from empresa;"); 

echo json_encode($usuarios);


?>