<?php 
if(isset($_SESSION['id_usuario'])){
?>
	<div id="page-wrapper">
<?php 
}else{
?>	
<div id="page-wrapper" style="margin: 0">
<?php 
}
?>

	<div class="main-page">
		<h1>Cadastro de Usuário</h1>
		<?php
			if(isset($error) && !empty($error)){
				if($error == 'duplicado'){
		?>
			<div class='alert alert-danger'>
        		<p>Email Informado já foi cadastrado anteriormente, <a href='<?=BASE_URL?>home'>Clique aqui para Fazer Login</a></p>
    		</div>
		<?php 
				}
			}
		?>
		<form method='post' action="<?=BASE_URL?>Usuarios/criar">
			<div class="form-group">
				<label for='nome'>Nome</label>
				<input type="text" name='nome' id='nome' class="form-control" placeholder="Digite o seu Nome" required="">
			</div>
			<?php if(isset($_SESSION['id_perfil']) == 1){ ?>
				<div class="form-group">
				<label for='nome'>Perfil</label>
				<select name='perfil' class="form-control" required="">
					<option value="">Selecione</option>
					<option value ='1'>Administrador</option>
					<option value ='2'>Cliente</option>
				</select>
			</div>
			<?php } ?>
			<div class="form-group">
				<label for='email'>Email</label>
				<input type="email" name='email' id='email' class="form-control" placeholder="Digite o seu Email" required="">
			</div>
			<div class="form-group">
				<label for='nome'>Senha</label>
				<input type="password" name='senha' id='nome' class="form-control" placeholder="Digite a sua Senha" required="">
			</div>
			<div class="form-group">
				<input type="submit" value='Cadastrar' class='btn btn-primary'>
			</div>
		</form>
	</div>
</div>