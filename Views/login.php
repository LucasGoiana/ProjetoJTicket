<div id="page-wrapper" style="margin: 0;">
	<div class="main-page login-page ">
		<?php
			if(isset($error) && !empty($error)){
				if($error == 'sucess'){
		?>
			<div class='alert alert-success'>
        		<p>Usuário Cadastrado com Sucesso!</p>
    		</div>
		<?php 
				}else{
		?>
			<div class='alert alert-danger'>
        		<p>Dados de Usuário Inválidos!</p>
    		</div>
		<?php
				}
			}
		?>
				<h2 class="title1">Login</h2>
				<div class="widget-shadow">
					<div class="login-body">
						<form action="<?=BASE_URL?>Usuarios/fazerLogin" method="post">
							<input type="email" class="user" name="email" placeholder="Digite seu Email" required="">
							<input type="password" name="senha" class="lock" placeholder="Digite sua Senha" required="">
							<div class="forgot-grid">
								<div class="forgot">
									<a href="#">Esqueceu sua senha</a>
								</div>
								<div class="clearfix"> </div>
							</div>
							<input type="submit" name="Logar" value="Logar">
							<div class="registration">
								Não tem um Cadastro?
								<a class="" href="<?=BASE_URL?>usuarios/criar">
									Cadastre-se
								</a>
							</div>
						</form>
					</div>
				</div>
				
			</div>
		</div>