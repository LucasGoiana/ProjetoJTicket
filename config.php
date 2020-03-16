<?php
require 'enviroment.php';

$dados = array();
if (ENVIROMENT == 'development') {
    define('BASE_URL','/ProjetoJestor/');

    $dados['host'] = 'localhost';
    $dados['user'] = 'root';
    $dados['dbName'] = 'projetojestor';
    $dados['password'] = '';

    
} else {
     define('BASE_URL','http://meusite.com.br/');

    $dados['host'] = 'meusite.com.br';
    $dados['user'] = 'meuUser';
    $dados['dbName'] = 'meuBD';
    $dados['password'] = 'minhaSenha';

}

global $db;

try{
    $db = new PDO("mysql:dbname=".$dados['dbName'].";host=".$dados['host']."",$dados['user'],$dados['password']);

}catch(PDOException $e){
    echo "ERROR: ". $e->getMessage();
}