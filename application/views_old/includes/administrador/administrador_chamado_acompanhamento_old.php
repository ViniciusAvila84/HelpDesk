<div class="content">

<div class= "col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <div class= "col-md-10">
    <h1 class= "page-header">Painel Administrador</h1>
  </div>
 
 
		 
	<div class= "col-md-10">
	  <h2 class= "page-header">Acompanhamento do Chamado</h2>
	</div>

	<div class="col-md-12">
		<form class="form" action="<?=base_url()?>index.php/chamado/acompanhamento_salvar" enctype="multipart/form-data" method="post">
			<input type="hidden" id="FK_ID_CHAMADO" name="FK_ID_CHAMADO"value="<?= $chamado [0] ->PK_ID_CHAMADO?>">
				<p>
				<div class="col-md-6">
				  <a class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample1" aria-expanded="false" aria-controls="multiCollapseExample1">Descrição do Chamado</a>
				</div>
				  <div class="col-md-6">				 
				 <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample1">Dados do Usuario</button>
				 <!-- <button class="btn btn-primary" type="button" data-toggle="collapse" data-target=".multi-collapse" aria-expanded="false" aria-controls="multiCollapseExample1 multiCollapseExample2">Toggle both elements</button> -->
				</div>
				</p>
				<div class="row">
				  <div class="col-md-6"">
					<div class="collapse multi-collapse in" id="multiCollapseExample1">
					  <div class="row">
							<div class="col-md-5">
							  <div class="form-group">
								<label for="nome">Titulo: <?= $chamado [0] ->TITULO?></label>
								<!--<input type="text" class="form-control" id="titulo" name="titulo" value="<?= $chamado [0] ->TITULO?>" readonly> -->
							  </div>
							</div>
						</div>
						  <div class="row">
							<div class="col-md-5">
							  <div class="form-group">
								<label for="nome">Descrição: <?= $chamado [0] ->DESCRICAO?></label>
								<!--<textarea rows="10" cols="35" maxlength="5000" type="text" class="form-control" id="descricao" name="descricao" readonly><?= $chamado [0] ->DESCRICAO?>"</textarea>  -->  
							   </div>
							</div>
						  </div>
						<div class="col-md-10">
						  <div style="text-align: left">
							<a href="<?= base_url('index.php/chamado/administrador_atualizar/'.$chamado [0]->PK_ID_CHAMADO) ?>" class="btn btn-primary" style="text-align: left">Atualizar</a>
							<?php if( $chamado[0]->ANEXO != NULL){ ?>
							<a target="direita" href="<?=base_url()?><?=$chamado[0]->ANEXO; ?> "class="btn btn-warning" style="text-align: left">Imagem</a>
							<?php } ?>
						  </div>
					    </div>
					</div>
				  </div>
				  <div class="col-md-6">
					<div class="collapse multi-collapse in" id="multiCollapseExample2">
							<div class="row">
							 <div class="col-md-5">
							  <div class="form-group">
								<label for="nome">Nome:</label>
								<label for="nome"><?= $usuarios [0] ->NOME?></label>
							 </div>
							 </div>
						    </div>  
						    <div class="row">
							 <div class="col-md-5">
							  <div class="form-group">
								<label for="nome">Email:<?= $usuarios [0] ->EMAIL?></label>
							 </div>
							 </div>
						    </div>  
							<div class="row">
								<div class="col-md-5">
								  <div class="form-group">
									<label for="nome">Ramal:<?= $usuarios [0] ->RAMAL?></label>
								</div>
								</div>
							  </div>  
							<div class="row">
								<div class="col-md-5">
								  <div class="form-group">
									<label for="nome">Telefone:<?= $usuarios [0] ->TELEFONE_FIXO?></label>
								 </div>
								</div>
							  </div>  
							<div class="row">
								<div class="col-md-5">
								  <div class="form-group">
									<label for="nome">Celular:<?= $usuarios [0] ->TELEFONE_CELULAR?></label>
								</div>
								</div>
							</div>  
					</div>
				  </div>
				</div> 
								
				<div class="col-md-12">
					<p>
						<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
							Historico
						</button>
					</p>
					<div class="collapse in" id="collapseExample">
						<table class="table table-striped ">
							<tr>
								<th>Acompanhamento</th>
								<th>data hora</th>
								<th>Usuario</th>
								<th>anexo</th>
							</tr>
							<?php foreach ($historico as $cha){?>
								<tr>
									<td><?= $cha ->ACOMPANHAMENTO; ?></td>
									<td><?= $cha ->DATA_HORA_CADASTRO_ACOMPANHAMENTO; ?></td>
									<td><?= $cha ->NOME; ?></td>
									<?php if( $cha ->CHAMADO_ACOMPANHAMENTO_ANEXO != NULL){ ?>
									<td> <a target="direita" href="<?=base_url()?><?=$cha ->CHAMADO_ACOMPANHAMENTO_ANEXO; ?> "class="btn btn-warning" style="text-align: left">Imagem</a></td>
									<?php }?>
								
								 </tr>
							
							<?php }?>                
						</table>
						
						 <div class="row">
							<div class="col-md-5">
							  <div class="form-group">
								<label for="nome">Inserir Historico:</label>
								<textarea rows="10" cols="35" maxlength="5000" type="text" class="form-control" id="acompanhamento" name="acompanhamento" placeholder=" Insira um Andamento para seu chamado"></textarea>
							  </div>
							</div>
						  </div>
						
						<div class="col-md-12">
 							<input type="file" name="arquivo" />
            			</div>
						
						  <div style="text-align: left">
							<button type="submit" class="btn btn-success">Enviar</button>
						  </div>
						  
					</div>
				</div>
  		   </form>
	 </div>
   </div>
</div>
      
       

     






