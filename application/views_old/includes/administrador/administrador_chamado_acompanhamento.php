<form class="form" action="<?=base_url()?>index.php/chamado/acompanhamento_salvar" enctype="multipart/form-data" method="post">
	<input type="hidden" id="FK_ID_CHAMADO" name="FK_ID_CHAMADO"value="<?= $chamado [0] ->PK_ID_CHAMADO?>">
	<div class="content container">

		<div class="row">
	  		<div class= "col-md-12">
	    		<h2 class= "page-header">
	    			Acompanhamento do Chamado 
	    			<a href="<?= base_url('index.php/chamado/administrador_atualizar/'.$chamado [0]->PK_ID_CHAMADO) ?>" class="btn btn-primary pull-right">Atualizar</a>
					<a href="<?= base_url('index.php/chamado/atribuirchamado/'.$chamado [0]->PK_ID_CHAMADO) ?>" class="btn btn-primary pull-right">Atribuir Chamado</a>
	    			<?php if( $chamado[0]->ANEXO != NULL){ ?>
						<a target="direita" href="<?=base_url()?><?=$chamado[0]->ANEXO; ?> "class="btn btn-warning pull-right">Imagem</a>
					<?php } ?>
	    		</h1>
			</div>
		</div>


		<div class="row">
		  	<div class="col-md-8"">
				<h3>Titulo: <?= $chamado [0] ->TITULO?></h3>
<br>			<label>Descrição:</label><span> <?= $chamado [0] ->DESCRICAO?></span>
<br><br>		<label>Status:</label> <?= $chamado [0] ->CHAMADO_STATUS?>
<br><br>		<label>Responsavel: </label> <?= $chamado [0] ->RESPONSAVEL?>
<br><br>		<label>Cadastro:</label> <?= $chamado [0] ->DATA_HORA_CADASTRO_CHAMADO?>
				<label>Conclusão:</label> <?= $chamado [0] ->DATA_HORA_FECHAMENTO_CHAMADO?>			
			<hr/>
				<div style="text-align: left">
				
				
				</div>
			</div>
			<div class="col-md-4">
				<div class="col-md-6">
<br>			<label for="nome">Nome: </label><?= $usuarios [0] ->NOME?>
				</div><div class="col-md-6">
<br>			<label for="nome">Ramal: </label><?= $usuarios [0] ->RAMAL?>
				</div><div class="col-md-6">
<br>			<label for="nome">Telefone: </label><?= $usuarios [0] ->TELEFONE_FIXO?>
				</div><div class="col-md-6">
<br>			<label for="nome">Celular: </label><?= $usuarios [0] ->TELEFONE_CELULAR?>
				</div><div class="col-md-10">
<br>			<label for="nome">Email: </label><?= $usuarios [0] ->EMAIL?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<table class="table table-striped ">
				<tr>
			    <th>Historico</th>
				<th>data hora</th>
				<th>Usuario</th>
				<th>anexo</th>
				</tr>
				<?php foreach ($historico as $cha){?>
				<tr>
				<td><?= $cha ->ACOMPANHAMENTO; ?></td>
				<td><?= $cha ->DATA_HORA_CADASTRO_ACOMPANHAMENTO; ?></td>
				<td><?= $cha ->NOME; ?></td>
				<td>
					
				<?php if( $cha ->CHAMADO_ACOMPANHAMENTO_ANEXO != NULL){ ?>
				 <a target="direita" href="<?=base_url()?><?=$cha ->CHAMADO_ACOMPANHAMENTO_ANEXO; ?> "class="btn btn-warning" style="text-align: left">Imagem</a></td>
				<?php }?>

				</tr>

				<?php }?>                
				</table>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 pull-right">
				<label for="nome">Inserir Historico:</label>
				<textarea rows="10" cols="35" maxlength="5000" type="text" class="form-control" id="acompanhamento" name="acompanhamento" placeholder=" Insira um Andamento para seu chamado"></textarea>
				<input type="file"  name="arquivo" />
				<hr>				
				<button type="submit" class="btn btn-success pull-right">Enviar</button>
			</div>
			
		</div>
	</div>
</form>