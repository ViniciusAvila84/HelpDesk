<div class="content container">

		<div class="row">
	  		<div class= "col-md-12">
	    		<h2 class= "page-header">
	    			Lista de Chamados
	    		</h2>
			</div>
		</div>

				        <?php 
						$aberto=0;
						$ematendimento=0;
						$fechado=0;
						foreach ($chamado as $cha){
							if ($cha->CHAMADO_STATUS == 'Aberto'){
								$aberto++;							
								}
							if ($cha->CHAMADO_STATUS == 'Em_Atendimento'){
								$ematendimento++;							
								}
							if ($cha->CHAMADO_STATUS == 'Fechado'){
								$fechado++;							
								}			
						}?>

		<div class="row">
	  		<div class= "col-md-12">
				<p>
					<a class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample1" aria-expanded="false" aria-controls="multiCollapseExample1">Chamados Abertos <?php echo $aberto ?></a>
					<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample1">Chamados em Andamento <?php echo $ematendimento ?></button>
					<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#multiCollapseExample3" aria-expanded="false" aria-controls="multiCollapseExample2">Chamados Fechados <?php echo $fechado ?></button>
					<button class="btn btn-primary" type="button" data-toggle="collapse" data-target=".multi-collapse" aria-expanded="false" aria-controls="multiCollapseExample1 multiCollapseExample2 multiCollapseExample3">Todos</button>	
				</p>
				
					<div class="row">
						<div class= "col-md-10">
							<div class="collapse multi-collapse" id="multiCollapseExample1">
								<div class="card card-body">
									<?php if ($aberto != 'null'){ ?>
										<table class="table table-striped "> 
											<tr>
												<th>Numero</th>
												<th>Status</th>
												<th>Titulo</th>
											</tr>
									<?php foreach ($chamado as $cha){
										if( $cha->CHAMADO_STATUS == 'Aberto'){?>
											<tr>
												<td><?= $cha ->PK_ID_CHAMADO; ?></td>
												<td><?= $cha ->CHAMADO_STATUS; ?></td>
												<td><a href="<?= base_url('index.php/chamado/acompanhamento/'.$cha->PK_ID_CHAMADO) ?>" style="text-align: left"><?= $cha ->TITULO; ?></a></td>
											</tr>
									<?php }}?>                
										</table>
									<?php }?>  
								</div>
							</div>
						</div>							
					</div>	
						
					<div class="row">
						<div class= "col-md-6">
							<div class="collapse multi-collapse" id="multiCollapseExample2">
								<div class="card card-body">
									<?php if ($ematendimento != 'null'){ ?>
										<table class="table table-striped "> 
											<tr>
												<th>Numero</th>
												<th>Status</th>
												<th>Responsavel</th>
												<th>Titulo</th>
											</tr>
									<?php foreach ($chamado as $cha){
										if( $cha->CHAMADO_STATUS == 'Em_Atendimento'){?>
											<tr>
												<td><?= $cha ->PK_ID_CHAMADO; ?></td>
												<td><?= $cha ->CHAMADO_STATUS; ?></td>
												<td><?= $cha ->RESPONSAVEL; ?></td>
												<td><a href="<?= base_url('index.php/chamado/acompanhamento/'.$cha->PK_ID_CHAMADO) ?>" style="text-align: left"><?= $cha ->TITULO; ?></a></td>
											</tr>
									<?php }}?>                
										</table>
									<?php }?>
								</div>
							</div>
						</div>
					</div>	
					
					<div class="row">
						<div class= "col-md-10">
							<div class="collapse multi-collapse" id="multiCollapseExample3">
								<div class="card card-body">
									<?php if ($fechado != 'null'){ ?>
										<table class="table table-striped "> 
											 <tr>
												<th>Numero</th>
												<th>Status</th>
												<th>Responsavel</th>
												<th>Titulo</th>
												<th>Data Cadastro</th>
												<th>Data Fechamento</th>
											 </tr>
									<?php foreach ($chamado as $cha){
										if( $cha->CHAMADO_STATUS == 'Fechado'){?>
											<tr>
												<td><?= $cha ->PK_ID_CHAMADO; ?></td>
												<td><?= $cha ->CHAMADO_STATUS; ?></td>
												<td><?= $cha ->RESPONSAVEL; ?></td>
												<td><a href="<?= base_url('index.php/chamado/acompanhamento/'.$cha->PK_ID_CHAMADO) ?>" style="text-align: left"><?= $cha ->TITULO; ?></a></td>
												<td><?= $cha ->DATA_HORA_CADASTRO_CHAMADO; ?></td>
												<td><?= $cha ->DATA_HORA_FECHAMENTO_CHAMADO; ?></td>
											 </tr>
									<?php }}?>                
										</table>
									<?php }?>

								</div>
							</div>
						</div>
					</div>	
			</div>
		</div>
</div> 
