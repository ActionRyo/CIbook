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
        return $query->result_array();
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
        $query = $this->db->get_where('t_book', array('name'=>$name));
        $data = $query->result_array();
        if( empty($data))
        {
            $this->db->insert('t_book', array('name'=>$name, 'category'=>$cate, 'page'=>$page, 'content'=>$content));
            return array(
                    'code'=>0,
                    'msg'=>'',
                    'data'=>''
                    );
        }
        return array(
                'code'=>1,
                'msg'=>'name could not be same.',
                'data'=>''
                );
    }
    public function update_book($name, $cate, $page, $content, $id)
    {
        $query_name = $this->db->get_where('t_book', array('id'=>$id));
        $old_name = $query_name->result_array();
        if( $name == $old_name[0]['name'])
        {
            $this->db->where('id', $id);
            $this->db->update('t_book', array('name'=>$name, 'category'=>$cate, 'page'=>$page, 'content'=>$content));
            return array(
                'code'=>0,
                'msg'=>'',
                'data'=>''
            );
        }
        $query = $this->db->get_where('t_book', array('name'=>$name));
        $data = $query->result_array();
        if( empty($data))
        {
            $this->db->where('id', $id);
            $this->db->update('t_book', array('name'=>$name, 'category'=>$cate, 'page'=>$page, 'content'=>$content));
            return array(
                    'code'=>0,
                    'msg'=>'',
                    'data'=>''
                    );
        }
        return array(
                'code'=>1,
                'msg'=>'name could not be same',
                'data'=>''
                );
    }
}
/* End of file book_model.php */
/* Location: ./application/models/mbook/book_model.php */	
