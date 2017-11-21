<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Noticias extends CI_Controller {
	
	
            

	public function verificar_sessao(){

		if ($this->session->userdata('logado')==false){
			redirect('index.php/logon/login');
		}
	}

	public function criar_noticias(){
		$this->verificar_sessao();
               
               // $dados['usuarios'] = $this->db->get ('USUARIO') ->result();
                $this->load->view('includes/administrador/administrador_noticias_inserir');
                $this->load->view('includes/usuario/html_header');
               // $this->load->view('includes/usuario/menu');
                $this->load->view('includes/administrador/administrador_menu');
                $this->load->view('includes/usuario/html_footer');
       }
       
       public function insert(){
		$this->load->model('noticias_model', 'noticias');	
		if ($this->noticias->insert()){
			redirect('index.php/noticias/pesquisar_noticias');
		}else{
			redirect('index.php/noticias/pesquisar_noticias');
		}
	}
        
      
        
        public function pesquisar_noticias()	{
            $this->load->model('Noticias_model','noticias');
            $noticias['noticias'] = $this->noticias->get_noticias_like();
            $this->load->view('includes/administrador/administrador_noticias_listar',$noticias);
                
                $this->load->view('includes/usuario/html_header');
                //$this->load->view('includes/usuario/menu');
                $this->load->view('includes/administrador/administrador_menu');
                $this->load->view('includes/usuario/html_footer');
        }
                
        public function mostrar_noticias()	{
            $this->load->model('Noticias_model','noticias');
            $noticias['noticias'] = $this->noticias->get_noticias_like();
            $this->load->view('inicio',$noticias);
                
                $this->load->view('includes/usuario/html_header');
               // $this->load->view('includes/usuario/menu');
                $this->load->view('includes/usuario/administrador_menu');
                $this->load->view('includes/usuario/html_footer');
        }
         
           

	public function excluir_noticias($id){
		$this->load->model('Noticias_model', 'noticias');	
		if ($this->noticias->excluir($id)){
			redirect('index.php/noticias/pesquisar_noticias');
                }else{
                        redirect('index.php/noticias/pesquisar_noticias');
                     }
	}	
        
        
      
        
}
?>