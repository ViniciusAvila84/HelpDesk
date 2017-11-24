<?php

/**
	* 
	*/
	class Usuario_model extends CI_Model
	{
		
		function __construct()
		{
			parent:: __construct();

		}

		public function insert(){
         
			$data['NOME'] = $this->input->post('nome');
			$data['EMAIL'] = $this->input->post('email');
			$data['SENHA'] = md5($this->input->post('senha'));
			//$data['SENHA'] = $this->input->post('senha');
            //$data['FOTO'] = $arquivoPath;
			$data['TELEFONE_FIXO'] = $this->input->post('telefone_fixo');
            $data['TELEFONE_CELULAR'] = $this->input->post('telefone_celular');
            $data['RAMAL'] = $this->input->post('ramal');
            $data['STATUS'] = $this->input->post('status');
			$data['DATA_HORA_CADASTRO_USUARIO'] = date('Y-m-d H:i:s');
			return $this->db->insert('USUARIO',$data);
		}
                
                
                public function atualizar_salvar($id){
          
                        $id=$this->input->post('pk_id_usuario');
                        $data['NOME'] = $this->input->post('nome');
                        $data['EMAIL'] = $this->input->post('email');
                        $data['STATUS'] = $this->input->post('status');
						$data['TELEFONE_FIXO'] = $this->input->post('telefone_fixo');
                        $data['TELEFONE_CELULAR'] = $this->input->post('telefone_celular');
                        $data['RAMAL'] = $this->input->post('ramal');
                        $this-> db -> where('PK_ID_USUARIO',$id);
						return $this->db->update ('USUARIO',$data);
                }
				
				
				
				public function perfil_salvar($id){
          
                        $id=$this->input->post('pk_id_usuario');
                        $data['NOME'] = $this->input->post('nome');
                        $data['EMAIL'] = $this->input->post('email');
                        $data['STATUS'] = $this->input->post('status');
						$data['TELEFONE_FIXO'] = $this->input->post('telefone_fixo');
                        $data['TELEFONE_CELULAR'] = $this->input->post('telefone_celular');
                        $data['RAMAL'] = $this->input->post('ramal');
                        $this-> db -> where('PK_ID_USUARIO',$id);
						return $this->db->update ('USUARIO',$data);
                }

		public function excluir($id){
			$this->db->where('PK_ID_USUARIO',$id);
			//return $this->db->delete('pessoa');
			if ($this->db->delete('USUARIO')){
				return true;
			}else{
				return false;
			}
		}

		public function update(){

			$id= $this->input->post('pk_id_usuario');
			// definimos um nome aleatório para o diretório
		//$folder = random_string('alpha');
			$folder = "profile";
		// definimos o path onde o arquivo será gravado
			$path = "./files/".$folder;

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
			$configUpload['allowed_types'] = 'jpg|png';
		// definimos que o nome do arquivo
		// será alterado para um nome criptografado
		//$configUpload['encrypt_name']  = TRUE;
			$configUpload['file_name']  = "perfil-".$id;

		// passamos as configurações para a library upload
			$this->upload->initialize($configUpload);

		// verificamos se o upload foi processado com sucesso
			if ( ! $this->upload->do_upload('arquivo'))
			{
			// em caso de erro retornamos os mesmos para uma variável
			// e enviamos para a home
				$data= array('error' => $this->upload->display_errors());
			//$this->load->view('home',$data);
			}
			else
			{
			//se correu tudo bem, recuperamos os dados do arquivo
				$data['dadosArquivo'] = $this->upload->data();
			// definimos o path original do arquivo
				$arquivoPath = 'files/'.$folder."/".$data['dadosArquivo']['file_name'];
			// passando para o array '$data'
				$data['urlArquivo'] = base_url($arquivoPath);
			// definimos a URL para download
				$downloadPath = $folder."/".$data['dadosArquivo']['file_name'];
			// passando para o array '$data'
				$data['urlDownload'] = base_url($downloadPath);

			// carregamos a view com as informações e link para download
			//	$this->load->view('download',$data);

				
				
			}

			$dados['NOME'] = $this->input->post('nome');
			$dados['EMAIL'] = $this->input->post('email');
			
			if(!$_FILES['arquivo']['name'] == "") {
			
				$dados['FOTO'] = $arquivoPath;	
				
			}
			
			$this->db->where('PK_ID_USUARIO',$id);
			return $this->db->update('USUARIO',$dados);
			
		}
		
		

		function get_usuario_like(){
			$termo = $this->input->post('pesquisar');
			$this->db->select('*');
			$this->db->from('USUARIO');
			$this->db->like('NOME',$termo);
			$this->db->order_by('NOME'); 
			return $this->db->get()->result();
		}	

                
      
		public function enviar_senha($email, $dados){

			$this->db->where('EMAIL',$email);
			$this->db->update('USUARIO',$dados);
			//$this->db->close();

			//$this->db->connect();
			//$this->db->select('*');
			//$this->db->from('candidato');
			//$this->db->where('email',$email);
			
			//return $this->db->get()->result();


		}

		public function email_senha(){
			$id=9;
			$this->db->select('*');
			$this->db->from('USUARIO');
			$this->db->where('EMAIL',$id);
			return $this->db->get()->result();
		}

		public function salvar_senha($id){
			//$id = $this->input->post('PK_ID_USUARIO');
			$senha_nova = md5($this->input->post('senha_nova'));

			$dados['SENHA'] = $senha_nova;

			$this->db->where('PK_ID_USUARIO',$id);
			$this->db->update('USUARIO',$dados);   
		}

		function get_usuario_email_like($termo=null){
        	$this->db->select('*');
			$this->db->from('USUARIO');
			$this->db->where('email',$termo); 
			//$this->db->join('titulo', 'RAMAL.FK_GRUPO_DE_CAPTURA = GRUPO_DE_CAPTURA.ID_GRUPO_DE_CAPTURA','inner');
			//$this->db->like('lower(RAMAL.NOME)',strtolower($termo));
			//$this->db->group_by("NOME"); 
			return $this->db->get()->result();
        }


	}	
	?>

