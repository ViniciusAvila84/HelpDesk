


<div class="container">

  <form class="form-signin" method="post" action="<?= base_url(); ?>index.php/logon/logar">
    <h2 class="form-signin-heading">Help Desk STV</h2>
    <label for="inputEmail" class="sr-only">Nome</label>
    <input type="text" id="nome" class="form-control" placeholder="NOME" name="nome" >
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="inputPassword" class="form-control" placeholder="Senha" name="senha" required>
    <div class="checkbox">
      <label>
        <input type="checkbox" value="remember-me">Lembrar senha!
      </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Acessar</button>
    <a href="<?= base_url('index.php/candidato/cadastrese')?>" class="btn btn-lg btn-default btn-block">Cadastre-se</a>
      
    <br/>
    <a href="" type="text" data-target="#myModal" data-toggle="modal" class="">Esqueci a minha senha!</a>
  </form>

</div> <!-- /container -->


<!-- Modal Atualizar Senha-->
<div aria-hidden="true" aria-labelledby="myModalLabel" class="modal fade" id="myModal" role="dialog" tabindex="-1">
  <div class="modal-dialog">
    <form action="<?=base_url()?>index.php/usuario/enviar_senha" method="post">
      
      <br />
      <div class="modal-content">
        <div class="modal-header">
          <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>
          <br />
          <h4 class="modal-title" id="myModalLabel">
            Esqueci a minha senha! </h4>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-12 form-group">
                <label for="senha_antiga">E-mail:</label>
                <input class="form-control" id="email" name="email" type="email" required="" placeholder="Digite o e-mail cadastrado." />
              </div>

              <div class="col-md-12 form-group">
                <p>As instruções para redefinição de senha serão enviadas para seu e-mail de acesso.</p>
              </div>
              
              <div class="col-md-12 form-group">
                <div id="divcheck">
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-default" data-dismiss="modal" type="button">Fechar</button>
            <button class="btn btn-primary"  id="enviarsenha" type="submit">Enviar</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  