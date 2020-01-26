<?php 

class Usuario {

	private $idusuario;
	private $deslog;
	private $dessenha;
	private $dtcadastro;

	public function getIdusuario(){
		return $this->idusuario;
	}

	public function setIdusuario($value){
		$this->idusuario = $value;
	}

	public function getDeslog(){
		return $this->deslog;
	}

	public function setDeslog($value){
		$this->deslog = $value;
	}

	public function getDessenha(){
		return $this->dessenha;
	}

	public function setDessenha($value){
		$this->dessenha = $value;
	}

	public function getDtcadastro(){
		return $this->dtcadastro;
	}

	public function setDtcadastro($value){
		$this->dtcadastro = $value;
	}

	public function loadById($id){

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = :ID", array(
			":ID"=>$id
		));
		if(count($results[0]) > 0) {

			$this->setData($results[0]);

		}
	}

	public static function getList() {

		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_usuarios ORDER BY deslog;");		

	}

	public static function search($Login) {

		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_usuarios WHERE deslog LIKE :SEARCH ORDER BY deslog",array(
			':SEARCH'=>"%".$Login."%"
		));

	}

	public function login($Login, $password) {

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_usuarios WHERE deslog = :LOGIN AND dessenha = :PASSWORD", array(
			":LOGIN"=>$Login,
			":PASSWORD"=>$password
		));
		if(count($results) > 0) {

			$this->setData($results[0]);

		} else {

			throw new Exception("Login e/ou senha inválidos.");
			

		}

	}

	public function setData($data){

		$this->setIdusuario($data['idusuario']);
		$this->setDeslog($data['deslog']);
		$this->setDessenha($data['dessenha']);
		$this->setDtcadastro(new DateTime($data['dtcadastro']));

	}

	public function insert(){

		$sql = new Sql();

		$results = $sql->select("CALL sp_usuarios_insert(:LOGIN, :PASSWORD)",array(
			':LOGIN'=>$this->getDeslog(),
			':PASSWORD'=>$this->getDessenha()
		));

		if(count($results) > 0) {
			$this->setData($results[0]);
		}

	}

	public function __construct($Login = "",$password = ""){

		$this->setDeslog($Login);
		$this->setDessenha($password);

	}

	public function __toString(){

		return json_encode(array(
			"idusuario"=>$this->getIdusuario(),
			"deslog"=>$this->getDeslog(),
			"dessenha"=>$this->getDessenha(),
			"dtcadastro"=>$this->getDtcadastro()->format("d/m/Y H:i:s")));

	}

}

 ?>