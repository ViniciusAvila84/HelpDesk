<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PainelAdministrador extends CI_Controller {

	public function painel_administrador(){
            $this->load->model('Noticias_model','noticias');
            $noticias['noticias'] = $this->noticias->get_noticias_like();
            
			
			
			$id = $this->session->userdata('pk_id_usuario');
            $this->db->select('*');
			$this->db->from('USUARIO');
            $this->db->where('PK_ID_USUARIO',$id);
			$data['usuarios'] = $this->db->get()->result();

                if ($data ['usuarios'][0]->STATUS =="administrador"){
					
					
                $this->load->view('includes/administrador/administrador_menu');
				//$this->load->view('includes/usuario/menu');
                $this->load->view('includes/usuario/html_header');
				$this->load->view('inicio',$noticias);
				$this->load->view('includes/usuario/html_footer');
		
	}else{
               
            	$this->load->view('includes/usuario/menu');
                $this->load->view('includes/usuario/html_header');
				$this->load->view('inicio',$noticias);
				$this->load->view('includes/usuario/html_footer');
            
        }
        }
        
}
?>