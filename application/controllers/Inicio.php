<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	public function verificar_sessao(){

		if ($this->session->userdata('logado')==false){
			redirect('index.php/logon/login');
		}
	}

	

	public function index($indice=null){
		$this->verificar_sessao();
		$id = $this->session->userdata('pk_id_usuario');
            $this->db->select('*');
			$this->db->from('USUARIO');
            $this->db->where('PK_ID_USUARIO',$id);
			$chamado['usuarios'] = $this->db->get()->result();
			$administrador ='0';
			
			//die($administrador);
			
			  if ($chamado ['usuarios'][0]->STATUS =="administrador"){
				  $administrador ='1';
				$this->load->model('chamado_model','chamado');
				//$this->db->join('ASSUNTO','FK_ID_ASSUNTO = PK_ID_ASSUNTO','inner');
				$chamado['chamado'] = $this->chamado->get_administrador_chamado_like();
				//echo '<pre>'; print_r($chamado['chamado']); die();
					
                $this->load->view('includes/administrador/administrador_menu');
		        $this->load->view('includes/usuario/html_header');
				$this->load->view('inicio',$chamado);
				$this->load->view('includes/usuario/html_footer');
		
	}else{
				
				$this->load->model('chamado_model','chamado');
				$chamado['chamado'] = $this->chamado->get_chamado_like();
           
            	$this->load->view('includes/usuario/menu');
                $this->load->view('includes/usuario/html_header');
				//$this->load->view('inicio',$chamado, $administrador);
				$this->load->view('includes/usuario/html_footer');
            
        }
        }
         
		
		public function indexaberto($indice=null){
			$this->verificar_sessao();
		$id = $this->session->userdata('pk_id_usuario');
            $this->db->select('*');
			$this->db->from('USUARIO');
            $this->db->where('PK_ID_USUARIO',$id);
			$chamado['usuarios'] = $this->db->get()->result();
			$administrador ='0';
			
			//die($administrador);
			
			  if ($chamado ['usuarios'][0]->STATUS =="administrador"){
				  $administrador ='1';
				$this->load->model('chamado_model','chamado');
				//$this->db->join('ASSUNTO','FK_ID_ASSUNTO = PK_ID_ASSUNTO','inner');
				$chamado['chamado'] = $this->chamado->get_administrador_chamado_like();
				//echo '<pre>'; print_r($chamado['chamado']); die();
						
	                $this->load->view('includes/administrador/administrador_menu');
			        $this->load->view('includes/usuario/html_header');
					$this->load->view('inicioaberto',$chamado, $administrador);
					$this->load->view('includes/usuario/html_footer');
			
		}else{
					
					$this->load->model('chamado_model','chamado');
					$chamado['chamado'] = $this->chamado->get_chamado_like();
	           
	            	$this->load->view('includes/usuario/menu');
	                $this->load->view('includes/usuario/html_header');
					$this->load->view('inicioaberto',$chamado, $administrador);
					$this->load->view('includes/usuario/html_footer');
	            
	        }
        }
		
		public function indexematendimento($indice=null){
		$this->verificar_sessao();
			$id = $this->session->userdata('pk_id_usuario');
            $this->db->select('*');
			$this->db->from('USUARIO');
            $this->db->where('PK_ID_USUARIO',$id);
			$chamado['usuarios'] = $this->db->get()->result();
			$administrador ='0';
			
			//die($administrador);
			
			  if ($chamado ['usuarios'][0]->STATUS =="administrador"){
				  $administrador ='1';
				$this->load->model('chamado_model','chamado');
				//$this->db->join('ASSUNTO','FK_ID_ASSUNTO = PK_ID_ASSUNTO','inner');
				$chamado['chamado'] = $this->chamado->get_administrador_chamado_like();
				//echo '<pre>'; print_r($chamado['chamado']); die();
					
                $this->load->view('includes/administrador/administrador_menu');
		        $this->load->view('includes/usuario/html_header');
				$this->load->view('inicioematendimento',$chamado, $administrador);
				$this->load->view('includes/usuario/html_footer');
		
	}else{
				
				$this->load->model('chamado_model','chamado');
				$chamado['chamado'] = $this->chamado->get_chamado_like();
           
            	$this->load->view('includes/usuario/menu');
                $this->load->view('includes/usuario/html_header');
				$this->load->view('inicioematendimento',$chamado, $administrador);
				$this->load->view('includes/usuario/html_footer');
            
        }
        }
         	 

			 
			 
			 
			 public function indexfechado($indice=null){
		$this->verificar_sessao();
		$id = $this->session->userdata('pk_id_usuario');
            $this->db->select('*');
			$this->db->from('USUARIO');
            $this->db->where('PK_ID_USUARIO',$id);
			$chamado['usuarios'] = $this->db->get()->result();
			$administrador ='0';
			
			//die($administrador);
			
			  if ($chamado ['usuarios'][0]->STATUS =="administrador"){
				  $administrador ='1';
				$this->load->model('chamado_model','chamado');
				//$this->db->join('ASSUNTO','FK_ID_ASSUNTO = PK_ID_ASSUNTO','inner');
				$chamado['chamado'] = $this->chamado->get_administrador_chamado_like();
				//echo '<pre>'; print_r($chamado['chamado']); die();
					
                $this->load->view('includes/administrador/administrador_menu');
		        $this->load->view('includes/usuario/html_header');
				$this->load->view('iniciofechado',$chamado, $administrador);
				$this->load->view('includes/usuario/html_footer');
		
	}else{
				
				$this->load->model('chamado_model','chamado');
				$chamado['chamado'] = $this->chamado->get_chamado_like();
           
            	$this->load->view('includes/usuario/menu');
                $this->load->view('includes/usuario/html_header');
				$this->load->view('iniciofechado',$chamado, $administrador);
				$this->load->view('includes/usuario/html_footer');
            
        }
        }
		
}
?>