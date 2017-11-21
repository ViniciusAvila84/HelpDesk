<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Assunto extends CI_Controller {
	
	
            

	public function verificar_sessao(){

		if ($this->session->userdata('logado')==false){
			redirect('index.php/logon/login');
		}
	}

	public function criar_assunto(){
		$this->verificar_sessao();
               
               // $dados['usuarios'] = $this->db->get ('USUARIO') ->result();
                $this->load->view('includes/administrador/administrador_assunto_inserir');
                $this->load->view('includes/usuario/html_header');
               // $this->load->view('includes/usuario/menu');
                $this->load->view('includes/administrador/administrador_menu');
                $this->load->view('includes/usuario/html_footer');
       }
       
       public function insert(){
		$this->load->model('assunto_model', 'assunto');	
		if ($this->assunto->insert()){
			redirect('index.php/assunto/pesquisar_assunto');
		}else{
			redirect('index.php/assunto/pesquisar_assunto');
		}
	}
        
      
        
        public function pesquisar_assunto()	{
            $this->load->model('assunto_model','assunto');
            $assunto['assunto'] = $this->assunto->get_assunto_like();
            $this->load->view('includes/administrador/administrador_assunto_listar',$assunto);
                
                $this->load->view('includes/usuario/html_header');
                //$this->load->view('includes/usuario/menu');
                $this->load->view('includes/administrador/administrador_menu');
                $this->load->view('includes/usuario/html_footer');
        }
                
        public function mostrar_assunto()	{
            $this->load->model('assunto_model','assunto');
            $assunto['assunto'] = $this->assunto->get_assunto_like();
            $this->load->view('inicio',$assunto);
                
                $this->load->view('includes/usuario/html_header');
               // $this->load->view('includes/usuario/menu');
                $this->load->view('includes/usuario/administrador_menu');
                $this->load->view('includes/usuario/html_footer');
        }
         
           

	public function excluir_assunto($id){
		$this->load->model('assunto_model', 'assunto');	
		if ($this->assunto->excluir($id)){
			redirect('index.php/assunto/pesquisar_assunto');
                }else{
                        redirect('index.php/assunto/pesquisar_assunto');
                     }
	}	
        
        
      
        
}
?>