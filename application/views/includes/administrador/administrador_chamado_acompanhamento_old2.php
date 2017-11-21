<form class="form" action="<?=base_url()?>index.php/chamado/acompanhamento_salvar" enctype="multipart/form-data" method="post">
	<input type="hidden" id="FK_ID_CHAMADO" name="FK_ID_CHAMADO"value="<?= $chamado [0] ->PK_ID_CHAMADO?>">
	<div class="content container" style="background: #ffffffff">

		<div class="row">
	  		<div class= "col-md-12" >
	    		<h2 class= "page-header text-center">
					Acompanhamento do Chamado
				</h2>	
			</div>	
		</div>		
		
		<div class="container"style="border: 1px solid #000; background: #E6E6FA">
		<div class="row" >
		
		  	<div class="col-md-12"><!--Dados Do chamado 1 -->
				
				<h5><b><?= $chamado [0] ->TITULO?></b></h5>
				
				
					<textarea class="form-control" rows="8" readonly="readonly" style="border: none; background: #E6E6FA"><?= $chamado [0] ->DESCRICAO?></textarea> 
			
				  <div class="col-md-3">
				<label>Status:</label> <span><?= $chamado [0] ->CHAMADO_STATUS?></span>
				 </div>
				 <div class="col-md-3">
		<label>Responsavel: </label> <span><?= isset($chamado[0]->RESPONSAVEL)? $chamado[0]->RESPONSAVEL : 'Sem Responsavel' ?> </span>
		 </div>
		 <div class="col-md-3">
		<label>Cadastro:</label> <span><?= $chamado [0] ->DATA_HORA_CADASTRO_CHAMADO?></span>
		 </div>
		 <div class="col-md-3">
				<label>Conclusão:</label> <span><?= $chamado [0] ->DATA_HORA_FECHAMENTO_CHAMADO?>	</span>		
			</div> <!--Fim dos Dados do Chamado 2 -->
		</div>
		</div>
		</div>
<br><br>		
		<!--Dados Do Usuario-->
		<div class="row">
		
			<div class="col-md-12" >
			<div class="alert alert-success">
				<div class="col-md-1 text-center">
					<label>Usuário:</label>
				</div>
				<div class="col-md-2">
					<label for="nome"><span class="glyphicon glyphicon glyphicon-user" aria-hidden="true"><b>-Nome:</b></span></label><?= $usuarios [0] ->NOME?>
				</div>
				<div class="col-md-3">
					<label for="nome"><span class="glyphicon glyphicon glyphicon-phone-alt" aria-hidden="true"><b>-Telefone:</b></span></label><?= $usuarios [0] ->TELEFONE_FIXO?>
				</div>
				<div class="col-md-2">
					<label for="nome"><span class="glyphicon glyphicon glyphicon-phone-alt" aria-hidden="true"><b>-Ramal:</b></span></label><?= $usuarios [0] ->RAMAL?>
				</div>
				<div class="col-md-2">
					<label for="nome"><span class="glyphicon glyphicon glyphicon-earphone" aria-hidden="true"><b>-Celular:</b></span></label><?= $usuarios [0] ->TELEFONE_CELULAR?>
				</div>
				<div class="col-md-2">
					<label for="nome"><span class="glyphicon glyphicon glyphicon-envelope" aria-hidden="true"><b>-Email:</b></span></label><?= $usuarios [0] ->EMAIL?>
				</div>
				<br>
			</div> <!--Fim dos Dados do Usuario-->
		</div>	
		</div>
		</div>
				<!--Menu de Botões-->
			<div class= "col-md-12 ">	
				
				
					<div class= "col-md-2">
					<!--Botao Pegar Chamado-->
					<a href="<?= base_url('index.php/chamado/atribuirchamado/'.$chamado [0]->PK_ID_CHAMADO) ?>" class="btn btn-primary pull-right btn-sm" style="display:block; width:150px">
						 <i class="fa fa-thumbs-up fa-3x"> </i> <label>Atribuir</label> 
					</a>
					</div>
					
					
				
				<div class= "col-md-2">	
					<!--Botao Editar-->
					<a href="<?= base_url('index.php/chamado/administrador_atualizar/'.$chamado [0]->PK_ID_CHAMADO) ?>" class="btn btn-default pull-right btn-sm" style="display:block; width:150px"> 
						<label>Editar</label>  <i class="fa fa-pencil-square-o fa-3x"></i> 
					</a>
				</div>
				
				<div class= "col-md-2">
					<!--Botao Histórico-->
					<a href="<?= base_url('index.php/chamado/historico/'.$chamado [0]->PK_ID_CHAMADO) ?>" class="btn btn-warning pull-right btn-sm" style="display:block; width:150px">
						        <i class="fa fa-history fa-3x"> </i> <label>Histórico</label> 
					</a>
				</div>
				
				<div class= "col-md-2">
					<!--Botao Anexo-->
					<?php if( $chamado[0]->ANEXO != NULL){ ?>
						<a target="direita" href="<?=base_url()?><?=$chamado[0]->ANEXO; ?>" class="btn btn-default pull-right btn-sm" style="display:block; width:150px">
						<label>Anexo</label>  <i class="fa fa-camera-retro fa-3x"></i>
						</a>
					<?php }else {?>
						<a target="direita" href="<?=base_url()?><?=$chamado[0]->ANEXO; ?>" class="btn btn-danger disabled btn-sm pull-right" style="display:block; width:150px">
						<label>Anexo</label>  <i class="fa fa-camera-retro fa-3x"></i>
						</a>
					<?php }?>
				</div>
				
			
					<!--Botao Reabrir e Fechar-->
					<?php if( $chamado[0]->CHAMADO_STATUS == 'Fechado'){ ?>
					<div class= "col-md-2">
						<a href="<?= base_url('index.php/chamado/administrador_reabrir/'.$chamado [0]->PK_ID_CHAMADO) ?>" class="btn btn-success pull-right btn-sm" style="display:block; width:150px">
							 <i class="fa fa-retweet fa-3x"></i> <label>Reabrir</label> 
						</a>
					</div><div class= "col-md-2">	
						<a href="<?= base_url('index.php/chamado/administrador_fechar/'.$chamado [0]->PK_ID_CHAMADO) ?>" class="btn btn-info disabled pull-right btn-sm" style="display:block; width:150px">
							<label>Fechar</label>  <i class="fa fa-window-close fa-3x"></i>
						</a>
					</div><?php }?>
					<?php if( $chamado[0]->CHAMADO_STATUS == 'Em_Atendimento'){ ?>
					<div class= "col-md-2">
						<a href="<?= base_url('index.php/chamado/administrador_reabrir/'.$chamado [0]->PK_ID_CHAMADO) ?>" class="btn btn-info disabled pull-right btn-sm" style="display:block; width:150px">
							 <i class="fa fa-retweet fa-3x"></i> <label>Reabrir</label> 
						</a>
						</div><div class= "col-md-2">
						<a href="<?= base_url('index.php/chamado/administrador_fechar/'.$chamado [0]->PK_ID_CHAMADO) ?>" class="btn btn-danger pull-right btn-sm" style="display:block; width:150px">
							<label>Fechar</label>  <i class="fa fa-window-close fa-3x"></i>
						</a>
					</div><?php }?>
					<?php if( $chamado[0]->CHAMADO_STATUS == 'Aberto'){ ?>
					<div class= "col-md-2">
						<a href="<?= base_url('index.php/chamado/administrador_reabrir/'.$chamado [0]->PK_ID_CHAMADO) ?>" class="btn btn-info disabled pull-right btn-sm" style="display:block; width:150px">
							 <i class="fa fa-retweet fa-3x"></i> <label>Reabrir</label> 
						</a>
						</div><div class= "col-md-2">
						<a href="<?= base_url('index.php/chamado/administrador_fechar/'.$chamado [0]->PK_ID_CHAMADO) ?>" class="btn btn-danger pull-right " style="display:block; width:150px">
							<label>Fechar</label>  <i class="fa fa-window-close fa-3x"></i>
						</a>
					</div><?php }?>
				
			
				</div>
	
			</div>
	
	<br>
		
		
	
			
		
		</div>
			
	
	
		
		
		
