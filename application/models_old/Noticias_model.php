<?php

class Noticias_model extends CI_Model
	{
		
		function __construct()
		{
			parent:: __construct();

		}

		public function insert(){
  
		
			$data['TITULO'] = $this->input->post('titulo');
			$data['NOTICIAS'] = $this->input->post('noticias');
			$data['DATA_HORA_CADASTRO_NOTICIA'] = date('Y-m-d H:i:s');

			
			return $this->db->insert('NOTICIAS',$data);
                     
		}
                
            
                
                public function excluir($id){
			$this->db->where('PK_ID_NOTICIAS',$id);
			if ($this->db->delete('NOTICIAS')){
				return true;
			}else{
				return false;
			}
		}
                
                
            function get_noticias_like(){
                   
			$termo = $this->input->post('pesquisar');
			$this->db->select('*');
			$this->db->from('NOTICIAS');
			$this->db->like('NOTICIAS',$termo);
			$this->db->order_by('NOTICIAS'); 
			return $this->db->get()->result();
			}	
                
             
	}
?>

