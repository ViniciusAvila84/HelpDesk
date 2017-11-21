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
       <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?= $this->session->userdata('nome')?><strong class="caret"></strong></a>
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
        </li> -->
      </ul>
		

	  
	</div>
		  
	

	</div>
    </nav>
    