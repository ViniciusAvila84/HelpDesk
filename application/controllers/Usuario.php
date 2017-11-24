<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

	
	function __construct(){
		parent::__construct();
	}


	public function verificar_sessao(){

		if ($this->session->userdata('logado')==false){
			redirect('index.php/logon/login');
		}
	}

	public function index($indice=null){
		$this->verificar_sessao();
		$this->load->model('usuario_model', 'usuario');	
		$data['usuarios'] = $this -> usuario->get_usuario_like();
                $this->load->view('usuario/usuario_cadastro_pesquisar', $data);
                
		$this->load->view('includes/administrador/administrador_menu');
		//$this->load->view('includes/usuario/menu');
                $this->load->view('includes/usuario/html_header');
		$this->load->view('inicio');
		$this->load->view('includes/usuario/html_footer');
		
	}


	


	public function cadastro($indice=null){
	        $this->load->view('usuario/usuario_cadastro_inserir');	
            $this->load->view('includes/administrador/administrador_menu');
			//$this->load->view('includes/usuario/menu');
            $this->load->view('includes/usuario/html_header');
		
		$this->load->view('includes/usuario/html_footer');
	}
        
        public function insert(){
			$this->load->model('usuario_model', 'usuario');	
		if ($this->usuario->insert()){
			redirect('index.php/usuario/pesquisar_usuario'); 
		}else{
			redirect('index.php/usuario/pesquisar_usuario'); 
		}
	}
        
        
         public function atualizar($id=null,$indice=null){
            $this-> db -> where('PK_ID_USUARIO',$id);
            $data ['usuario'] = $this->db->get ('USUARIO')-> result();
            $this->load->view('usuario/usuario_cadastro_editar', $data);
              
                $this->load->view('includes/administrador/administrador_menu');
				//$this->load->view('includes/usuario/menu');
                $this->load->view('includes/usuario/html_header');
				$this->load->view('includes/usuario/html_footer');
        }
        
        
        public function atualizar_salvar(){
            $this->load->model('usuario_model','usuario');
            if ($this->usuario->atualizar_salvar()){
            redirect('index.php/usuario/pesquisar_usuario'); 
            }
        }
        
        
        public function perfil($id=null,$indice=null){
            $this-> db -> where('pk_id_usuario',$id);
            $data ['usuario'] = $this->db->get ('USUARIO')-> result();
            $this->load->view('usuario/usuario_cadastro_perfil', $data);
            
			    //$this->load->view('includes/usuario/administrador_menu');
				$this->load->view('includes/usuario/menu');
                $this->load->view('includes/usuario/html_header');
				$this->load->view('includes/usuario/html_footer');
        }
        
		
        public function perfil_salvar(){
            $this->load->model('usuario_model','usuario');
            if ($this->usuario->perfil_salvar()){
            redirect('index.php/inicio/index'); 
            }
        }
        
        
        

        
        public function pesquisar_usuario()	{
            $this->load->model('usuario_model','usuario');
            $usuario['usuario'] = $this->usuario->get_usuario_like();
            $this->load->view('usuario/usuario_cadastro_listar', $usuario);    
                
                $this->load->view('includes/administrador/administrador_menu');
			//$this->load->view('includes/usuario/menu');
                $this->load->view('includes/usuario/html_header');
		//$this->load->view('inicio');
		$this->load->view('includes/usuario/html_footer');
        }
            
        

	public function excluir($id){
		$this->load->model('usuario_model', 'usuario');	
		if ($this->usuario->excluir($id)){
			redirect('index.php/usuario/pesquisar_usuario'); 
                }else{
                        redirect('index.php/usuario/pesquisar_usuario'); 
                     }
	}	

    

	
        public function salvar_senha(){
		$this->load->model('usuario_model','usuario');
		$id = $this->input->post('pk_id_usuario');

		if($this->usuario->salvar_senha($id)){               
			redirect('index.php/usuario/atualizar/'.$id);
		}else{
			redirect('index.php/usuario/atualizar/'.$id);
		}    
	}



	public function login(){
		$this->load->view('includes/html_header');
		$this->load->view('empresa_login');
				
	}

	public function logar(){
		$email= $this->input->post('email');
//		$password= md5($this->input->post('senha'));
                $password= $this->input->post('senha');

		$this->db->where('email',$email);
		$this->db->where('senha',$password);
		//$this->db->where('status',1);

		$data['nosso_cliente'] =$this->db->get('nosso_cliente')->result();

		if (count($data['nosso_cliente'])==1){
			$dados['nome'] = $data['nosso_cliente'][0]->nome_completo;
			$dados['idUsuario'] = $data['nosso_cliente'][0]->pk_id_nosso_cliente;
			$dados['logado']=true;
			$this->session->set_userdata($dados);
			redirect('vagas');
		}else{
			redirect('empresa/login');
		}

	}	


	public function logout(){
		$this->session->sess_destroy();
		redirect('login');
		
	}


	// Método que processar o upload do arquivo
	public function Upload(){

		// definimos um nome aleatório para o diretório
		$folder = random_string('alpha');
		//$folder = "teste";
		// definimos o path onde o arquivo será gravado
		$path = "./uploads/".$folder;

		// verificamos se o diretório existe
		// se não existe criamos com permissão de leitura e escrita
		if ( ! is_dir($path)) {
			mkdir($path, 0777, $recursive = true);
		}

		// definimos as configurações para o upload
		// determinamos o path para gravar o arquivo
		$configUpload['upload_path']   = $path;
		// definimos - através da extensão -
		// os tipos de arquivos suportados
		$configUpload['allowed_types'] = 'jpg|png|gif|pdf|zip|rar|doc|xls';
		// definimos que o nome do arquivo
		// será alterado para um nome criptografado
		$configUpload['encrypt_name']  = TRUE;

		// passamos as configurações para a library upload
		$this->upload->initialize($configUpload);

		// verificamos se o upload foi processado com sucesso
		if ( ! $this->upload->do_upload('arquivo'))
		{
			// em caso de erro retornamos os mesmos para uma variável
			// e enviamos para a home
			$data= array('error' => $this->upload->display_errors());
			$this->load->view('home',$data);
		}
		else
		{
			//se correu tudo bem, recuperamos os dados do arquivo
			$data['dadosArquivo'] = $this->upload->data();
			// definimos o path original do arquivo
			$arquivoPath = 'uploads/'.$folder."/".$data['dadosArquivo']['file_name'];
			// passando para o array '$data'
			$data['urlArquivo'] = base_url($arquivoPath);
			// definimos a URL para download
			$downloadPath = 'download/'.$folder."/".$data['dadosArquivo']['file_name'];
			// passando para o array '$data'
			$data['urlDownload'] = base_url($downloadPath);

			// carregamos a view com as informações e link para download
			$this->load->view('download',$data);
		}
	}


	
	public function enviar_senha(){


		$email= $this->input->post('email');
		$chars = 'abcdxywzABCDZYWZ0123456789';
		$max = strlen($chars)-1;
		$pass = "";
		$width = 8;
		for($i=0; $i<$width; $i++){
			$pass .= $chars{mt_rand(0, $max)};
		}
		echo $pass;
		echo $email;

		echo $senha_nova = md5($pass);
		$dados['senha'] = $senha_nova;

		$this->load->model('usuario_model', 'usuario');	
		$this->usuario->enviar_senha($email, $dados);


		$this->load->model('usuario_model', 'usuario');	
		//$this->candidato->email_senha($email, $dados);
		$dados['usuarios'] = $this -> usuario->email_senha();

		//$teste1= $usuario[0]->nome_completo; 

		
		
		$termo= $email;
		//$termo= $this->input->post('email');
		$this->load->model('usuario_model', 'usuario');	
		$dados= $this -> usuario->get_usuario_email_like($termo);
		foreach($dados as $campo) { 
			//$teste_email = $campo->email;
			//$teste_destino = $campo->nome;
			//$email= $teste_email;
			$this->load->library('My_PHPMailer');
			$mail = new My_phpmailer();
			$from = 'no-replay@stv.com.br';
			$fromName= 'Enviado pelo Site';
			$host = '192.168.0.49';
			$username = 'teste';
			$password='teste';
			$port=25;
			$secure=false;
			$conteudo ='
			<html>
			<body style="margin:0px;">
				<div style="background-color:#fff; width:90%; height:150px; text-align:left; border-radius: 10px; margin: 0 auto;">
					<h3 style="color: #000; font-size: 20px;">Olá ,</h3>
					<p style="color: #000; font-size: 18px; line-height: 1.4px;">Estamos lhe enviando a sua nova senha: '.$pass.'</p>
					
					
				</div>
			</body>
			</html>		
			';
			$mail ->setLanguage('pt');
			$mail->isSMTP();
			$mail->SMTPDebug = 0;
			$mail->Host = $host;
			$mail->SMTPAuth = false;
			$mail->Username = $username;
			$mail->Password = $password;
			$mail->Port = $port;
			$mail->SMTPSecure = $secure;
			$mail->isHTML(true);
			$mail->CharSet ='utf-8';
			$mail->WordWrap=70;
			$mail->From =$from;
			$mail->fromName =$fromName;
			$mail->SetFrom('no-relay@stv.com.br', 'Sistema - STV Segurança');
			$mail->addAddress($email);
			//$mail->addAddress($campo->email);
			$mail->Subject='Solicitação de senha';
			$mail->Body = $conteudo;
			$send = $mail->Send();

			if($send){
				redirect('index.php/logon/login');

			}
			else{
				echo'Erro:'.$mail->ErrorInfo;
				redirect('index.php/logon/login');
			}


		}		

	}




	
}
?>