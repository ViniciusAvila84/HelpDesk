<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chamado extends CI_Controller {
	
	
            

	public function verificar_sessao(){
		if ($this->session->userdata('logado')==false){
			redirect('index.php/logon/login');
		}
	}

	public function criar_chamado(){
				$this->verificar_sessao();
                $dados['usuarios'] = $this->db->get ('USUARIO') ->result();
				$dados['assunto'] = $this->db->get ('ASSUNTO') ->result();
               
				$id = $this->session->userdata('pk_id_usuario');
				$this->db->select('*');
				$this->db->from('USUARIO');
				$this->db->where('PK_ID_USUARIO',$id);
				$data['verifica'] = $this->db->get()->result();
				
				
						

                if ($data ['verifica'][0]->STATUS =="administrador"){
			   
			    $this->load->view('includes/administrador/administrador_chamado_cadastro_inserir',$dados);	
                $this->load->view('includes/usuario/html_header');
                $this->load->view('includes/administrador/administrador_menu');
                $this->load->view('includes/usuario/html_footer');
			   
			   }else{
			   
			   
			   
			   $this->load->view('chamado/chamado_cadastro_inserir',$dados);	
                $this->load->view('includes/usuario/html_header');
                $this->load->view('includes/usuario/menu');
                $this->load->view('includes/usuario/html_footer');
	}}
       
    public function insert(){
		$this->load->model('chamado_model', 'chamado');	
		if ($this->chamado->insert()){
			
						//GRAVA AÇÃO NO CHAMADO
						$idsecao = $this->session->userdata('pk_id_usuario');
						$data2['DESCRICAO_HISTORICO'] = 'CHAMADO CRIADO';
						$data2['FK_ID_CHAMADO'] = $this->input->post('FK_ID_CHAMADO');
						$data2['DATA_HORA_CADASTRO_HISTORICO'] = date('Y-m-d H:i:s');
						$data2['FK_ID_USUARIO'] = $idsecao; 
						
						$this->db->insert('HISTORICO',$data2);
			
			redirect('index.php/inicio/indexaberto'); 
		}else{
			redirect('index.php/inicio/indexaberto'); 
		}
	}
        
        
    public function administrador_criar_chamado(){
				$this->verificar_sessao();
                $dados['usuarios'] = $this->db->get ('USUARIO') ->result();
				$dados['assunto'] = $this->db->get ('ASSUNTO') ->result();
               
				$id = $this->session->userdata('pk_id_usuario');
				$this->db->select('*');
				$this->db->from('USUARIO');
				$this->db->where('PK_ID_USUARIO',$id);
				$data['verifica'] = $this->db->get()->result();

                if ($data ['verifica'][0]->STATUS =="administrador"){
			   
			    $this->load->view('includes/administrador/administrador_chamado_cadastro_inserir',$dados);	
                $this->load->view('includes/usuario/html_header');
                $this->load->view('includes/administrador/administrador_menu');
                $this->load->view('includes/usuario/html_footer');
			   
			   }else{
			   
			   
			   
			   $this->load->view('chamado/chamado_cadastro_inserir',$dados);	
                $this->load->view('includes/usuario/html_header');
                $this->load->view('includes/usuario/menu');
                $this->load->view('includes/usuario/html_footer');
       }
	}
    
    public function administrador_insert(){
		$this->load->model('chamado_model', 'chamado');	
		if ($this->chamado->administrador_insert()){
			
			//GRAVA AÇÃO NO CHAMADO
						$idsecao = $this->session->userdata('pk_id_usuario');
						$data2['DESCRICAO_HISTORICO'] = 'CHAMADO CRIADO';
						$data2['FK_ID_CHAMADO'] = $this->input->post('FK_ID_CHAMADO');
						$data2['DATA_HORA_CADASTRO_HISTORICO'] = date('Y-m-d H:i:s');
						$data2['FK_ID_USUARIO'] = $idsecao; 
						
						$this->db->insert('HISTORICO',$data2);
						
						
			redirect('index.php/inicio/indexaberto'); 
		}else{
			redirect('index.php/inicio/indexaberto'); 
		}
	}
        
    public function pesquisar_chamado()	{
        $this->load->model('chamado_model','chamado');
        $chamado['chamado'] = $this->chamado->get_chamado_like();
				
				$id = $this->session->userdata('pk_id_usuario');
				$this->db->select('*');
				$this->db->from('USUARIO');
				$this->db->where('PK_ID_USUARIO',$id);
				$data['verifica'] = $this->db->get()->result();

                if ($data ['verifica'][0]->STATUS =="administrador"){
					$this->load->view('chamado/chamado_cadastro_listar', $chamado);    
            $this->load->view('includes/usuario/html_header');
            $this->load->view('includes/administrador/administrador_menu');
            $this->load->view('includes/usuario/html_footer');
					
					}else{
			$this->load->view('chamado/chamado_cadastro_listar', $chamado);    
            $this->load->view('includes/usuario/html_header');
            $this->load->view('includes/usuario/menu');
            $this->load->view('includes/usuario/html_footer');
	}}
                
        
         
        
    public function administrador_pesquisar_chamado()	{
        
				$id = $this->session->userdata('pk_id_usuario');
				$this->db->select('*');
				$this->db->from('USUARIO');
				$this->db->where('PK_ID_USUARIO',$id);
				$data['verifica'] = $this->db->get()->result();

                if ($data ['verifica'][0]->STATUS =="administrador"){
					$this->load->model('chamado_model','chamado');
		$this->db->join('ASSUNTO','FK_ID_ASSUNTO = PK_ID_ASSUNTO','inner');
			    $chamado['chamado'] = $this->chamado->get_administrador_chamado_like();
		
			$this->load->view('includes/usuario/html_header');
			$this->load->view('includes/administrador/administrador_chamado_listar', $chamado);    
            
            $this->load->view('includes/usuario/menu');
            $this->load->view('includes/administrador/administrador_menu');
            $this->load->view('includes/usuario/html_footer');
        }else{
			redirect('index.php/chamado/pesquisar_chamado'); 
	}}
            
        
       

	public function excluir($id){
		$this->load->model('chamado_model', 'chamado');	
		if ($this->chamado->excluir($id)){
			redirect('index.php/chamado/pesquisar_chamado'); 
        }else{
            redirect('index.php/chamado/pesquisar_chamado'); 
             }
		}	
        
        
    public function atualizar($id=null,$indice=null){
            $data['usuarios']= $this->db->get('USUARIO')->result(); 
            $this-> db -> where('PK_ID_CHAMADO',$id);
            $data ['chamado'] = $this->db->get ('CHAMADO')-> result();
			$data ['assunto'] = $this->db->get ('ASSUNTO')-> result();
			
			
			$id = $this->session->userdata('pk_id_usuario');
				$this->db->select('*');
				$this->db->from('USUARIO');
				$this->db->where('PK_ID_USUARIO',$id);
				$data['verifica'] = $this->db->get()->result();

                if ($data ['verifica'][0]->STATUS =="administrador"){
					$this->load->view('inicio/indexematendimento', $data);
                $this->load->view('includes/usuario/html_header');
                $this->load->view('includes/administrador/administrador_menu');
                $this->load->view('includes/usuario/html_footer');
					
					
				}else{
			
			
			
			
				$this->load->view('inicio/indexematendimento', $data);
                $this->load->view('includes/usuario/html_header');
                $this->load->view('includes/usuario/menu');
                $this->load->view('includes/usuario/html_footer');
	}}
        
        
    public function atualizar_salvar(){
        $this->load->model('chamado_model','chamado');
            if ($this->chamado->atualizar_salvar()){
				if ($this->chamado->salvalog2()){
            redirect('index.php/inicio/indexematendimento'); 
            }
        }
	}	
        
    public function administrador_atualizar($id=null,$indice=null){
        $data['usuarios']= $this->db->get('USUARIO')->result(); 
        $this-> db -> where('PK_ID_CHAMADO',$id);
        $data ['chamado'] = $this->db->get ('CHAMADO')-> result();
   
				$this->load->view('includes/administrador/administrador_chamado_atualizar', $data);
				$this->load->view('includes/usuario/html_header');
                $this->load->view('includes/usuario/menu');
                $this->load->view('includes/administrador/administrador_menu');
                $this->load->view('includes/usuario/html_footer');
        }
        
        
    public function administrador_atualizar_salvar(){
        $this->load->model('chamado_model','chamado');
        if ($this->chamado->administrador_atualizar_salvar()){
			redirect('index.php/inicio/indexematendimento'); 
            }
		}
	
        
     
	public function atribuirchamado($id){
	$idsecao = $this->session->userdata('pk_id_usuario');
				$this->db->select('*');
				$this->db->from('USUARIO');
				$this->db->where('PK_ID_USUARIO',$idsecao);
				$data2['verifica'] = $this->db->get()->result();
		if ($data2 ['verifica'][0]->STATUS =="administrador"){	
		
		$data = array(
        	'RESPONSAVEL_ID' => $idsecao
		);
		$data['CHAMADO_STATUS'] = 'Em_Atendimento';
		$this->db->where('PK_ID_CHAMADO', $id);
		$this->db->update('CHAMADO', $data);
		
						//GRAVA AÇÃO NO CHAMADO
						//$idsecao = $this->session->userdata('pk_id_usuario');
						$data3['DESCRICAO_HISTORICO'] = 'CHAMADO ATRIBUIDO';
						$data3['DATA_HORA_CADASTRO_HISTORICO'] = date('Y-m-d H:i:s');
						$data3['FK_ID_USUARIO'] = $idsecao; 
						$data3['FK_ID_CHAMADO'] = $id;
						$this->db->insert('HISTORICO',$data3);
						//INSERIR NA TABELA HISTORICO
						
						
		redirect('index.php/chamado/administrador_acompanhamento/'. $id); 
	}	else{
		redirect('index.php/inicio/indexematendimento'); 
	}
	}
	
	public function administrador_reabrir($id){
				$idsecao = $this->session->userdata('pk_id_usuario');
			
				
				
				$this->db->where('PK_ID_CHAMADO', $id);
				$data['CHAMADO_STATUS'] = 'Em_Atendimento';
				$this->db->update('CHAMADO', $data);
		
						//GRAVA AÇÃO NO CHAMADO
						//$idsecao = $this->session->userdata('pk_id_usuario');
						$data3['DESCRICAO_HISTORICO'] = 'CHAMADO REABERTO';
						$data3['DATA_HORA_CADASTRO_HISTORICO'] = date('Y-m-d H:i:s');
						$data3['FK_ID_USUARIO'] = $idsecao; 
						$data3['FK_ID_CHAMADO'] = $id;
						$this->db->insert('HISTORICO',$data3);
						//INSERIR NA TABELA HISTORICO
						
						
		redirect('index.php/chamado/administrador_acompanhamento/'. $id);  
	}	
	
	public function administrador_fechar($id){
				$idsecao = $this->session->userdata('pk_id_usuario');
			
				
				
				$this->db->where('PK_ID_CHAMADO', $id);
				$data['CHAMADO_STATUS'] = 'Fechado';
				$this->db->update('CHAMADO', $data);
		
						//GRAVA AÇÃO NO CHAMADO
						//$idsecao = $this->session->userdata('pk_id_usuario');
						$data3['DESCRICAO_HISTORICO'] = 'CHAMADO FECHADO';
						$data3['DATA_HORA_CADASTRO_HISTORICO'] = date('Y-m-d H:i:s');
						$data3['FK_ID_USUARIO'] = $idsecao; 
						$data3['FK_ID_CHAMADO'] = $id;
						$this->db->insert('HISTORICO',$data3);
						//INSERIR NA TABELA HISTORICO
						
						
		redirect('index.php/chamado/administrador_acompanhamento/'. $id);  
	}	
	
	
	
	
	
	
        
        
    public function acompanhamento($id=null,$indice=null){
        $data['usuarios']= $this->db->get('USUARIO')->result(); 
        $this-> db -> where('PK_ID_CHAMADO',$id);
        $data ['chamado'] = $this->db->get ('CHAMADO')-> result();
		
		$this->load->model('chamado_model','chamado');
        $this->db->join('USUARIO','FK_ID_USUARIO = PK_ID_USUARIO','inner');
        $data['historico'] = $this->chamado->get_acompanhamento_like($id);
		
		
		$id = $this->session->userdata('pk_id_usuario');
				$this->db->select('*');
				$this->db->from('USUARIO');
				$this->db->where('PK_ID_USUARIO',$id);
				$data['verifica'] = $this->db->get()->result();

                if ($data ['verifica'][0]->STATUS =="administrador"){
				 $this->load->view('chamado/chamado_cadastro_acompanhamento', $data );
				$this->load->view('includes/usuario/html_header');
                $this->load->view('includes/administrador/administrador_menu');
                $this->load->view('includes/usuario/html_footer');	
					
				}else{
			
	            $this->load->view('chamado/chamado_cadastro_acompanhamento', $data );
				$this->load->view('includes/usuario/html_header');
                $this->load->view('includes/usuario/menu');
                $this->load->view('includes/usuario/html_footer');
	}}
		
		
		 public function administrador_acompanhamento($id=null,$indice=null){
			
               
               $this-> db -> where('CHAMADO.PK_ID_CHAMADO',$id);

               $this->db->select('CHAMADO.*, USUARIO.NOME, USUARIO.RAMAL, RESPONSAVEL.NOME AS RESPONSAVEL');
               $this->db->join ('USUARIO','CHAMADO.FK_ID_USUARIO=USUARIO.PK_ID_USUARIO','inner');
               $this->db->join ('USUARIO AS RESPONSAVEL','CHAMADO.RESPONSAVEL_ID=RESPONSAVEL.PK_ID_USUARIO','left');

               $data ['chamado'] = $this->db->get ('CHAMADO')-> result();
			   $this->load->model('chamado_model','chamado');
			  
			  
			   
			   $this->db->join('USUARIO','FK_ID_USUARIO = PK_ID_USUARIO','inner');
			   $data['historico'] = $this->chamado->get_acompanhamento_like($id);
			   
			   $this-> db -> where('PK_ID_CHAMADO',$id);
			   $this->db->join('CHAMADO','FK_ID_USUARIO = PK_ID_USUARIO','inner');
			   $this-> db -> where('FK_ID_USUARIO = PK_ID_USUARIO');
			   $data['usuarios']= $this->db->get('USUARIO')->result(); 
			   $id=0;
			 //BUGGGG  
                $this->load->view('includes/usuario/html_header');
                $this->load->view('includes/usuario/menu');
                $this->load->view('includes/administrador/administrador_menu');
				$this->load->view('includes/administrador/administrador_chamado_acompanhamento', $data);
				$this->load->view('includes/usuario/html_footer');
        }
        
          public function acompanhamento_salvar(){
            $this->load->model('chamado_model', 'chamado');	
		if ($this->chamado->acompanhamento_salvar()){
			
						//GRAVA AÇÃO NO CHAMADO
						$idsecao = $this->session->userdata('pk_id_usuario');
						$data2['DESCRICAO_HISTORICO'] = 'INSERT DE ACOMPANHAMENTO';
						$data2['FK_ID_CHAMADO'] = $this->input->post('FK_ID_CHAMADO');
						$data2['DATA_HORA_CADASTRO_HISTORICO'] = date('Y-m-d H:i:s');
						$data2['FK_ID_USUARIO'] = $idsecao; 
						$this->db->insert('HISTORICO',$data2);
						//INSERIR NA TABELA HISTORICO
						$id = $idsecao;
				redirect('index.php/chamado/administrador_acompanhamento/'. $this->input->post('FK_ID_CHAMADO') ); 
					
			
				//redirect('index.php/chamado/administrador_acompanhamento',$chamado); 
				//$this->load->view('includes/usuario/html_header');
                //$this->load->view('includes/usuario/menu');
                //$this->load->view('includes/administrador/administrador_menu');
				//$this->load->view('includes/administrador/administrador_chamado_acompanhamento', $chamado);
				//$this->load->view('includes/usuario/html_footer'); 
		}else{
			//redirect('index.php/pesquisar_chamado'); 
			redirect('index.php/inicio/index'); 
		}
       
          }
          
          
           public function pesquisar_acompanhamento($id)	{
//               echo $id;               die();
            $this->load->model('chamado_model','chamado');
            $this->db->join('USUARIO','FK_ID_USUARIO = PK_ID_USUARIO','inner');
            $chamado['chamado'] = $this->chamado->get_acompanhamento_like($id);
//            $chamado['chamado'] = $this->db->where('FK_ID_CHAMADO',$chamado['chamado'][0]->PK_ID_CHAMADO);
           
				$this->load->view('chamado/chamado_cadastro_acompanhamento_listar', $chamado);    
                $this->load->view('includes/usuario/html_header');
                $this->load->view('includes/usuario/menu');
                $this->load->view('includes/usuario/html_footer');
        }
		
		
		public function historico($id)	{
			
				$this->db->select('*');
				$this->db->from('HISTORICO');
				$this->db->where('FK_ID_CHAMADO',$id);
				$this->db->join('USUARIO','FK_ID_USUARIO = PK_ID_USUARIO','inner');
				$chamado['chamado'] = $this->db->get()->result();
		
				$this->load->view('includes/administrador/administrador_historico_listar', $chamado);    
                $this->load->view('includes/usuario/html_header');
                $this->load->view('includes/usuario/menu');
                $this->load->view('includes/usuario/html_footer');
		}
				
		
		public function relatorio_chamado()	{
        $this->load->model('chamado_model','relatorio');
	
        $relatorio['relatorio'] = $this->chamado->get_relatorio_like();

			$this->load->view('chamado/chamado_cadastro_listar', $relatorio);    
            $this->load->view('includes/usuario/html_header');
            $this->load->view('includes/usuario/menu');
            $this->load->view('includes/usuario/html_footer');
        }
		
		
        
}
?>