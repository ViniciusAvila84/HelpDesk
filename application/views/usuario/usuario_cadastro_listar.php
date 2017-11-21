<div class="content">

  <div class= "col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class= "col-md-10">
      <h1 class= "page-header">Lista de Usuario</h1>
    </div>


        
         <form action="<?= base_url()?>index.php/usuario/pesquisar_usuario" method="post">			
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
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Ramal</th>
                            <th>Celular</th>
                            <th>Fixo</th>
                            <th>Email</th>
                            <th>Status</th>
                       
                        </tr>
                                        
                        <?php foreach ($usuario as $usu){?>
                            <tr>
                                <td><?= $usu ->PK_ID_USUARIO; ?></td>
                                <td><?= $usu ->NOME; ?></td>
                                <td><?= $usu ->RAMAL; ?></td>
                                <td><?= $usu ->TELEFONE_CELULAR; ?></td>
                                <td><?= $usu ->TELEFONE_FIXO; ?></td>
                                <td><?= $usu ->EMAIL; ?></td>
                                <td><?= $usu ->STATUS; ?></td>
                                <td><a href="<?= base_url('index.php/usuario/atualizar/'.$usu->PK_ID_USUARIO) ?>" class="btn btn-success" style="text-align: left">Atualizar</a></td>
                                <td><a href="<?= base_url('index.php/usuario/excluir/'.$usu->PK_ID_USUARIO) ?>" class="btn btn-danger" style="text-align: left" onclick= "return confirm('Excluir Usuario')" >Remover</a> </td>
                            </tr>
                         <?php }?>                
                    </table>
		 </div>
     </div>
     </div>

	
