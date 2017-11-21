<form class="form" action="<?=base_url()?>index.php/chamado/administrador_atualizar_salvar" method="post">
	 <input type="hidden" id="PK_ID_CHAMADO" name="PK_ID_CHAMADO"value="<?= $chamado [0] ->PK_ID_CHAMADO?>">
		<div class="content container">

		<div class="row">
	  		<div class= "col-md-12">
	    		<h2 class= "page-header">
	    			Atualização de Chamado
	    		</h2>
			</div>
		</div>
				
		<div class="row">
			<div class="col-md-5">
				<div class="form-group">
					<label for="nome">Titulo:</label>
					<input type="text" class="form-control" id="titulo" name="titulo" value="<?= $chamado [0] ->TITULO?>">
				</div>
			</div>
        </div>  
					
		<div class="row">
			<div class="col-md-5">
				<div class="form-group">
					<label for="nome">Chamado Status: </label>
						<select class="form-control" id="habilidades" name="status"  value="<?= $chamado [0] ->CHAMADO_STATUS?>">
							<?php if ($chamado [0] ->CHAMADO_STATUS != 'Aberto'){ ?>
							<option value="Fechado"<?= $chamado [0] ->CHAMADO_STATUS='Fechado'?'selected':'';?>>Fechado</option>
							<option value="Em_Atendimento"<?= $chamado [0] ->CHAMADO_STATUS='Em_Atendimento'?'selected':'';?>>Em Atendimento</option>
							<?php } else { ?>
							<option value="Em_Atendimento"<?= $chamado [0] ->CHAMADO_STATUS='Em_Atendimento'?'selected':'';?>>Em Atendimento</option>
							<?php } ?>	
			
            			</select>
				</div>
			</div>
		</div>  
				
		<div class="row">
			<div class="col-md-5">
				<div class="form-group">
					<label for="nome">Descrição:</label>
					<textarea rows="10" cols="35" maxlength="5000" type="text" class="form-control" id="acompanhamento" name="descricao" value="<?= $chamado [0] ->DESCRICAO?>"><?= $chamado [0] ->DESCRICAO?></textarea>
					<!--<input rows="10" cols="35" maxlength="5000" type="text" class="form-control" id="descricao" name="descricao" value="<?= $chamado [0] ->DESCRICAO?>">
					<input type="text" class="form-control" id="descricao" name="descricao" value="<?= $chamado [0] ->DESCRICAO?>">-->
				</div>
			</div>
        </div>
				
		<div class="col-md-10">
			<div style="text-align: rigth">
				<button type="submit" class="btn btn-success pull-left">Enviar</button>
			</div>
      </div>
	</div>
</form>   
       

     






