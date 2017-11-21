<?php

class Assunto_model extends CI_Model
	{
		
		function __construct()
		{
			parent:: __construct();

		}

		public function insert(){
  
		
			$data['NOME_ASSUNTO'] = $this->input->post('nome_assunto');
	

			
			return $this->db->insert('ASSUNTO',$data);
                     
		}
                
            
                
                public function excluir($id){
			$this->db->where('PK_ID_ASSUNTO',$id);
			if ($this->db->delete('ASSUNTO')){
				return true;
			}else{
				return false;
			}
		}
                
                
            function get_assunto_like(){
                   
			$termo = $this->input->post('pesquisar');
			$this->db->select('*');
			$this->db->from('ASSUNTO');
			$this->db->like('NOME_ASSUNTO',$termo);
			$this->db->order_by('NOME_ASSUNTO'); 
			return $this->db->get()->result();
			}	
                
             
	}
?>

