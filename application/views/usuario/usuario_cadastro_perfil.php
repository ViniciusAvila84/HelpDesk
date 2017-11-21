<div class="content">

<div class= "col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <div class= "col-md-10">
    <h1 class= "page-header">Meus Dados</h1>
  </div>
 



  <div class="col-md-12">
    <form class="form" action="<?=base_url()?>index.php/usuario/perfil_salvar/" method="post">
      <input type="hidden" id="pk_id_usuario" name="pk_id_usuario"value="<?= $usuario [0] ->PK_ID_USUARIO?>">
  

      <div class="row">
        <div class="col-md-5">
          <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" class="form-control" id="nome" name="nome" value="<?= $usuario [0] ->NOME?>">
          </div>
        </div>
      </div>  

       <div class="row">
        <div class="col-md-5">
          <div class="form-group">
            <label for="nome">Email:</label>
            <input type="descricao" class="form-control" id="descricao" name="email" value="<?= $usuario [0] ->EMAIL?>">
          </div>
        </div>
      </div>  

      
       <div class="row">
        <div class="col-md-5">
          <div class="form-group">
            <label for="nome">Telefone Fixo:</label>
            <input type="number" class="form-control" id="habilidades" name="telefone_fixo" value="<?= $usuario [0] ->TELEFONE_FIXO?>">
          </div>
        </div>
      </div>  
        
        <div class="row">
        <div class="col-md-5">
          <div class="form-group">
            <label for="nome">Telefone Celular:</label>
            <input type="number" class="form-control" id="habilidades" name="telefone_celular" value="<?= $usuario [0] ->TELEFONE_CELULAR?>">
          </div>
        </div>
      </div>  

        <div class="row">
        <div class="col-md-5">
          <div class="form-group">
            <label for="nome">Ramal:</label>
            <input type="habilidades" class="form-control" id="habilidades" name="ramal" value="<?= $usuario [0] ->RAMAL?>">
          </div>
        </div>
      </div>  

<!--       <div class="row">
        <div class="col-md-5">
          <div class="form-group">
            <label for="nome">Status</label>
            <select class="form-control" id="habilidades" name="status" >
                <option value="0">--- </option>
		<option value="administrador"<?= $usuario [0] ->STATUS='administrador'?'selected':'';?>>administrador</option>
                <option value="usuario"<?= $usuario [0] ->STATUS='usuario'?'selected':'';?>>usuario</option>
             
            </select>
          </div>
        </div>
      </div>  
	  
	  <div class="row">
        <div class="col-md-5">
          <div class="form-group">
            <label for="nome">Senha:</label>
            <input type="password" class="form-control" id="descricao" name="senha" placeholder="">
          </div>
        </div>
      </div>

 
	  
	  -->
            

      <div class="col-md-12">
        <div style="text-align: left">
          <button type="submit" class="btn btn-success">Enviar</button>
          <!-- <button type="reset" class="btn btn-danger" >Cancelar</button> -->
        </div>
      </div>
    </form>
  </div>
</div>
</div>
      
       

     






