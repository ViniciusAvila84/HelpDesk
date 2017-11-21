<div class="content container">

		<div class="row">
	  		<div class= "col-md-12">
	    		<h2 class= "page-header">
	    			Histoico do Chamado 
	    		</h2>
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-12">
				<table class="table table-striped ">
				<tr>
			    <th>ID</th>
				<th>Descrição</th>
				<th>Usuario</th>
				<th>Data/Hora</th>
				</tr>
				<?php foreach ($chamado as $cha){?>
				<tr>
				<td><?= $cha ->PK_ID_HISTORICO; ?></td>
				<td><?= $cha ->DESCRICAO_HISTORICO; ?></td>
				<td><?= $cha ->NOME; ?></td>
				<td><?= $cha ->DATA_HORA_CADASTRO_HISTORICO; ?></td>
				
				</tr>

				<?php }?>                
				</table>
			</div>
		</div>
		
		
		
</div>
