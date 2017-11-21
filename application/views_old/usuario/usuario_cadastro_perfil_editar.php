<script>
  $(document).on("keydown", "#TxtObservacoes", function () {
    var caracteresRestantes = 655;
    var caracteresDigitados = parseInt($(this).val().length);
    var caracteresRestantes = caracteresRestantes - caracteresDigitados;
    
    $(".caracteres").text(caracteresRestantes);
  });
</script>


<div class="content">

  <div class= "col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class= "col-md-10">
      <h1 class= "page-header">Editar Perfil</h1>
    </div>
    

    <!--index.php/usuario/update-->

    <div class="col-md-12">

      <form class="form" action="<?=base_url()?>index.php/usuario/update_perfil" method="post" enctype="multipart/form-data">
        <input type="hidden" id="pk_id_pessoa" name="pk_id_usuario" value="<?= $usuario[0]->PK_ID_USUARIO;?>">
        
        <div class="row">
          <div class="col-md-5">
            <div class="form-group">
              <img src="<?= base_url()?><?= $usuario[0]->FOTO;?>" alt="Smiley face"  style="border: thin solid;"  height="82" width="82">

            </div>
          </div>
        </div>  

        <div class="row">
          <div class="col-md-5">
            <div class="form-group">
              <label for="nome">Nome:</label>
              <input type="text" class="form-control" id="titulo" name="nome" placeholder="" value="<?= $usuario[0]->NOME;?>">
            </div>
          </div>
        </div>  

        <div class="row">
          <div class="col-md-5">
            <div class="form-group">
              <label for="nome">Email:</label>
              <input type="descricao" class="form-control" id="descricao" name="email" placeholder="" value="<?= $usuario[0]->EMAIL;?>" readonly>
            </div>
          </div>
        </div>  

        <div class="row">
          <div class="col-md-5">
            <div class="form-group">
              <label for="nome">Senha:</label>
              <input type="button" class="btn btn-default btn-block" value="Atualizar Senha" data-toggle="modal" data-target="#myModal">
            </div>
          </div>
        </div>

        

        <div class="row">
          <div class="col-md-5">
            <div class="form-group">
              <label for="exampleInputFile">Foto:</label>
              <input type="file" id="arquivo" name="arquivo">
            </div>
          </div> 
        </div>
        

        <div class="row">
          <div class="col-md-10">
            <div style="text-align: left">
              <button type="submit" class="btn btn-success">Enviar</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>




<!-- Modal Atualizar Senha-->
<div aria-hidden="true" aria-labelledby="myModalLabel" class="modal fade" id="myModal" role="dialog" tabindex="-1">
  <div class="modal-dialog">
    <form action="<?=base_url()?>index.php/usuario/salvar_senha" method="post">
      <input id="pk_id_usuario" name="pk_id_usuario" type="hidden" value="<?= $usuario[0]->PK_ID_USUARIO;?>" />
      <br />
      <div class="modal-content">
        <div class="modal-header">
          <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>
          <br />
          <h4 class="modal-title" id="myModalLabel">
            Atualizar Senha</h4>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-12 form-group">
                <label for="senha_antiga">Senha antiga:</label>
                <input class="form-control" id="senha_antiga" name="senha_antiga" type="password" />
              </div>
              <div class="col-md-12 form-group">
                <label for="senha_nova">Nova Senha:</label>
                <input class="form-control" id="senha_nova" name="senha_nova" onkeyup="checarSenha()" type="password" />
              </div>
              <div class="col-md-12 form-group">
                <label for="senha_confirmar">Confirmar Senha:</label>
                <input class="form-control" id="senha_confirmar" name="senha_confirmar" onkeyup="checarSenha()" type="password" />
              </div>
              <div class="col-md-12 form-group">
                <div id="divcheck">
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-default" data-dismiss="modal" type="button">Fechar</button>
            <button class="btn btn-primary" disabled="" id="enviarsenha" type="submit">Salvar</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <script>
   $(document).ready(function() {
     $("#senha_nova").keyup(checkPasswordMatch);
     $("#senha_confirmar").keyup(checkPasswordMatch);

   });
   function checarSenha() {
     var password = $("#senha_nova").val();
     var confirmPassword = $("#senha_confirmar").val();


     if (password == '' || '' == confirmPassword) {
       $("#divcheck").html("<span style='color: red'>Campo de senha vazio!</span>");
       document.getElementById("enviarsenha").disabled = true;
     } else if (password != confirmPassword) {
       $("#divcheck").html("<span style='color: red'>Senhas não conferem!</span>");
       document.getElementById("enviarsenha").disabled = true;
     } else {
       $("#divcheck").html("<span style='color: green'>Senha iguais!</span>");
       document.getElementById("enviarsenha").disabled = false;
     }
   }
 </script>





