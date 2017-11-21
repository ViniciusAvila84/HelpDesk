<div class="content">

<div class= "col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <div class= "col-md-10">
    <h1 class= "page-header">Cadastro de Usuário</h1>
  </div>
 



  <div class="col-md-12">
    <form class="form" action="<?=base_url()?>index.php/usuario/insert" enctype="multipart/form-data" method="post">
      
  

      <div class="row">
        <div class="col-md-5">
          <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" class="form-control" id="titulo" name="nome" placeholder="">
          </div>
        </div>
      </div>  

       <div class="row">
        <div class="col-md-5">
          <div class="form-group">
            <label for="nome">Email:</label>
            <input type="descricao" class="form-control" id="descricao" name="email" placeholder="">
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

       <div class="row">
        <div class="col-md-5">
          <div class="form-group">
            <label for="nome">Telefone Fixo:</label>
            <input type="number" class="form-control" id="habilidades" name="telefone_fixo" placeholder="">
          </div>
        </div>
      </div>  
        
        <div class="row">
        <div class="col-md-5">
          <div class="form-group">
            <label for="nome">Telefone Celular:</label>
            <input type="number" class="form-control" id="habilidades" name="telefone_celular" placeholder="">
          </div>
        </div>
      </div>  

        <div class="row">
        <div class="col-md-5">
          <div class="form-group">
            <label for="nome">Ramal:</label>
            <input type="habilidades" class="form-control" id="habilidades" name="ramal" placeholder="">
          </div>
        </div>
      </div>  

         <div class="row">
        <div class="col-md-5">
          <div class="form-group">
            <label for="nome">Status</label>
            <select class="form-control" id="habilidades" name="status" >
                <option value="0">--- </option>
		<option value="administrador">administrador</option>
                <option value="usuario">usuario</option>
            </select>
          </div>
        </div>
      </div>  


      <div class="col-md-12">
        <div style="text-align: left">
          <button type="submit" class="btn btn-success">Enviar</button>
          <button type="reset" class="btn btn-danger">Cancelar</button>
        </div>
      </div>
    </form>
  </div>
</div>
</div>
      
       

     






