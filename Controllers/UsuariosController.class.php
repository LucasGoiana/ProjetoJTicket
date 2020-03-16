<?php 

namespace Controllers;

Use Core\Controller;
Use Models\Usuarios;

class UsuariosController extends Controller
{
	public function index()
	{
		$dados = array();
		$u = new Usuarios();

		$dados = array("DadosUsuarios"=> $u->getAllUsuarios());

		$this->loadTemplateLogado('Usuarios/listaUsuarios',$dados);
	}

	public function criar()
	{
		if (isset($_POST['nome']) && !empty($_POST['nome'])) {
			$nome  = addslashes($_POST['nome']);
			$email = addslashes($_POST['email']);
			$senha = addslashes(md5($_POST['senha']));

			$u = new Usuarios();
			if(isset($_SESSION['id_perfil']) == 1){
				$id = $_POST['perfil'];
				if($u->criarUsuario($nome, $email, $senha,$id)){
					$dados = array("error" => "sucess");
					header("Location:".BASE_URL.'Usuarios');
				} else {
					$dados = array("error" => "duplicado");
					$this->loadTemplateLogado('Usuarios/criar-usuarios',$dados);		
				}	
				
			}else{
				if($u->criarUsuario($nome, $email, $senha)){
					$dados = array("error" => "sucess");
					$this->loadTemplateLogoff('login',$dados);		
				} else {
					$dados = array("error" => "duplicado");
					$this->loadTemplateLogoff('Usuarios/criar-usuarios',$dados);		
				}		
			}
			

		} else {
			if(isset($_SESSION['id_perfil']) == 1){
				$this->loadTemplateLogado('Usuarios/criar-usuarios');	

			}else{
				$this->loadTemplateLogoff('Usuarios/criar-usuarios');	
			}
		}
	}

	public function fazerLogin()
	{
		$email = addslashes($_POST['email']);
		$senha = addslashes(md5($_POST['senha']));

		$u = new Usuarios();

		if($u->login($email, $senha)){
			$dados = $u->login($email, $senha);
			//print_r($dados);
			$_SESSION['id_usuario'] = $dados['id_usuario'];
			$_SESSION['nome_usuario'] = $dados['NomeUsuario'];
			$_SESSION['id_perfil'] = $dados['id_perfil'];
			$_SESSION['nome_perfil'] = $dados['NomePerfil'];
			$_SESSION['slug'] = $dados['slug'];

			header("Location:".BASE_URL);

		}else{
			$dados = array("error" => "incorreto");

			$this->loadTemplateLogoff('login',$dados);		
		}

	}

	public function fazerLogoff()
	{
		session_destroy();
		header("Location:".BASE_URL);		
	}
	public function editar(){
		
		$slug = explode('/',$_GET['url']);
		$slug = end($slug);

		$id = explode('-', $slug);
		$id = end($id);

		$u = new Usuarios();

		if(isset($_POST['nome']) && !empty($_POST['nome'])){
			$nome  = addslashes($_POST['nome']);
			$email = addslashes($_POST['email']);

			if(isset($_POST['senha']) && !empty($_POST['senha'])){
				$senha = addslashes(md5($_POST['senha']));	
			}else{
				$senha = '';
			}

			if($u->editarUsuario($id, $nome, $email, $senha) == true){
				$dados = $u->getUser($id);
				$dados['error']= "sucess";

				$this->loadTemplateLogado('Usuarios/editar-usuario',$dados);		

			} else {

				$dados = $u->getUser($id);
				$dados['error']= "duplicado";
				$this->loadTemplateLogado('Usuarios/editar-usuario',$dados);		
			}

		} else {
			$dados = $u->getUser($id);
			$this->loadTemplateLogado('Usuarios/editar-usuario',$dados);	
		}
		

	}
	public function excluir()
	{
		$slug = explode('/',$_GET['url']);
		$slug = end($slug);

		$id = explode('-', $slug);
		$id = end($id);

		$u = new Usuarios();

		$u->excluirUsuario($id);
		header("Location:".BASE_URL.'Usuarios');
	}
}
