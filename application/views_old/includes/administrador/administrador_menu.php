 <nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?= base_url()?>">Help Desk STV</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
       
       <!--<li><a href="<?= base_url()?>">Inicio</a></li>-->
       
       <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <!--<img src="<?= base_url()?><?= $this->session->userdata('foto')?>" alt="Smiley face" style="border-radius:15px;"  height="32" width="32">-->
          <?= $this->session->userdata('nome')?>

          <strong class="caret"></strong></a>
          <ul class="dropdown-menu">
            <li>
            <a href="<?= base_url()?>index.php/usuario/perfil/<?= $this->session->userdata('pk_id_usuario')?>">Meus dados</a>
            </li>
           
            <li class="divider"></li>
            <li>
              <a href="<?= base_url()?>index.php/logon/logout">Logout</a>
            </li>
          </ul> 
        </li> 
      </ul>
	  
	<!--  <ul class="nav navbar-nav navbar-right">
	  <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Chamados<strong class="caret"></strong></a>
          <ul class="dropdown-menu">
            <li>
            <a href="<?= base_url()?>index.php/chamado/pesquisar_chamado">Meus Chamados</a>
            </li>
           
            <li class="divider"></li>
            <li>
              <a href="<?= base_url()?>index.php/chamado/criar_chamado">Criar novo chamado</a>
            </li>
          </ul> 
        </li> 
      </ul> -->
	  
	  <ul class="nav navbar-nav navbar-right">
	  <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Painel Administrador<strong class="caret"></strong></a>
          <ul class="dropdown-menu">
            
           
            <li class="divider"></li>
            <li>Usuario
            <a href="<?= base_url()?>index.php/usuario/cadastro">Cadastrar</a>
            <a href="<?= base_url()?>index.php/usuario/pesquisar_usuario">Listar</a>
			</li>
			
		<!--	<li class="divider"></li>
			<li>Noticias
            <a href="<?= base_url()?>index.php/noticias/criar_noticias">Criar Noticia</a>
            <a href="<?= base_url()?>index.php/noticias/pesquisar_noticias">Listar Noticias</a>
			</li> 
			
			<li>Chamados
            <a href="<?= base_url()?>index.php/chamado/administrador_pesquisar_chamado">Todos Chamados</a>
            <a href="<?= base_url()?>index.php/chamado/administrador_criar_chamado">Criar Para Outro Usuarios </a>
            </li>
			
			
			-->
			
			<li class="divider"></li>
			<li>Categoria
            <a href="<?= base_url()?>index.php/assunto/criar_assunto">Criar Categoria</a>
            <a href="<?= base_url()?>index.php/assunto/pesquisar_assunto">Listar Categoria</a>
			</li>
			
			<!-- <li class="divider"></li>
			<li>Relatorios
            <a href="<?= base_url()?>index.php/chamado/relatorio">Exibir Relatorios</a>
           
			</li> -->
					
          </ul> 
        </li> 
      </ul>


        
        </div>
      </div>
    </nav>
    