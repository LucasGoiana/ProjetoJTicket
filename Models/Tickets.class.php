<?php

namespace Models;

use Core\Model;

class Tickets extends Model
{
	// Metódo para pegar o Total de Tickets ser for administrador ou pegar total por Usuário
	public function getTotalTickets($id = '')
	{
		$query = "SELECT COUNT(ID_Ticket) qtdTickets FROM tb_ticket";
		if($_SESSION['id_perfil'] == 2){
			$query .= " WHERE ID_Usuario = :id";
			
			$sql = $this->db->prepare($query);
			$sql->bindValue(":id",$id);

		}else{
			$sql = $this->db->prepare($query);
		}

		$sql->execute();
		return $sql->fetch();
	}

	// Metódo para pegar o Total de Tickets por Status 
	public function getQtdTickets($status,$id = '')
	{	
		$query = "SELECT COUNT(ID_Ticket) qtdTickets FROM tb_ticket WHERE ID_Status = :status";

		if($_SESSION['id_perfil'] == 2){
			$query .= " AND ID_Usuario = :id";
			
			$sql = $this->db->prepare($query);
			$sql->bindValue(':status',$status);
			$sql->bindValue(":id",$id);

		}else{
			$sql = $this->db->prepare($query);
			$sql->bindValue(':status',$status);
		}

		
		$sql->execute();
		return $sql->fetch();
	}

	// Metódo para pegar Todos os Tickets se for Administador ou pegar Tickets por Usuário
	public function getAllTickets($id = '')
	{
		$query = "SELECT t.ID_Ticket, t.Titulo, t.Descricao, t.DataCriacao,t.Slug,
			t.ID_Status,s.Nome 
			FROM tb_ticket t INNER JOIN tb_status s ON t.ID_Status = s.ID_Status";

		if($_SESSION['id_perfil'] == 2){
			
			$query .= " WHERE ID_Usuario = :id ORDER BY t.ID_Ticket ASC";

				
			$sql = $this->db->prepare($query);
			$sql->bindValue(':id',$id);

			
		}else{
			$query .= " ORDER BY t.ID_Ticket ASC ";
			$sql = $this->db->prepare($query);
		}

		$sql->execute();

		return $sql->fetchAll();
	}

	//Metódo para pegar o ticket para ser editado
	public function getTicket($id)
	{
		$sql= $this->db->prepare("SELECT Titulo,Descricao,Slug FROM tb_ticket WHERE ID_Ticket = :id");
		$sql->bindValue(":id",$id);
		$sql->execute();

		return $sql->fetch();
	}

	//Metódo para retirar todos so carecteres especias do slug
	private function limparSlug($titulo)
	{
		$slug = preg_replace('/[áàãâä]/ui', 'a', $titulo);
	    $slug = preg_replace('/[éèêë]/ui', 'e', $slug);
	    $slug = preg_replace('/[íìîï]/ui', 'i', $slug);
	    $slug = preg_replace('/[óòõôö]/ui', 'o', $slug);
	    $slug = preg_replace('/[úùûü]/ui', 'u', $slug);
	    $slug = preg_replace('/[ç]/ui', 'c', $slug);
	    
	    $slug = preg_replace('/[^a-z0-9]/i', '_', $slug);
	    $slug = str_replace(' ', '', $slug);
	    $slug = preg_replace('/_+/', '-', $slug);
        $slug = strtolower($slug);
		return $slug;
	}

	//Metódo para criar o slug
	private function criarSlug($titulo)
	{
		$sql = $this->db->prepare("SHOW TABLE STATUS LIKE 'tb_ticket'");
        $sql->execute();
        $ticket = $sql->fetch();

       	$slug = $this->limparSlug($titulo);
        
        $slug = $slug.'-'.$ticket['Auto_increment'];

        
        return $slug;
	}

	//Metódo para editar o slug
	private function editarSlug($id, $titulo)
	{

      	$slug = $this->limparSlug($titulo);
        $slug = $slug.'-'.$id;

        return $slug;
	}

	//Metódo para criar um ticket. Sempre iniciando com o status A Iniciar(4)
	public function criarTicket($id,$titulo, $descricao)
	{
		date_default_timezone_set('America/Sao_Paulo');

		$slug = $this->criarSlug($titulo);
		$data = date('Y-m-d h:i:s');

		$sql = $this->db->prepare(
			"
			INSERT INTO tb_ticket SET
			ID_Usuario = :id,
			ID_Status = 4,
			Titulo = :titulo,
			Descricao = :descricao,
			DataCriacao = :data,
			Slug = :slug
			"
		);
		$sql->bindValue(":id",$id);
		$sql->bindValue(":titulo",$titulo);
		$sql->bindValue(":descricao",$descricao);
		$sql->bindValue(":data",$data);
		$sql->bindValue(":slug",$slug);

		if($sql->execute()){
			return true;
		}else{
			return false;
		}
	}

	//Metódo para editar um ticket. 
	public function editarTicket($id ='', $titulo, $descricao)
	{	
		
		$slug = $this->editarSlug($id, $titulo);
		$sql = $this->db->prepare(
			"
			UPDATE tb_ticket SET
			Titulo = :titulo,
			Descricao = :descricao,
			Slug = :slug
			WHERE ID_Ticket = :id
			"
		);
		$sql->bindValue(":id",$id);
		$sql->bindValue(":titulo",$titulo);
		$sql->bindValue(":descricao",$descricao);
		$sql->bindValue(":slug",$slug);

		if($sql->execute()){
			return true;
		}else{
			return false;
		}
	}

	//Metódo para excluir um ticket. 
	public function excluirTicket($id)
	{
		$sql = $this->db->prepare("DELETE FROM tb_ticket WHERE ID_Ticket = :id");
		$sql->bindValue(":id",$id);

		if($sql->execute()){
			return true;
		}else{
			return false;
		}
	}

	//Metódo para iniciar um ticket,Somente se for Adm. 

	public function iniciarTicket($id)
	{

		$sql = $this->db->prepare(
			"
			UPDATE tb_ticket SET
			ID_Status = 3
			WHERE ID_Ticket = :id			
			"
		);
		$sql->bindValue(":id",$id);

		if($sql->execute()){
			return true;
		}else{
			return false;
		}
	}

	//Metódo para finalizar um ticket 
	public function finalizarTicket($id)
	{

		$sql = $this->db->prepare(
			"
			UPDATE tb_ticket SET
			ID_Status = 1
			WHERE ID_Ticket = :id			
			"
		);
		$sql->bindValue(":id",$id);

		if($sql->execute()){
			return true;
		}else{
			return false;
		}
	}
	public function Pendente($id)
	{

		$sql = $this->db->prepare(
			"
			UPDATE tb_ticket SET
			ID_Status = 2
			WHERE ID_Ticket = :id			
			"
		);
		$sql->bindValue(":id",$id);

		if($sql->execute()){
			return true;
		}else{
			return false;
		}
	}



	
	
}