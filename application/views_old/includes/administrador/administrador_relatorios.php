<div class="content">

<div class= "col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <div class= "col-md-10">
    <h1 class= "page-header">Relatorios</h1>
  </div>
 
		
						$cont_Aberto=0;
						$cont_Em_Atendimento=0;
                        $cont_Fechado=0;
						$cont_Telefonia=0;
						$cont_computador=0;
						$cont_impressora=0;
						
						foreach ($chamado as $chaa){
							if( $chaa->CHAMADO_STATUS == 'Aberto'){ 
							$cont_Aberto ++;
							}
							if( $chaa->CHAMADO_STATUS == 'Em_Atendimento'){ 
							$cont_Em_Atendimento ++;
							}
							if( $chaa->CHAMADO_STATUS == 'Fechado'){ 
							$cont_Fechado ++;
							}		
							if( $chaa->NOME_ASSUNTO == 'Telefonia'){ 
							$cont_Telefonia ++;
							}
							if( $chaa->NOME_ASSUNTO == 'computador'){ 
							$cont_computador ++;
							}	
							if( $chaa->NOME_ASSUNTO == 'impressora'){ 
							$cont_impressora ++;
							}		
							
						}?>  

 
 
 	 <div class="row">
		 
		<div class="col-md-6">
			 <div id="piechart" style="width: 400px; height: 500px;"></div>
		 
			<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
			<script type="text/javascript">
					google.charts.load('current', {'packages':['corechart']});
					google.charts.setOnLoadCallback(drawChart);

					function drawChart() {

					var data = google.visualization.arrayToDataTable([
					  ['Classificação De chamados', 'Aberto - Em_Atendimento - Fechado'],
					  ['Aberto',     <?php echo $cont_Aberto; ?>],
					  ['Em_Atendimento',      <?php echo $cont_Em_Atendimento; ?>],
					  ['Fechado',  <?php echo $cont_Fechado; ?>],
					 
					]);

					var options = {
					  title: 'My Daily Activities'
					};

					var chart = new google.visualization.PieChart(document.getElementById('piechart'));

					chart.draw(data, options);
					}
			</script>
		 
			</div>
		 
		 
		 
		 	<div class="col-md-6">
		<div id="piechart_3d" style="width: 400px; height: 500px;"></div>
		   <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
			<script type="text/javascript">
					  google.charts.load("current", {packages:["corechart"]});
					  google.charts.setOnLoadCallback(drawChart);
					  function drawChart() {
						var data = google.visualization.arrayToDataTable([
						  ['Assunto', 'Telefonia - Computador - Impressora'],
						  ['Telefonia',     <?php echo $cont_Telefonia; ?>],
						  ['Computador',      <?php echo $cont_computador; ?>],
						  ['Impressora',  <?php echo $cont_impressora; ?>],
						]);

						var options = {
						  title: 'My Daily Activities',
						  is3D: true,
						};

						var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
						chart.draw(data, options);
					  }
			</script>
		 	</div>
		 
		 
		 
		 
		 
		 
		 
		 
			</div>
		 


 
</div>
</div>
      
       

     






