
<div id="page-wrapper" >
	<div class="main-page">
				<div class="bs-example widget-shadow" data-example-id="hoverable-table" style="padding: 50px;"> 
			<h4>Lista de Usuarios</h4>
				<a href='<?=BASE_URL?>Usuarios/criar' class="btn btn-info btn-flat btn-pri">
					<i class="fa fa-plus" aria-hidden="true"></i> Usuario
				</a>
			
			<table class="table table-hover">
			    <thead>
			        <tr>
			            <th>ID</th>
			            <th>Perfil</th>
			            <th>Nome</th>
			            <th>Email</th>
			        </tr>
			    </thead>
			    <tbody>
			    	<?php 
			    		foreach ($DadosUsuarios as $usuario) {
			    	?>
			    	<tr>
			    		<th scope="row"><?=$usuario['ID_Usuario']?></th>
			    		<td><?=$usuario['NomePerfil']?></td>
			    		<td><?=$usuario['NomeUsuario']?></td>
			    		<td><?=$usuario['Email']?></td>
			    		<td style="padding: 3px">
			    			<div class="btn-group closed">
  								<a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-cog" aria-hidden="true"></i></a>
  								<a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#">
    								<span class="fa fa-caret-down" title="Toggle dropdown menu"></span>
  								</a>
  								<ul class="dropdown-menu">
  									<li>
										<a href="<?=BASE_URL?>Usuarios/editar/<?=$usuario['slug']?>">
											<i class="fa fa-pencil fa-fw"></i> Editar
										</a>
									</li>
									<?php if($_SESSION['id_usuario'] != $usuario['ID_Usuario']){ ?>
										<li>
										<a href="<?=BASE_URL?>Usuarios/excluir/<?=$usuario['slug']?>">
											<i class="fa fa-trash-o fa-fw"></i> Excluir
										</a>
									</li>
									<?php } ?>
  									
								</ul>
							</div>
			    		</td>
			    	</tr>
			    	<?php
			    		}
			    	?> 
			    </tbody>
			</table>
		</div>
	</div>
</div>
