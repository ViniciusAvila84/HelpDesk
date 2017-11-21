<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logon extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index($indice=null){


	}


public function login(){
		$this->load->view('includes/usuario/html_header');
		//$this->load->view('includes/menu');
		$this->load->view('logon/login');
		$this->load->view('includes/usuario/html_footer');
		
	}

	public function logar(){
		$nome= $this->input->post('nome');
		$password= md5($this->input->post('senha'));
		$this->db->where('NOME',$nome);
		$this->db->where('SENHA',$password);
		
		$data['usuarios'] =$this->db->get('USUARIO')->result();

		if (count($data['usuarios'])==1){
			$dados['nome'] = $data['usuarios'][0]->NOME;
			$dados['pk_id_usuario'] = $data['usuarios'][0]->PK_ID_USUARIO;
			$dados['foto'] = $data['usuarios'][0]->FOTO;
                        
			$dados['logado']=true;
			$this->session->set_userdata($dados);
			redirect('');
		}else{
			redirect('index.php/logon/login');
		}

	}	

		
		public function logout(){
		$this->session->sess_destroy();
		redirect('index.php/logon/login');
		
	}

	}
?>