<?php

class Chamado_model extends CI_Model
	{
		
		function __construct()
		{
			parent:: __construct();

		}

		public function insert(){
			
		
					
					
        $id = $this->session->userdata('pk_id_usuario');
		// definimos um nome aleatório para o diretório
		//$folder = random_string('alpha');
		$folder = "imagem";
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
			$configUpload['file_name']  = "anexo".$id;

		// passamos as configurações para a library upload
			$this->upload->initialize($configUpload);

		// verificamos se o upload foi processado com sucesso
			if ( ! $this->upload->do_upload('arquivo'))
			{
			// em caso de erro retornamos os mesmos para uma variável
			// e enviamos para a home
				$up= array('error' => $this->upload->display_errors());
			//$this->load->view('home',$up);
			}
			else
			{
			//se correu tudo bem, recuperamos os dados do arquivo
				$up['dadosArquivo'] = $this->upload->data();
			// definimos o path original do arquivo
				$arquivoPath = 'files/'.$folder."/".$up['dadosArquivo']['file_name'];
			// passando para o array '$data'
				$up['urlArquivo'] = base_url($arquivoPath);
			// definimos a URL para download
				$downloadPath = $folder."/".$up['dadosArquivo']['file_name'];
			// passando para o array '$data'
				$up['urlDownload'] = base_url($downloadPath);

			// carregamos a view com as informações e link para download
			//	$this->load->view('download',$data);

				
				
			}
			
				//$idsecao = $this->session->userdata('pk_id_usuario');
						//$this->db->select('*');
						//$this->db->from('USUARIO');
						//$this->db->where('PK_ID_USUARIO',$idsecao);
						//$nomesecao['usuarios'] = $this->db->get()->result();
						
						
                    //$data2['DESCRICAO_HISTORICO'] = ['CHAMADO ABERTO'];
					//$data2['DATA_HORA_CADASTRO_CHAMADO'] = date('Y-m-d H:i:s');
					//$data2['FK_ID_USUARIO'] = $idsecao; 
					//$data2['FK_ID_USUARIO'] = $nomesecao ['usuarios'][0]->NOME;
					//$data2['FK_ID_CHAMADO'] = $id;
					//$this->db->insert('HISTORICO',$data2);
					
					
		
			$data['TITULO'] = $this->input->post('titulo');
			$data['DESCRICAO'] = $this->input->post('descricao');
			$data['ANEXO'] = $arquivoPath;
			$data['CHAMADO_STATUS'] = "Aberto";
			$data['FK_ID_USUARIO'] = $id;
			$data['FK_ID_ASSUNTO'] = $this->input->post('fk_id_assunto');
            $data['DATA_HORA_CADASTRO_CHAMADO'] = date('Y-m-d H:i:s');
			
	

			
			return $this->db->insert('CHAMADO',$data);
                        
                        $id=$this->input->post('PK_ID_CHAMADO');
                        $this-> db -> where('PK_ID_CHAMADO',$id);
						
						$idsecao = $this->session->userdata('pk_id_usuario');
						$data2['DESCRICAO_HISTORICO'] = ('CHAMADO ABERTO');
						$data2['DATA_HORA_CADASTRO_CHAMADO'] = date('Y-m-d H:i:s');
						$data2['FK_ID_USUARIO'] = $idsecao; 
						//$data2['FK_ID_USUARIO'] = $nomesecao ['usuarios'][0]->NOME;
						$data2['FK_ID_CHAMADO'] = $id;
						$this->db->insert('HISTORICO',$data2);
                        
						return $this->db->update ('CHAMADO',$data);
                        
                    
					
					
					$idsecao = $this->session->userdata('pk_id_usuario');
						//$this->db->select('*');
						//$this->db->from('USUARIO');
						//$this->db->where('PK_ID_USUARIO',$idsecao);
						//$nomesecao['usuarios'] = $this->db->get()->result();
						
						
                    $data2['DESCRICAO_HISTORICO'] = ['CHAMADO ABERTO'];
					$data2['DATA_HORA_CADASTRO_CHAMADO'] = date('Y-m-d H:i:s');
					$data2['FK_ID_USUARIO'] = $idsecao; 
					//$data2['FK_ID_USUARIO'] = $nomesecao ['usuarios'][0]->NOME;
					$data2['FK_ID_CHAMADO'] = $id;
					$this->db->insert('HISTORICO',$data2);
					$id2=$this->input->post('PK_ID_HISTORICO');
                    $this-> db -> where('PK_ID_HISTORICO',$id2);
                    return $this->db->update ('CHAMADO',$data2);    
                        
                        
		}
                
                public function administrador_insert(){
                    
    // definimos um nome aleatório para o diretório
		//$folder = random_string('alpha');
			$folder = "imagem";
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
			$configUpload['file_name']  = "anexo".$id;

		// passamos as configurações para a library upload
			$this->upload->initialize($configUpload);

		// verificamos se o upload foi processado com sucesso
			if ( ! $this->upload->do_upload('arquivo'))
			{
			// em caso de erro retornamos os mesmos para uma variável
			// e enviamos para a home
				$up= array('error' => $this->upload->display_errors());
			//$this->load->view('home',$up);
			}
			else
			{
			//se correu tudo bem, recuperamos os dados do arquivo
				$up['dadosArquivo'] = $this->upload->data();
			// definimos o path original do arquivo
				$arquivoPath = 'files/'.$folder."/".$up['dadosArquivo']['file_name'];
			// passando para o array '$data'
				$up['urlArquivo'] = base_url($arquivoPath);
			// definimos a URL para download
				$downloadPath = $folder."/".$up['dadosArquivo']['file_name'];
			// passando para o array '$data'
				$up['urlDownload'] = base_url($downloadPath);

			// carregamos a view com as informações e link para download
			//	$this->load->view('download',$data);

				
				
			}
			
				
			$data['TITULO'] = $this->input->post('titulo');
			$data['DESCRICAO'] = $this->input->post('descricao');
			//$data['ANEXO'] = $this->input->post('anexo');
			$data['ANEXO'] = $arquivoPath;
			$data['CHAMADO_STATUS'] = "Aberto";
			$data['FK_ID_USUARIO'] = $this->input->post('fk_id_usuario');
			$data['FK_ID_ASSUNTO'] = $this->input->post('fk_id_assunto');
			$data['DATA_HORA_CADASTRO_CHAMADO'] = date('Y-m-d H:i:s');
			 $this->db->insert('CHAMADO',$data);
                        
                        $id=$this->input->post('PK_ID_CHAMADO');
                        $this-> db -> where('PK_ID_CHAMADO',$id);
                        return $this->db->update ('CHAMADO',$data);
                        
						//GRAVA AÇÃO NO CHAMADO
						$idsecao = $this->session->userdata('pk_id_usuario');
						$data2['DESCRICAO_HISTORICO'] = ('CHAMADO ABERTO');
						$data2['DATA_HORA_CADASTRO_HISTORICO'] = date('Y-m-d H:i:s');
						$data2['FK_ID_USUARIO'] = $idsecao; 
						$data2['FK_ID_CHAMADO'] = $id;
						return $this->db->insert('HISTORICO',$data2);
						//INSERIR NA TABELA HISTORICO
		}
                
                
                
                
                
                
                
                
                
                
                
                
                
                public function excluir($id){
			$this->db->where('PK_ID_CHAMADO',$id);
			//return $this->db->delete('pessoa');
			if ($this->db->delete('CHAMADO')){
				return true;
			}else{
				return false;
			}
		}
                
                
                function get_chamado_like(){
                    $id = $this->session->userdata('pk_id_usuario');
					//$termo = $this->input->post('pesquisar');
					$this->db->select('CHAMADO.*, USUARIO.NOME, USUARIO.RAMAL, RESPONSAVEL.NOME AS RESPONSAVEL');
					$this->db->from('CHAMADO');					
                    $this->db->where('CHAMADO.FK_ID_USUARIO',$id);
					//$this->db->where('CHAMADO_STATUS','aberto');
                    //$this->db->where('CHAMADO_STATUS','aberto' or 'pendente');
					//$this->db->where('CHAMADO_STATUS' <=> 'fechado');
					//$this->db->like('CHAMADO.DESCRICAO',$termo);
					//$this->db->order_by('DESCRICAO'); 
					//$this->db->order_by('CHAMADO.PK_ID_CHAMADO');
                    $this->db->join ('USUARIO','CHAMADO.FK_ID_USUARIO=USUARIO.PK_ID_USUARIO','inner');
                    $this->db->join ('USUARIO AS RESPONSAVEL','CHAMADO.RESPONSAVEL_ID=RESPONSAVEL.PK_ID_USUARIO','left');
					return $this->db->get()->result();
				}	
               
                
		function get_administrador_chamado_like(){
		       
			//$termo = $this->input->post('pesquisar');
			$this->db->select('CHAMADO.*, USUARIO.*,RESPONSAVEL.NOME AS RESPONSAVEL');
			$this->db->from('CHAMADO');
			//$this->db->like('DESCRICAO',$termo);
			//$this->db->order_by('PK_ID_CHAMADO'); 
		    $this->db->join ('USUARIO','CHAMADO.FK_ID_USUARIO=USUARIO.PK_ID_USUARIO','inner');
		    $this->db->join ('USUARIO AS RESPONSAVEL','CHAMADO.RESPONSAVEL_ID=RESPONSAVEL.PK_ID_USUARIO','left');

			return $this->db->get()->result();
		}	
                
                
                
                
                
                
              /*  public function atualizar_salvar($id){
                        $id=$this->input->post('PK_ID_CHAMADO');
                        $data['TITULO'] = $this->input->post('titulo');
						$data['DESCRICAO'] = $this->input->post('descricao');
						$data['FK_ID_ASSUNTO'] = $this->input->post('fk_id_assunto');
                        $this-> db -> where('PK_ID_CHAMADO',$id);
						
						//GRAVA AÇÃO NO CHAMADO
						$idsecao = $this->session->userdata('pk_id_usuario');
						$data2['DESCRICAO_HISTORICO'] = ('CHAMADO ATUALIZADO PELO USUARIO');
						$data2['DATA_HORA_CADASTRO_HISTORICO'] = date('Y-m-d H:i:s');
						$data2['FK_ID_USUARIO'] = $idsecao; 
						$data2['FK_ID_CHAMADO'] = $id;
						return $this->db->insert('HISTORICO',$data2);
						//INSERIR NA TABELA HISTORICO
						
						
                        return $this->db->update ('CHAMADO',$data);
                } */
                
                    public function administrador_atualizar_salvar($id){
						
						
						$idsecao = $this->session->userdata('pk_id_usuario');
						$this->db->select('*');
						$this->db->from('USUARIO');
						$this->db->where('PK_ID_USUARIO',$idsecao);
						$nomesecao['usuarios'] = $this->db->get()->result();
						
						if($this->input->post('status')=='Em_Atendimento'){
						$id=$this->input->post('PK_ID_CHAMADO');
						$data['TITULO'] = $this->input->post('titulo');
						$data['DESCRICAO'] = $this->input->post('descricao');
						$data['CHAMADO_STATUS'] = $this->input->post('status');
						$data['FK_ID_ASSUNTO'] = $this->input->post('fk_id_assunto');
                       					
						//GRAVA AÇÃO NO CHAMADO
						$data2['DESCRICAO_HISTORICO'] = ('CHAMADO ATUALIZADO - EM ATENDIMENTO');
						$data2['DATA_HORA_CADASTRO_HISTORICO'] = date('Y-m-d H:i:s');
						$data2['FK_ID_USUARIO'] = $idsecao; 
						$data2['FK_ID_CHAMADO'] = $id; 
						$this->db->insert('HISTORICO',$data2);
						//INSERIR NA TABELA HISTORICO
						$this-> db -> where('PK_ID_CHAMADO',$id);
                        return $this->db->update ('CHAMADO',$data);
						
						}else{
										
						$id=$this->input->post('PK_ID_CHAMADO');
						$data['TITULO'] = $this->input->post('titulo');
						$data['DESCRICAO'] = $this->input->post('descricao');
						$data['CHAMADO_STATUS'] = $this->input->post('status');
						$data['FK_ID_ASSUNTO'] = $this->input->post('fk_id_assunto');
						$data['DATA_HORA_FECHAMENTO_CHAMADO'] = date('Y-m-d H:i:s');
                       					
						//GRAVA AÇÃO NO CHAMADO
						$data2['DESCRICAO_HISTORICO'] = ('CHAMADO FECHADO');
						$data2['DATA_HORA_CADASTRO_HISTORICO'] = date('Y-m-d H:i:s');
						$data2['FK_ID_USUARIO'] = $idsecao; 
						$data2['FK_ID_CHAMADO'] = $id; 
						$this->db->insert('HISTORICO',$data2);
						//INSERIR NA TABELA HISTORICO
						$this-> db -> where('PK_ID_CHAMADO',$id);
                        return $this->db->update ('CHAMADO',$data);
						
						}
					}
                
					public function atribuirchamado($id){
						$id=$this->input->post('PK_ID_CHAMADO');
						
						$idsecao = $this->session->userdata('pk_id_usuario');
						$this->db->select('*');
						$this->db->from('USUARIO');
						$this->db->where('PK_ID_USUARIO',$idsecao);
						$nomesecao['usuarios'] = $this->db->get()->result();
						
						if ($chamado [STATUS] [0] =='Aberto'){
					    $data['RESPONSAVEL'] = $nomesecao ['usuarios'][0]->NOME;
						$data['CHAMADO_STATUS'] = 'Em_Atendimento';
					    $this-> db -> where('PK_ID_CHAMADO',$id);
						
						//GRAVA AÇÃO NO CHAMADO
						//$idsecao = $this->session->userdata('pk_id_usuario');
						$data2['DESCRICAO_HISTORICO'] = ('CHAMADO ATRIBUIDO PARA '.$nomesecao ['usuarios'][0]->NOME);
						$data2['DATA_HORA_CADASTRO_HISTORICO'] = date('Y-m-d H:i:s');
						$data2['FK_ID_USUARIO'] = $idsecao; 
						$data2['FK_ID_CHAMADO'] = $id;
						return $this->db->insert('HISTORICO',$data2);
						//INSERIR NA TABELA HISTORICO
						
						
                        return $this->db->update ('CHAMADO',$data);
						}else{
                    
                        $data['RESPONSAVEL'] = $nomesecao ['usuarios'][0]->NOME;
						$data['CHAMADO_STATUS'] = $this->input->post('status');
                        $this-> db -> where('PK_ID_CHAMADO',$id);
						
						//GRAVA AÇÃO NO CHAMADO
						//$idsecao = $this->session->userdata('pk_id_usuario');
						$data2['DESCRICAO_HISTORICO'] = ('CHAMADO ATRIBUIDO PARA '+$nomesecao ['usuarios'][0]->NOME);
						$data2['DATA_HORA_CADASTRO_HISTORICO'] = date('Y-m-d H:i:s');
						$data2['FK_ID_USUARIO'] = $idsecao; 
						$data2['FK_ID_CHAMADO'] = $id;
						return $this->db->insert('HISTORICO',$data2);
						//INSERIR NA TABELA HISTORICO
						
						
                        return $this->db->update ('CHAMADO',$data);
						}
						
						}
	
			 
                
                 
        public function acompanhamento_salvar(){
			
			$id = $this->session->userdata('pk_id_usuario');
			
			
            // definimos um nome aleatório para o diretório
		//$folder = random_string('alpha');
		$folder = "imagem";
		
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
			$configUpload['file_name']  = "acompanhamentoanexo".$id;

		// passamos as configurações para a library upload
			$this->upload->initialize($configUpload);

		// verificamos se o upload foi processado com sucesso
			if ( ! $this->upload->do_upload('arquivo'))
			{
			// em caso de erro retornamos os mesmos para uma variável
			// e enviamos para a home
				$up= array('error' => $this->upload->display_errors());
			//$this->load->view('home',$up);
			}
			else
			{
			//se correu tudo bem, recuperamos os dados do arquivo
				$up['dadosArquivo'] = $this->upload->data();
			// definimos o path original do arquivo
				$arquivoPath = 'files/'.$folder."/".$up['dadosArquivo']['file_name'];
			// passando para o array '$data'
				$up['urlArquivo'] = base_url($arquivoPath);
			// definimos a URL para download
				$downloadPath = $folder."/".$up['dadosArquivo']['file_name'];
			// passando para o array '$data'
				$up['urlDownload'] = base_url($downloadPath);

			// carregamos a view com as informações e link para download
			//	$this->load->view('download',$data);

				
				
			}
			
			
			
			
			
            
			$data['FK_ID_CHAMADO'] = $this->input->post('FK_ID_CHAMADO');
			$data['ACOMPANHAMENTO'] = $this->input->post('acompanhamento');
			$data['CHAMADO_ACOMPANHAMENTO_ANEXO'] = $arquivoPath;
			$data['DATA_HORA_CADASTRO_ACOMPANHAMENTO'] = date('Y-m-d H:i:s');
            $data['FK_ID_USUARIO'] = $id;
			return $this->db->insert('CHAMADO_ACOMPANHAMENTO',$data);

                        $id=$this->input->post('PK_ID_CHAMADO_ACOMPANHAMENTO');
                        //$data['ANEXO'] = $this->input->post('anexo');
			
                        $this-> db -> where('PK_ID_CHAMADO_ACOMPANHAMENTO',$id);
						
						
						
						
                        return $this->db->update ('CHAMADO_ACOMPANHAMENTO',$data);
                
                
        }

	
        
        
         function get_acompanhamento_like($id){
        
      
			$this->db->select('*');
                        $this->db->from('CHAMADO_ACOMPANHAMENTO');
                        $this->db->where('FK_ID_CHAMADO',$id );

			$this->db->order_by('PK_ID_CHAMADO_ACOMPANHAMENTO'); 

                
			return $this->db->get()->result();
		}
		
		
		function salvalog(){
			
			if($this->input->post('status')=='Fechado'){
				$id = $this->session->userdata('pk_id_usuario');	
				$data['FK_ID_CHAMADO'] = $this->input->post('PK_ID_CHAMADO');
				$data['ACOMPANHAMENTO'] = ('Chamado fechado');
				$data['DATA_HORA_CADASTRO_ACOMPANHAMENTO'] = date('Y-m-d H:i:s');
				$data['FK_ID_USUARIO'] = $id;
			
				return $this->db->insert('CHAMADO_ACOMPANHAMENTO',$data);
			
				$id=$this->input->post('PK_ID_CHAMADO_ACOMPANHAMENTO');
				$this-> db -> where('PK_ID_CHAMADO_ACOMPANHAMENTO',$id);
				return $this->db->update ('CHAMADO_ACOMPANHAMENTO',$data);
			}
				else{
						$id = $this->session->userdata('pk_id_usuario');	
						$data['FK_ID_CHAMADO'] = $this->input->post('PK_ID_CHAMADO');
						$data['ACOMPANHAMENTO'] = ('Chamado em andamento');
						$data['DATA_HORA_CADASTRO_ACOMPANHAMENTO'] = date('Y-m-d H:i:s');
						$data['FK_ID_USUARIO'] = $id;
							
						return $this->db->insert('CHAMADO_ACOMPANHAMENTO',$data);
						
						$id=$this->input->post('PK_ID_CHAMADO_ACOMPANHAMENTO');
						$this-> db -> where('PK_ID_CHAMADO_ACOMPANHAMENTO',$id);
						return $this->db->update ('CHAMADO_ACOMPANHAMENTO',$data);
			
					}
		
		}
		
				function salvalog2(){
						$id = $this->session->userdata('pk_id_usuario');	
						$data['FK_ID_CHAMADO'] = $this->input->post('PK_ID_CHAMADO');
						$data['ACOMPANHAMENTO'] = ('Chamado atualizado pelo usuario');
						$data['DATA_HORA_CADASTRO_ACOMPANHAMENTO'] = date('Y-m-d H:i:s');
						$data['FK_ID_USUARIO'] = $id;
							
						return $this->db->insert('CHAMADO_ACOMPANHAMENTO',$data);
						
						$id=$this->input->post('PK_ID_CHAMADO_ACOMPANHAMENTO');
						$this-> db -> where('PK_ID_CHAMADO_ACOMPANHAMENTO',$id);
						return $this->db->update ('CHAMADO_ACOMPANHAMENTO',$data);
			
		}
		
		
		
		
}
?>

