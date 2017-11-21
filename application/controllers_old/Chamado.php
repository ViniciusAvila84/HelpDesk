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
			if ($this->chamado->salvalog()){
            redirect('index.php/inicio/indexematendimento'); 
            }
		}
	}
        
     
	public function atribuirchamado(){
		$data['usuarios']= $this->db->get('USUARIO')->result(); 
        $this-> db -> where('PK_ID_CHAMADO',$id);
        $this->load->model('chamado_model','chamado',$id);
        if ($this->chamado->atribuirchamado()){
			if ($this->chamado->salvalog()){
            redirect('index.php/inicio/indexematendimento'); 
            }
		}
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
			
               
               $this-> db -> where('PK_ID_CHAMADO',$id);
               $data ['chamado'] = $this->db->get ('CHAMADO')-> result();
			   $this->load->model('chamado_model','chamado');
			  
			  
			   
			   $this->db->join('USUARIO','FK_ID_USUARIO = PK_ID_USUARIO','inner');
			   $data['historico'] = $this->chamado->get_acompanhamento_like($id);
			   
			   $this-> db -> where('PK_ID_CHAMADO',$id);
			   $this->db->join('CHAMADO','FK_ID_USUARIO = PK_ID_USUARIO','inner');
			   $this-> db -> where('FK_ID_USUARIO = PK_ID_USUARIO');
			   $data['usuarios']= $this->db->get('USUARIO')->result(); 
			   
			 //BUGGGG  
               
				$this->load->view('includes/administrador/administrador_chamado_acompanhamento', $data);
				$this->load->view('includes/usuario/html_header');
                $this->load->view('includes/usuario/menu');
                $this->load->view('includes/administrador/administrador_menu');
                $this->load->view('includes/usuario/html_footer');
        }
        
          public function acompanhamento_salvar(){
            $this->load->model('chamado_model', 'chamado');	
		if ($this->chamado->acompanhamento_salvar()){
			//redirect('index.php/chamado/pesquisar_chamado'); 
			redirect('index.php/inicio/index'); 
		}else{
			//redirect('index.php/chamado/pesquisar_chamado'); 
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