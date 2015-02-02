<?php
	class Book_model extends CI_Model{

			public function __construct(){
				parent::__construct();
				$this->load->database();
			}

			public function get($slug = FALSE){
					if($slug === FALSE){
							$query = $this->db->get('t_book');
							return $query->result_array();
							}

					$query = $this->db->get_where('t_book', array('id'=>$slug));
					return $query->row_array();
					}
			}
?>	
