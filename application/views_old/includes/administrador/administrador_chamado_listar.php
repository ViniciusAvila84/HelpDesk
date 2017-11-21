<div class="content container">

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
}
?>
						
		<div class="row">
	  		<div class= "col-md-12">
	    		<h2 class= "page-header">
	    			Administrador Lista de Chamadossss
	    		</h2>
			</div>
		</div>
		
		<script>
		$(document).ready(function() {
			$('#chamados').DataTable();
		} );
		</script>
		
		<div class="row">
		<div class= "col-md-4 border border-primary">
		<h4>Em andamento <span class="badge badge-secondary"><?php echo $ematendimento; ?></span></h4>
		</div>
		<div class= "col-md-4 border border-primary">
		<h4>Abertos <span class="badge badge-secondary"><?php echo $aberto; ?></span></h4>
		</div>
		<div class= "col-md-4 border border-primary">
		<h4>Fechados <span class="badge badge-secondary"><?php echo $fechado; ?></span></h4>
		</div>
		</div>
		<hr>
	<div class="row">
		<div class= "col-md-12">
			<table id="chamados" class="display" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Id</th>
						<th>Titulo</th>
						<th>Status</th>
						<th>Usuario</th>
						<th>Ramal</th>
						<th>Cadastro</th>
					</tr>
				</thead>
				<tfoot>
					<th>Id</th>
					<th>Titulo</th>
					<th>Status</th>
					<th>Usuario</th>
					<th>Ramal</th>
					<th>Cadastro</th>
				</tfoot>
				<tbody>
				<?php foreach ($chamado as $cha){ ?>
					<tr>
						<td><?= $cha ->PK_ID_CHAMADO; ?></td>
						<td><a href="<?= base_url('index.php/chamado/administrador_acompanhamento/'.$cha->PK_ID_CHAMADO) ?>" style="text-align: left"><?= $cha ->TITULO; ?></a></td>
						<td><?= $cha ->CHAMADO_STATUS; ?></td>
						<td><?= $cha ->NOME; ?></td>
						<td><?= $cha ->RAMAL; ?></td>
						<td><?= $cha ->DATA_HORA_CADASTRO_CHAMADO; ?></td>
					</tr>
				<?php }?> 
				</tbody>
			</table>			
		</div>
	</div>
		

		
		
		
		
		


	<!--	<div class="row">
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
												<th>Id</th>
												<th>Titulo</th>
												<th>Status</th>
												<th>Usuario</th>
												<th>Ramal</th>
												<th>Cadastro</th>
											</tr>
                                    <?php foreach ($chamado as $cha){
										if( $cha->CHAMADO_STATUS == 'Aberto'){?>
											<tr>
												<td><?= $cha ->PK_ID_CHAMADO; ?></td>
												<td><a href="<?= base_url('index.php/chamado/administrador_acompanhamento/'.$cha->PK_ID_CHAMADO) ?>" style="text-align: left"><?= $cha ->TITULO; ?></a></td>
												<td><?= $cha ->CHAMADO_STATUS; ?></td>
												<td><?= $cha ->NOME; ?></td>
												<td><?= $cha ->RAMAL; ?></td>
												<td><?= $cha ->DATA_HORA_CADASTRO_CHAMADO; ?></td>
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
							<div class="collapse multi-collapse" id="multiCollapseExample2">
								<div class="card card-body">
									<?php if ($ematendimento != 'null'){ ?>
					   				    <table class="table table-striped ">
											<tr>
												<th>Id</th>
												<th>Titulo</th>
												<th>Status</th>
												<th>Usuario</th>
												<th>Responsavel</th>
												<th>Cadastro</th>
											</tr>
                                    <?php foreach ($chamado as $cha){
										if( $cha->CHAMADO_STATUS == 'Em_Atendimento'){?>
											<tr>
												<td><?= $cha ->PK_ID_CHAMADO; ?></td>
												<td><a href="<?= base_url('index.php/chamado/administrador_acompanhamento/'.$cha->PK_ID_CHAMADO) ?>" style="text-align: left"><?= $cha ->TITULO; ?></a></td>
												<td><?= $cha ->CHAMADO_STATUS; ?></td>
												<td><?= $cha ->NOME; ?></td>
												<td><?= $cha ->RESPONSAVEL; ?></td>
												<td><?= $cha ->DATA_HORA_CADASTRO_CHAMADO; ?></td>
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
												<th>Id</th>
												<th>Titulo</th>
												<th>Status</th>
												<th>Usuario</th>
												<th>Ramal</th>
												<th>Responsavel</th>
												<th>Cadastro</th>
												<th>Fechamento</th>
											</tr>
									<?php foreach ($chamado as $cha){
										if( $cha->CHAMADO_STATUS == 'Fechado'){?>
											<tr>
												<td><?= $cha ->PK_ID_CHAMADO; ?></td>
												<td><a href="<?= base_url('index.php/chamado/administrador_acompanhamento/'.$cha->PK_ID_CHAMADO) ?>" style="text-align: left"><?= $cha ->TITULO; ?></a></td>
												<td><?= $cha ->CHAMADO_STATUS; ?></td>
												<td><?= $cha ->NOME; ?></td>
												<td><?= $cha ->RAMAL; ?></td>
												<td><?= $cha ->RESPONSAVEL; ?></td>
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


	-->
	