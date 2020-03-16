<div id="page-wrapper" >
	<div class="main-page">
		<form method='post' action="<?=BASE_URL?>Tickets/criar">
			<div class="form-group">
				<label for='titulo'>Titulo</label>
				<input type="text" name='titulo' id='titulo' class="form-control" placeholder="Digite o Titulo do Ticket" required="">
			</div>
			<?php if($_SESSION['id_perfil'] == 1){ ?>
			<div class="form-group">
				<label for='id'>Usúarios</label>
				<select name='id' id='id' class='form-control' required="">
					<option value=''>Selecione</option>
					<?php foreach($clientes as $cliente){ ?>
					<option value="<?=$cliente['ID_Usuario']?>"><?=$cliente['Nome']?></option>
					<?php } ?>
				</select>
			</div>
			<?php } ?>
			<div class="form-group">
				<label for='descricao'>Descrição</label>
				<textarea class="form-control" name='descricao' id='descricao' placeholder="Digite a Descrição do Ticket" required=""></textarea>
			</div>
			<div class="form-group">
				<input type="submit" value='Cadastrar' class='btn btn-primary'>
			</div>
		</form>
	</div>
</div>
