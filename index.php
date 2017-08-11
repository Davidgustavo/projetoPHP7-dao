<?php

/*
//use Cliente\Cadastro;
//$cad = new Cadastro();
//$cad->setNome(" Djalma Sindeaux");
//$cad->setEmail("djalma@hcode.com.br");
//$cad->setSenha("123456");
//echo $cad;
//$cad->registrarVenda();

//$sql = new Sql();
//$usuarios = $sql->select("select * from empresa;"); 

//echo json_encode($usuarios);
*/

require_once ("config.php"); 

//Carrega uma lista de usuários.
//$lista = Usuario::getList();
//echo json_encode($lista);

//Carrega um usuário.
/*$emp = new Usuario();
$emp->loadbyId(2);
echo $emp;
*/

//Carrega uma lista de usuários buscando pelo Login.
//$search = Usuario::search("o");
//echo json_encode($search);

//Carrega um usuário usando Login e Senha.
//$usuario = new Usuario;
//$usuario->login("joao", "lion");
//echo $usuario;

//Criando um novo usuário
//$aluno = new Usuario("aluno","@lun0");
//$aluno->insert();
//echo $aluno;

//Alterar Um Usuario
//$usuario = new Usuario();
//$usuario->loadbyId(2);
//$usuario->update("professor", "professor");
//echo $usuario;



$usuario = new Usuario();
$usuario->loadbyId(2);
$usuario->delete();
echo $usuario;

?>

