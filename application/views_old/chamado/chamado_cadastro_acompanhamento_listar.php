<div class="content">

  <div class= "col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class= "col-md-10">
      <h1 class= "page-header">Historico Do chamado</h1>
    </div>


        
         <form action="<?= base_url()?>index.php/chamado/pesquisar_chamado" method="post">			
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
                            <th>Acompanhamento</th>
                            <th>data hora</th>
							<th>Usuario</th>
                            <th></th>
                             <th></th>
                              <th></th>
                                                
                        </tr>
                                        
                        <?php foreach ($chamado as $cha){?>
                            <tr>
                                <td><?= $cha ->ACOMPANHAMENTO; ?></td>
                                <td><?= $cha ->DATA_HORA_CADASTRO_CHAMADO; ?></td>
								<td><?= $cha ->NOME; ?></td>
                                <!--<td><a href="<?= base_url('imagens/ancora/'.$cha ->ANEXO) ?>"class="btn btn-info" style="text-align: left">Imagem</a></td>-->
                                <!--<td><a target="direita" href="http://localhost:8080/imagens/ancora<?= $cha ->ANEXO; ?>">Imagem</a></td>-->
                                <!--<td><a href="<?= base_url('index.php/chamado/acompanhamento/'.$cha->PK_ID_CHAMADO_ACOMPANHAMENTO) ?>" class="btn btn-success" style="text-align: left">Ver</a></td>-->
                                <!--<td><a href="<?= base_url('index.php/chamado/acompanhamento'.$cha->PK_ID_CHAMADO) ?>" class="btn btn-info" style="text-align: left">Acompanhamento</a></td>-->
                                <!--<td><a href="<?= base_url('index.php/chamado/excluir/'.$cha->PK_ID_CHAMADO) ?>" class="btn btn-danger" style="text-align: left" onclick= "return confirm('Excluir Usuario')" >Fechar</a></td>-->
                               
                               
                            </tr>
                        
                       
                            
                                 
                             
         
                            
                         
                       
                             <?php }?>                
                    </table>
		 </div>
     </div>
     </div>
