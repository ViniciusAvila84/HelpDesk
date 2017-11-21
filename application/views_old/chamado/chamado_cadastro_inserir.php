<form name="form1" class="form" action="<?=base_url()?>index.php/chamado/insert" enctype="multipart/form-data" method="post">
	<div class="content container">

		<div class="row">
	  		<div class= "col-md-12">
	    		<h2 class= "page-header">
	    			Cadastro de Chamado
	    		</h2>
			</div>
		</div>

		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="nome">Titulo:</label>
					<input type="text" class="form-control" id="titulo" name="titulo" placeholder="Titulo do chamado" required>
			    </div>
			</div>
        </div>  
		
		<div class="row">
			<div class="col-md-6">
				<label for="nivel">Categoria</label>
					<select id="empresa" class="form-control" name="fk_id_assunto" required>
						<?php foreach ($assunto as $assunto){?>
							<option value="<?= $assunto->PK_ID_ASSUNTO ?>"> <?= $assunto->NOME_ASSUNTO;?> </option>
						<?php } ?>
					</select>
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="nome">Descrição:</label>
					<!--<input type="text" class="form-control" id="descricao" name="descricao" placeholder=" Descrição do Chamado">-->
					<textarea rows="10" cols="35" maxlength="5000" type="text" class="form-control" id="descricao" name="descricao" placeholder=" Descrição do Chamado" required></textarea>
				</div>
			</div>
        </div>
		
		<div class="col-md-6">
			<div style="text-align: left">
				<input type="file" name="arquivo" />
			 </div>	
        </div>

<br><br><div class="col-md-6">
			<div style="text-align: left">
				<button type="submit" class="btn btn-success">Enviar</button>
            </div>
      </div>
	</div>  
</form>





