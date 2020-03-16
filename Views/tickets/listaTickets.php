
<div id="page-wrapper" >
	<div class="main-page">
				<div class="bs-example widget-shadow" data-example-id="hoverable-table" style="padding: 50px;"> 
			<h4>Lista de Tickets</h4>
				<a href='<?=BASE_URL?>Tickets/criar' class="btn btn-info btn-flat btn-pri">
					<i class="fa fa-plus" aria-hidden="true"></i> Ticket
				</a>
			
			<table class="table table-hover">
			    <thead>
			        <tr>
			            <th>ID</th>
			            <th>Titulo</th>
			            <th>Descrição</th>
			            <th>Data de Criação</th>
			            <th>Status</th>
			            <th>Ação</th>
			        </tr>
			    </thead>
			    <tbody>
			    	<?php 
			    		foreach ($DadosTicket as $ticket) {
			    	?>
			    	<tr>
			    		<th scope="row"><?=$ticket['ID_Ticket']?></th>
			    		<td><?=$ticket['Titulo']?></td>
			    		<td><?=$ticket['Descricao']?></td>
			    		<td><?= date("d/m/Y H:i", strtotime($ticket['DataCriacao'])); ?></td>
			    		<?php if($ticket['ID_Status'] == 1 ){ ?>
			    			<td style='background: #0000af; color:white'>Finalizado</td>
			    		<?php } ?>
			    		<?php if($ticket['ID_Status'] == 2 ){ ?>
			    			<td style='background: #c50303; color:white'>Pendente</td>
			    		<?php } ?>
			    		<?php if($ticket['ID_Status'] == 3 ){ ?>
			    			<td style='background: green; color:white'>Em Andamento</td>
			    		<?php } ?>
			    		<?php if($ticket['ID_Status'] == 4 ){ ?>
			    			<td style='background: gray; color:white'>A Iniciar</td>
			    		<?php } ?>
			    		<td style="padding: 3px">
			    			<div class="btn-group closed">
  								<a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-cog" aria-hidden="true"></i></a>
  								<a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#">
    								<span class="fa fa-caret-down" title="Toggle dropdown menu"></span>
  								</a>
  								<ul class="dropdown-menu">
  								<?php if($ticket['ID_Status'] == 1 ){ ?>
  									<li>
										<a href="<?=BASE_URL?>Tickets/excluir/<?=$ticket['Slug']?>">
											<i class="fa fa-trash-o fa-fw"></i> Excluir
										</a>
									</li>
  								<?php } ?>
			    				<?php if($ticket['ID_Status'] == 2 ){ ?>
			    					<li>
			    			 			<a href="<?=BASE_URL?>Tickets/finalizar/<?=$ticket['Slug']?>">
			    			 				<i class="fa fa-check-square"></i> Finalizar
			    			 			</a>
			    					</li>
			    					<li>
			    			 			<a href="<?=BASE_URL?>Tickets/editar/<?=$ticket['Slug']?>">
			    			 				<i class="fa fa-pencil fa-fw"></i> Editar
			    			 			</a>
			    					</li>	
									<li>
										<a href="<?=BASE_URL?>Tickets/excluir/<?=$ticket['Slug']?>">
											<i class="fa fa-trash-o fa-fw"></i> Excluir
										</a>
									</li>
			    				<?php } ?>
			    				<?php if($ticket['ID_Status'] == 3 ){ ?>
			    					<?php if($_SESSION['id_perfil'] == 1){ ?>
			    					<li>
			    			 			<a href="<?=BASE_URL?>Tickets/finalizar/<?=$ticket['Slug']?>">
			    			 				<i class="fa fa-check-square"></i> Finalizar
			    			 			</a>
			    					</li>
			    					<li>
			    			 			<a href="<?=BASE_URL?>Tickets/Pendente/<?=$ticket['Slug']?>">
			    			 				<i class="fa fa-exclamation-triangle"></i> Pendente
			    			 			</a>
			    					</li>
			    					<?php } ?>
			    					
			    					<li>
			    			 			<a href="<?=BASE_URL?>Tickets/editar/<?=$ticket['Slug']?>">
			    			 				<i class="fa fa-pencil fa-fw"></i> Editar
			    			 			</a>
			    					</li>
									<li>
										<a href="<?=BASE_URL?>Tickets/excluir/<?=$ticket['Slug']?>">
											<i class="fa fa-trash-o fa-fw"></i> Excluir
										</a>
									</li>
			    				<?php } ?>
			    				<?php if($ticket['ID_Status'] == 4  ){ ?>
			    					<?php if($_SESSION['id_perfil'] == 1){ ?>
			    					<li>
			    			 			<a href="<?=BASE_URL?>Tickets/Iniciar/<?=$ticket['Slug']?>">
			    			 				<i class="fa fa-folder-open"></i> Iniciar
			    			 			</a>
			    					</li>
			    					<li>
			    			 			<a href="<?=BASE_URL?>Tickets/Pendente/<?=$ticket['Slug']?>">
			    			 				<i class="fa fa-exclamation-triangle"></i> Pendente
			    			 			</a>
			    					</li>
			    					<?php } ?>
			    					<li>
			    			 			<a href="<?=BASE_URL?>Tickets/finalizar/<?=$ticket['Slug']?>">
			    			 				<i class="fa fa-check-square"></i> Finalizar
			    			 			</a>
			    					</li>
			    					<li>
			    			 			<a href="<?=BASE_URL?>Tickets/editar/<?=$ticket['Slug']?>">
			    			 				<i class="fa fa-pencil fa-fw"></i> Editar
			    			 			</a>
			    					</li>
									<li>
										<a href="<?=BASE_URL?>Tickets/excluir/<?=$ticket['Slug']?>">
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
