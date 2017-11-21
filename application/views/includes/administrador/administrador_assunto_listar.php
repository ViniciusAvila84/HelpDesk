<div class="content">

  <div class= "col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class= "col-md-10">
      <h1 class= "page-header">Lista de Assuntos</h1>
    </div>


        
         <form action="<?= base_url()?>index.php/noticias/pesquisar_noticias" method="post">			
            <div class="form-group">
                 <div class="col-md-10">
                    <input type="text" class="form-control" id="pesquisar" name="pesquisar">
                 </div>
                 <div class="col-md-2">
                    <button type="submit" class="btn btn-default">Pesquisar</button>
		 </div>
            </div>
          </form>

									
		<div class="col-md-12">
                   <table class="table table-striped ">
                            
                        <tr>
                            <th>Assunto</th>
                         <th></th>
                         </tr>
                                        
                        <?php foreach ($assunto as $cha){?>
                            <tr>
                                <td><?= $cha ->NOME_ASSUNTO; ?></td>
                               
                                <td><a href="<?= base_url('index.php/assunto/excluir_assunto/'.$cha->PK_ID_ASSUNTO) ?>" class="btn btn-danger" style="text-align: left">Excluir</a></td>
							</tr>
                        
                        <?php }?>                
                    </table>
		 </div>
           
     </div>
	 
     </div>
