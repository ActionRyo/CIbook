<?php
class User_model extends CI_Model{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();   
    }
    public function add_user( $name, $password, $tel, $addr, $cert)
    {
        $this->db->insert('t_user', array('name'=>$name, 'pwd'=>$password, 'tel'=>$tel, 'addr'=>$addr, 'cert'=>$cert));

        return array(
                'code'=>0,
                'msg'=>'',
                'data'=>''
                );
    }
    public function get_all_user()
    {
        $query = $this->db->get('t_user');
        $data = $query->result_array();
        return array(
                'code'=>0,
                'msg'=>'',
                'data'=>$data
                );
    }
    public function get_user( $id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('t_user');
        $data = $query->result_array();
        return array(
                'code'=>0,
                'msg'=>'',
                'data'=>$data
                );
    }
    public function delete_user( $id )
    {
        $this->db->delete('t_user', array('id'=>$id));
        return array(
                'code'=>0,
                'msg'=>'',
                'data'=>''
                );
    }
    public function update_user( $name, $tel, $addr, $cert, $id )
    {
        $this->db->where('id', $id);
        $this->db->update('t_user', array('name'=>$name, 'tel'=>$tel, 'addr'=>$addr, 'cert'=>$cert));
        return array(
                'code'=>0,
                'msg'=>'',
                'data'=>''
                );

    }
    public function get_by_name_and_pwd($name, $pwd)
    {
        $array = array('name'=>$name, 'pwd'=>$pwd);
        $this->db->where($array);
        $query = $this->db->get('t_user');
        $data = $query->result_array();
        return array(
            'code'=>0,
            'msg'=>'',
            'data'=>$data
        );
    }
    public function get_by_name($name)
    {
        $this->db->where('name', $name);
        $query = $this->db->get('t_user');
        $data = $query->result_array();
        return array(
            'code'=>0,
            'msg'=>'',
            'data'=>$data
        );        
    }
}
