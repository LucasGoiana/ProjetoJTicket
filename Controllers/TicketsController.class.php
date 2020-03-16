<?php 

namespace Controllers;

use Core\Controller;
use Models\Tickets;
use Models\Usuarios;

class TicketsController extends Controller
{
	//Metódo para listar um ticket por Cliente ou Administador
	public function listadetickets()
	{
		$dados = array();
		$t = new Tickets();

		if($_SESSION['id_perfil'] == 2){
			$dados = array("DadosTicket"=> $t->getAllTickets($_SESSION['id_usuario']));
		}else{
			$dados = array("DadosTicket"=> $t->getAllTickets());
		}

		$this->loadTemplateLogado('tickets/listaTickets',$dados);
	}

	//Metódo para criar um ticket por Cliente ou Administador
	public function criar()
	{
		$dados = array();
		$t = new Tickets();
		$u = new Usuarios();

		if(isset($_POST['titulo']) && !empty($_POST['titulo'])){
			
			$titulo = addslashes($_POST['titulo']);
			$descricao = addslashes($_POST['descricao']);

			if($_SESSION['id_perfil'] == 2){

				if($t->criarTicket($_SESSION['id_usuario'], $titulo, $descricao)){
					header("Location:".BASE_URL."Tickets/listadetickets/".$_SESSION['slug']);	
				}else{
					$this->loadTemplateLogado('tickets/criar-ticket',$dados);
				}
			}else{
				$id = $_POST['id'];

				if($t->criarTicket($id, $titulo, $descricao)){
					 header("Location:".BASE_URL."Tickets/listadetickets/");	
				}else{
					$dados =  array('clientes' => $u->getCliente());
					$this->loadTemplateLogado('tickets/criar-ticket',$dados);
				}
				
			}
			

		}else{
			
			$dados =  array('clientes' => $u->getCliente());
			$this->loadTemplateLogado('tickets/criar-ticket',$dados);	
		}

		
	}

	//Metódo para Pegar o id
	private function getUrlId($url)
	{
		$slug = explode('/',$url);
		$slug = end($slug);

		$id = explode('-', $slug);
		$id = end($id);
		
		return $id;			
	}

	//Metódo para Editar um ticket por Cliente ou Administador
	public function editar()
	{
		$t = new Tickets();
		$u = new Usuarios();

		$id = $this->getUrlId($_GET['url']);

		if(isset($_POST['titulo']) && !empty($_POST['titulo'])){
			
			$titulo = addslashes($_POST['titulo']);
			$descricao = addslashes($_POST['descricao']);

			if($_SESSION['id_perfil'] == 2){

				if($t->editarTicket($id, $titulo, $descricao)){
				header("Location:".BASE_URL."Tickets/listadetickets/");	
				}else{
					$this->loadTemplateLogado('tickets/editar-ticket',$dados);
				}


			}else{
				if($t->editarTicket($id,$titulo, $descricao)){
					header("Location:".BASE_URL."Tickets/listadetickets/");	
				}else{
					$this->loadTemplateLogado('tickets/editar-ticket',$dados);
				}
			}
			

		}else{

			$dados = $t->getTicket($id);
			$dados['clientes'] = $u->getCliente();
			$this->loadTemplateLogado('tickets/editar-ticket',$dados);	
		}

		
	}

	//Metódo para excluir um ticket 
	public function excluir()
	{
		$id = $this->getUrlId($_GET['url']);

		$t = new Tickets;

		if($t->excluirTicket($id)){
			header("Location:".BASE_URL."Tickets/listadetickets/".$_SESSION['slug']);	
		}
	}
	
	//Metódo para iniciar um ticket somente administrador
	public function Iniciar()
	{	
		$id = $this->getUrlId($_GET['url']);
		
		$t = new Tickets;

		if($t->iniciarTicket($id)){

			header("Location:".BASE_URL."Tickets/listadetickets/".$_SESSION['slug']);	
		}

		
	}
	//Metódo para finalizar um ticket
	public function finalizar()
	{	
		$id = $this->getUrlId($_GET['url']);
		
		$t = new Tickets;

		if($t->finalizarTicket($id)){
			
			header("Location:".BASE_URL."Tickets/listadetickets/".$_SESSION['slug']);	
		}

		
	}
	
	public function Pendente()
	{	
		$id = $this->getUrlId($_GET['url']);
		
		$t = new Tickets;

		if($t->Pendente($id)){
			
			header("Location:".BASE_URL."Tickets/listadetickets/".$_SESSION['slug']);	
		}

		
	}

	
}