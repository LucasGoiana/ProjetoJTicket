
<div id="page-wrapper" >
	<div class="main-page">
		<form method='post' action="<?=BASE_URL?>Tickets/editar/<?=$Slug?>">

			<div class="form-group">
				<label for='titulo'>Titulo</label>
				<input type="text" name='titulo' value='<?=$Titulo?>' id='titulo' class="form-control" placeholder="Digite o Titulo do Ticket" required="">
			</div>
			
			<div class="form-group">
				<label for='descricao'>Descrição</label>
				<textarea class="form-control"  name='descricao' id='descricao' placeholder="Digite a Descrição do Ticket" required=""><?=$Descricao?></textarea>
			</div>
			<div class="form-group">
				<input type="submit" value='Editar' class='btn btn-primary'>
			</div>
		</form>
	</div>
</div>
