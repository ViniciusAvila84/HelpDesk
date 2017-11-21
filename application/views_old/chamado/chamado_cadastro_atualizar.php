<form class="form" action="<?=base_url()?>index.php/chamado/atualizar_salvar" method="post">
  <input type="hidden" id="PK_ID_CHAMADO" name="PK_ID_CHAMADO"value="<?= $chamado [0] ->PK_ID_CHAMADO?>">
	<div class="content container">

		<div class="row">
	  		<div class= "col-md-10">
	    		<h2 class= "page-header">
	    			Atualização de Chamado
	    		</h2>
			</div>
		</div>
				
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="nome">Titulo:</label>
					<input type="text" class="form-control" id="titulo" name="titulo" value="<?= $chamado [0] ->TITULO?>">
				</div>
			</div>
        </div>  
	  
	    <div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="nivel">Categoria</label>
						<select id="fk_id_assunto" class="form-control" name="fk_id_assunto" >
							<?php foreach ($assunto as $assunto){?>
							<option value="<?= $assunto->PK_ID_ASSUNTO ?>"> <?= $assunto->NOME_ASSUNTO;?> </option>
							<?php } ?>
						</select>
				</div>	
			</div>
		</div>
		
        <div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="nome">Descrição:</label>
					<!--<input type="text" class="form-control" id="descricao" name="descricao" value="<?= $chamado [0] ->DESCRICAO?>">-->
					<textarea rows="10" cols="35" maxlength="5000" type="text" class="form-control" id="descricao" name="descricao"><?= $chamado [0] ->DESCRICAO?>"</textarea>    
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
				<button type="submit" class="btn btn-success">Enviar</button>
				</div>
			</div>
		</div>
     		
	</div>
</form>


