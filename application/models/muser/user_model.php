<?php
    class User_model extends CI_Model{
            public function __construct()
            {
                parent::__construct();
                $this->load->database();   
            }
            public function add_user( $name, $password, $tel, $addr, $cert)
            {
                $query = $this->db->insert('t_user', array('name'=>$name, 'password'=>$password, 'tel'=>$tel, 'addr'=>$addr, 'cert'=>$cert));
                return $query->result_array();
            }
            public function get_user( $id=FALSE)
            {
                if( $id === FALSE)
                {
                    $query = $this->db->get('t_user');
                    return $query->result_array();
                }

                $query = $this->db->get_where('t_user', array('id'=>$id));
                return $query->row_array();
            }
            public function delete_user( $id=FALSE )
            {
                if( $id === FALSE )
                {
                    $query = $this->db->delete('t_user');
                    return $query->result_array();
                }

                $query = $this->db->delete('t_user', array('id'=>$id));
                return $query->result_array();
            }
            public function update_user( $name, $tel, $addr, $cert, $id )
            {
                $this->db->where('id', $id);
                $query = $this->db->update('t_user', array('name'=>$name, 'tel'=>$tel, 'addr'=>$addr, 'cert'=>$cert));
                return $query->result_array();
            }
            public function login($name, $pwd)
            {
                $this->db->where('name', $name);
                $pwd = sha1($pwd);
                $this->db->where('pwd', $pwd);
                $query = $this->db->get('t_user');
                /*var_dump($query->row_array());
                echo "<br>";
                var_dump($query->result_array());
                echo "<br>";
                var_dump($query->row());
                echo "<br>";
                return;*/
                return $query->result_array();
            }
    }
