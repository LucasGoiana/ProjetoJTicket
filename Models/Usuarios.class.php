<?php 

namespace Models;

use Core\Model;

class Usuarios extends Model
{	
	public function getAllUsuarios()
	{
		$sql = $this->db->prepare("SELECT p.Nome NomePerfil, u.ID_Usuario ,u.Nome NomeUsuario, u.Email, u.slug 
		FROM tb_usuario u INNER JOIN tb_perfil p ON u.ID_Perfil = p.ID_Perfil");
		$sql->execute();

		return $sql->fetchAll();
	}
	public function criarUsuario( $nome, $email, $senha,$id = 2)
	{
		if($this->validaEmail($email) == false){

			$slug  = $this->criarSlug($nome);

			$sql = $this->db->prepare(
				"
				INSERT INTO tb_usuario SET 
				ID_Perfil = :id,
				Nome  = :nome,
				Email = :email,
				Senha = :senha,
				Slug  = :slug
				"
			);
			$sql->bindValue(":id", $id);
			$sql->bindValue(":nome", $nome);
			$sql->bindValue(":email", $email);
			$sql->bindValue(":senha", $senha);
			$sql->bindValue(":slug",$slug);

			if($sql->execute()){
				return true;	
			}else{
				return false;
			}

		}else{
			return false;
		}

	}	

	private function validaEmail($email)
	{
		$sql = $this->db->prepare(
			"
			SELECT COUNT(ID_Usuario) qtdDuplicacao FROM tb_usuario WHERE Email = :email
			"
		);
		$sql->bindValue(':email',$email);
		$sql->execute();
		$qtdDuplicado = $sql->fetch();

		if($qtdDuplicado['qtdDuplicacao'] == 0 ){
			return false;
		}else{
			return true;
		}

	}
	private function criarSlug($nome)
	{
		$sql = $this->db->prepare("SHOW TABLE STATUS LIKE 'tb_usuario'");
        $sql->execute();
        $usuario = $sql->fetch();

        $slug = str_replace(' ','-', $nome);
        $slug = strtolower($slug);
        
        $slug = $slug.'-'.$usuario['Auto_increment'];

        return $slug;
	}

	public function login($email, $senha)
	{
		$sql = $this->db->prepare(
			"
			SELECT u.id_usuario, u.Nome NomeUsuario,p.id_perfil, u.slug,p.Nome NomePerfil FROM tb_usuario u
			INNER JOIN tb_perfil p ON u.ID_Perfil = p.ID_Perfil
			WHERE u.Email = :email AND u.Senha =:senha
			"
		);
		$sql->bindValue(':email',$email);
		$sql->bindValue(':senha',$senha);
		$sql->execute();

		$usuarioInfo = $sql->fetch();

		if($sql->rowCount() > 0 ){
			return $usuarioInfo;
		}else{
			return false;
		}

	}

	public function getUser($id)
	{
		$sql = $this->db->prepare(
			"
			SELECT Nome,Email FROM tb_usuario WHERE ID_Usuario = :id
			"
		);
		$sql->bindValue(':id',$id);
		$sql->execute();

		$dadosUsuario = $sql->fetch();
		//print_r($dadosUsuario);
		return $dadosUsuario;
	}

	private function editarSlug($id, $nome)
	{

        $slug = str_replace(' ','-', $nome);
        $slug = strtolower($slug);
        
        $slug = $slug.'-'.$id;

        return $slug;
	}
	private function validaEmailEditar($id, $email){
		
		$sql = $this->db->prepare(
			"
			SELECT Count(ID_Usuario) Email FROM tb_usuario  WHERE ID_Usuario !=:id
			AND Email =:email
			"
		);

		$sql->bindValue(':id',$id);
		$sql->bindValue(':email',$email);
		$sql->execute();
		$dados = $sql->fetch();

		if($dados['Email'] == 0 ){

			return true;
		}else{

			return false;
		}

		

	}
	public function editarUsuario($id, $nome, $email, $senha)
	{	
			
			
		$slug = $this->editarSlug($id, $nome);
		if($this->validaEmailEditar($id, $email)){
			if($senha !='' ){
				$query = "UPDATE tb_usuario SET 
					Nome  = :nome,
					Email = :email,
					Senha = :senha,
					Slug  = :slug 
					WHERE ID_Usuario = :id";
				$sql = $this->db->prepare($query);
				$sql->bindValue(":nome", $nome);
				$sql->bindValue(":email", $email);
				$sql->bindValue(":senha", $senha);
				$sql->bindValue(":slug",$slug);
				$sql->bindValue(':id',$id);
				$sql->execute();
			}else{
				$query = "UPDATE tb_usuario SET 
					Nome  = :nome,
					Email = :email,
					Slug  = :slug 
					WHERE ID_Usuario = :id";
				$sql = $this->db->prepare($query);
				$sql->bindValue(":nome", $nome);
				$sql->bindValue(":email", $email);
				$sql->bindValue(":slug",$slug);
				$sql->bindValue(':id',$id);
				$sql->execute();

			}
			return true;
		}else{
			return false;
		}
	}

	public function getCliente()
	{
		$sql = $this->db->prepare("SELECT ID_Usuario,Nome FROM tb_usuario WHERE ID_Perfil =2");
		$sql->execute();
		
		return $sql->fetchAll();
		
	}
	public function excluirUsuario($id)
	{

		$sql = $this->db->prepare("DELETE FROM tb_ticket WHERE ID_Usuario =:id");
		$sql->bindValue(':id', $id);
		$sql->execute();

		$sql = $this->db->prepare("DELETE FROM tb_usuario WHERE ID_Usuario =:id");
		$sql->bindValue(':id', $id);
		$sql->execute();
	}
}

?>