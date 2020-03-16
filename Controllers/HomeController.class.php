<?php 

namespace Controllers;

use Core\Controller;
use Models\Tickets;

class HomeController extends Controller
{

    public function index()
    {
      
      if(isset($_SESSION['id_usuario']) || !empty($_SESSION['id_usuario'])){
  
       	$t = new Tickets();

      	if($_SESSION['id_perfil'] == 2){

      		$dados = array(
            'totalTickets' =>  $t->getTotalTickets($_SESSION['id_usuario']),
            'totalTicketsFinalizados' =>  $t->getQtdTickets(1,$_SESSION['id_usuario']),
            'totalTicketsPendentes' =>  $t->getQtdTickets(2,$_SESSION['id_usuario']),
            'totalTicketsEmAndamento' =>  $t->getQtdTickets(3,$_SESSION['id_usuario']),
            'totalTicketsaIniciar' =>  $t->getQtdTickets(4,$_SESSION['id_usuario'])
          );
         // print_r($dados);
      	}else{

          $dados = array(
            'totalTickets' =>  $t->getTotalTickets(),
            'totalTicketsFinalizados' =>  $t->getQtdTickets(1),
            'totalTicketsPendentes' =>  $t->getQtdTickets(2),
            'totalTicketsEmAndamento' =>  $t->getQtdTickets(3),
            'totalTicketsaIniciar' =>  $t->getQtdTickets(4)
          );

      	}

      	$this->loadTemplateLogado('home',$dados);

      }else{
          $this->loadTemplateLogoff('login');
      }
    }

}
