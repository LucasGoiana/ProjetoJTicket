
<div id="page-wrapper" >
	<div class="main-page">
		<h1>Edição de Usuário</h1>
		<?php
		if($_SESSION['id_perfil'] == 1){
			$slug = explode('/',$_GET['url']);
			$slug = end($slug);
		//	print_r($slug);
		
		}else{
			$slug = $_SESSION['slug'];
		}
			if(isset($error) && !empty($error)){
				if($error == 'duplicado'){
		
		?>
			<div class='alert alert-danger'>
        		<p>Email Informado já existe em nossa base de dados, por favor Informe outro.</p>
    		</div>
		<?php 
				}else{
		?>		
		<div class='alert alert-success'>
        		<p>Usuário Editado com Sucesso!</p>
    		</div>	
		<?php
				}
			}
		?>
		
		<form method='post' action="<?=BASE_URL?>Usuarios/editar/<?=$slug?>">
			<div class="form-group">
				<label for='nome'>Nome</label>
				<input type="text" name='nome' id='nome' class="form-control" placeholder="Digite o seu Nome" value='<?=$Nome?>' required="">
			</div>
			<div class="form-group">
				<label for='email'>Email</label>
				<input type="email" name='email' id='email' class="form-control" placeholder="Digite o seu Email" value='<?=$Email?>' required="">
			</div>
			<div class="form-group">
				<label for='nome'>Senha</label>
				<input type="password" name='senha' id='nome' class="form-control" placeholder="Digite a sua Senha" >
			</div>
			<div class="form-group">
				<input type="submit" value='Editar' class='btn btn-primary'>
			</div>
		</form>
	</div>
</div>