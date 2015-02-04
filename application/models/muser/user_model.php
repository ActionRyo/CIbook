<?php
class User_model extends CI_Model{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();   
    }
    public function add_user( $name, $password, $tel, $addr, $cert)
    {
        $query = $this->db->get_where('t_user', array('name'=>$name));
        $data = $query->result_array();
        if( empty($data))
        {
            $this->db->insert('t_user', array('name'=>$name, 'pwd'=>$password, 'tel'=>$tel, 'addr'=>$addr, 'cert'=>$cert));
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
    public function get_user( $id=FALSE)
    {
        if( $id === FALSE)
        {
            $query = $this->db->get('t_user');
            return $query->result_array();
        }

        $query = $this->db->get_where('t_user', array('id'=>$id));
        return $query->result_array();
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
        $query_name = $this->db->get_where('t_user', array('id'=>$id));
        $old_name = $query_name->result_array();
        if( $name == $old_name[0]['name'])
        {
            $this->db->where('id', $id);
            $this->db->update('t_user', array('name'=>$name, 'tel'=>$tel, 'addr'=>$addr, 'cert'=>$cert));

            return array(
                    'code'=>0,
                    'msg'=>'',
                    'data'=>''
                    );
        }
        $query = $this->db->get_where('t_user', array('name'=>$name));
        $data = $query->result_array();
        if( empty($data) )
        {
            $this->db->where('id', $id);
            $this->db->update('t_user', array('name'=>$name, 'tel'=>$tel, 'addr'=>$addr, 'cert'=>$cert));
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
    public function login($name, $pwd)
    {
        $this->db->where('name', $name);
        $pwd = sha1($pwd);
        $this->db->where('pwd', $pwd);
        $query = $this->db->get('t_user');
        return $query->result_array();
    }
}
