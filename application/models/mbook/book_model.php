<?php
	class Book_model extends CI_Model{

			public function __construct()
			{
				parent::__construct();
				$this->load->database();
			}

			public function get_book($id = FALSE)
			{
					if( $id === FALSE )
					{
							$query = $this->db->get('t_book');//select all book
							return $query->result_array();
					}

					$query = $this->db->get_where('t_book', array('id'=>$id));//select one book
					return $query->row_array();
			}
			public function delete_book( $id)
			{
					$this->db->delete('t_book', array('id'=>$id));
			}
			public function add_book( $name, $cate, $page, $content)
			{
					$this->db->insert('t_book', array('name'=>$name,'category'=>$cate, 'page'=>$page, 'content'=>$content));
			}
			public function update_book($name, $cate, $page, $content, $id)
			{
					$this->db->where('id', $id);
					$this->db->update('t_book', array('name'=>$name, 'category'=>$cate, 'page'=>$page, 'content'=>$content));
			}
	}
/* End of file book_model.php */
/* Location: ./application/models/mbook/book_model.php */	
