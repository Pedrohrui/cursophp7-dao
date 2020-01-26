<?php 

require_once("config.php");

$usuario = new Usuario();
$usuario->loadbyId(7);
$usuario->delete();
echo $usuario;





//-----------------------------------------------------
//Alterar um usuario
//$usuario = new Usuario();
//$usuario->loadbyId(8);
//$usuario->update("professor","!@#$%¨&*");
//echo $usuario;
//---------------------------------------------------
//Criando um novo usuario
//$aluno = new Usuario("aluno","@lun0");
//$aluno->insert();
//echo $aluno;
//----------------------------------------------------
//carrega um usuario usando o login e a senha
//$usuario = new Usuario();
//$usuario->login("jose","123456789");
//echo $usuario;
//------------------------------------------------------
//carrega uma lista de usuarios buscando pelo login 
//$search = Usuario::search("jo");
//echo json_encode($search);
//--------------------------------------------------------
//Carrega uma lista de usuarios
//$lista = Usuario::getList();
//echo json_encode($lista);
//-----------------------------------------------------------
//Carrega um usuario
//$root = new Usuario();
//$root->loadbyId(3);
//echo $root;
//----------------------------------------------------------
//$sql = new Sql();
//$usuarios = $sql->select("SELECT * FROM tb_usuarios");
//echo json_encode($usuarios);
?>

