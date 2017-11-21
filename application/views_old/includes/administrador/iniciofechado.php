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
	    			Painel Administrador Lista de Chamadossss
					<a href="<?= base_url()?>index.php/chamado/administrador_criar_chamado" class="btn btn-primary pull-right">Criar Chamado</a>
	    			
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
			<h4>Abertos <span class="badge badge-secondary"><?php echo $aberto; ?></span></h4>
			</div>		
			<div class= "col-md-4 border border-primary">
			<h4>Em andamento <span class="badge badge-secondary"><?php echo $ematendimento; ?></span></h4>
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
						<th>Responsavel</th>
						<th>Cadastro</th>
						<th>Fechamento</th>
					</tr>
				</thead>
				<tfoot>
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
				</tfoot>
				<tbody>
				<?php foreach ($chamado as $cha){ ?>
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
				<?php }?> 
				</tbody>
			</table>	

			
		</div>
	</div>
		
</div>
