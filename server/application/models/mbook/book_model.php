<?php
class Book_model extends CI_Model{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_all_book()
    {
        $query = $this->db->get('t_book');
        $data = $query->result_array();
        return array(
                'code'=>0,
                'msg'=>'',
                'data'=>$data
                );
    }
    public function get_book($id)
    {
        $query = $this->db->get('t_book');
        $data = $query->result_array();
        return array(
                'code'=>0,
                'msg'=>'',
                'data'=>$data
                );

    }
    public function delete_book( $id)
    {
        $this->db->delete('t_book', array('id'=>$id));
        return array(
                'code'=>0,
                'msg'=>'',
                'data'=>''
                );
    }
    public function add_book( $name, $cate, $page, $content)
    {
        $this->db->insert('t_book', array('name'=>$name, 'category'=>$cate, 'page'=>$page, 'content'=>$content));
        return array(
                'code'=>0,
                'msg'=>'',
                'data'=>''
                );
    }
    public function update_book($name, $cate, $page, $content, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('t_book', array('name'=>$name, 'category'=>$cate, 'page'=>$page, 'content'=>$content));
        return array(
                'code'=>0,
                'msg'=>'',
                'data'=>''
                );
    }
}
/* End of file book_model.php */
/* Location: ./application/models/mbook/book_model.php */	