<br><br><div class="row">
		<!--p-3 mb-2 bg-info text-black para colocar cor na DIV CLASS-->
<br>			<div class="col-md-12 " cols=1000 rows=1 >

				<table class="table table-striped ">
				<tr>
			    <th>Acompanamento</th>
				<th>data hora</th>
				<th>Usuario</th>
				<th>anexo</th>
				</tr>
				
				<?php foreach ($historico as $cha){?>
				<tr>
				<td>
				<textarea readonly="readonly" cols=80 rows=3 style="border: none;"><?= $cha ->ACOMPANHAMENTO; ?></textarea> 
				
				</td>
				
				<td><?= $cha ->DATA_HORA_CADASTRO_ACOMPANHAMENTO; ?></td>
				<td><?= $cha ->NOME; ?></td>
				<td>
					
				<?php if( $cha ->CHAMADO_ACOMPANHAMENTO_ANEXO != NULL){ ?>
				 <a target="direita" href="<?=base_url()?><?=$cha ->CHAMADO_ACOMPANHAMENTO_ANEXO; ?> "class="btn-default" style="text-align: left" ><i class="fa fa-camera-retro fa-2x"></i></a></td>
				<?php }else {?>
					<span class="fa-stack fa-lg">
					  <i class="fa fa-camera fa-stack-1x"></i>
					  <i class="fa fa-ban fa-stack-2x text-danger"></i>
					</span>
				<?php }?>

				</tr>

				<?php }?>                
				</table>
				</div>
		
		</div>
		<div class="row">
			<div class="col-md-12 pull-right">
				<label for="nome">Inserir Acompanhamento</label>
				<textarea rows="10" cols="35" maxlength="5000" type="text" class="form-control" id="acompanhamento" name="acompanhamento" placeholder=" Insira um Andamento para seu chamado"></textarea>
				<input type="file"  name="arquivo" />
				<hr>				
				<!--Botao Enviar-->
				<button type="submit" class="btn btn-success pull-right">Salvar <span class="glyphicon glyphicon-floppy-disk"></button>
			</div>
			
		</div>
	
	</div>
</form>

