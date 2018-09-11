<?php
class Usuario{
	private $idusuario;
	private $deslogin;
	private $dessenha;
	private $dtcadastro;

	public function getIdusuario(){
		return $this->idusuario;
	}

	public function setIdusuario($idusuario){
		$this->idusuario = $idusuario;
	}

	public function getDeslogin(){
		return $this->deslogin;
	}

	public function setDeslogin($deslogin){
		$this->deslogin = $deslogin;
	}

	public function getDessenha(){
		return $this->dessenha;
	}

	public function setDessenha($dessenha){
		$this->dessenha = $dessenha;
	}

	public function getDtcadastro(){
		return $this->dtcadastro;
	}

	public function setDtcadastro($dtcadastro){
		$this->dtcadastro = $dtcadastro;
	}

	
	public function loadById($id){

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = :ID", array(
			":ID"=>$id
		));

		if(count($results) > 0){
			$this->setData($results[0]);
		}
	}

		

		public function __toString(){
			
			return json_encode(array(
				"idusuario"=>$this->getIdusuario(),
				"deslogin"=>$this->getDeslogin(),
				"dessenha"=>$this->getDessenha(),
				"dtcadastro"=>$this->getDtcadastro()->format("d/m/Y H:i:s")
			));
		}

		public static function getList(){
			$sql = new Sql();

			return $sql->select("SELECT * FROM tb_usuarios ORDER BY deslogin");
		}
	
		public static function search($login){
			$sql = new Sql();

			return $sql->select("SELECT * FROM tb_usuarios WHERE deslogin LIKE :SEARCH ORDER BY deslogin", array(
				':SEARCH'=>"%".$login."%"
			));
		}

		//passar login e senha e carregagar os dados do usuário:

		public function login($login, $password){
			$sql = new Sql();

			$results = $sql->select("SELECT * FROM tb_usuarios WHERE deslogin = :LOGIN AND dessenha = :PASSWORD" , array(
				":LOGIN"=>$login,
				":PASSWORD"=>$password
			));

			if(count($results) > 0){
				
				$this->setData($results[0]);
			}else{
				throw new Exception("Login e/ou senha inválidos");
				
			}

		}

		public function setData($data){
			$this->setIdusuario($row['idusuario']);
			$this->setDeslogin($row['deslogin']);
			$this->setDessenha($row['dessenha']);
			$this->setDtcadastro(new DateTime($row['dtcadastro']));
		}

		public function insert(){
			$sql = new Sql();
			$results = $sql->select("CALL sp_usuarios_insert(:LOGIN, :PASSWORD)", array(
				':LOGIN'=>$this->getDeslogin(),
				':PASSWORD'=>$this->getDessenha()
			));

			if(count($results) > 0){
				$this->setData($results[0]);
			}
		}
	
	
		/*

			CREATE PROCEDURE `sp_usuarios_insert` (
			pdeslogin varchar(64),
			pdessenha varchar(256)
			)
			BEGIN
				insert into tb_usuarios (deslogin, dessenha) VALUES (pdeslogin, pdessenha);
			    select * from tb_usuarios WHERE idusuario = LAST_INSERT_ID();
			END
		*/

}

?>