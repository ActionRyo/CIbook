<?php
class User_service extends CI_Model{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('muser/user_model', 'model');
    }
    public function get_all_user()
    {
        $data = $this->model->get_all_user();
        return $data;
    }
    public function get_user($id)
    {
        $data = $this->model->get_user($id);
        return $data;
    }
    public function add_user( $name, $password, $tel, $addr, $cert)
    {
        $data = $this->model->get_all_user();
        $tmp = $data['data'];
        foreach( $tmp as $key=>$value)
        {
            $old_name = $value['name'];
            if( $old_name == $name )
            {
                return array(
                        'code'=>1,
                        'msg'=>'user name could not be same with the other.',
                        'data'=>''
                        );
            }
        }
        $data = $this->model->add_user( $name, $password, $tel, $addr, $cert);
        return $data;
    }
    public function delete_user( $id )
    {
        $data = $this->model->delete_user($id);
        return $data;
    }
    public function update_user( $name, $tel, $addr, $cert, $id )
    {
        $data = $this->model->get_user($id);
        $tmp = $data['data'];
        $tmp2 = $tmp[0];
        $old_name = $tmp2['name'];
        if( $old_name == $name)
        {
            $data = $this->model->update_user($name, $tel, $addr, $cert, $id);
            return $data;
        }

        $data = $this->model->get_all_user();
        $tmp = $data['data'];
        foreach($tmp as $key=>$value )
        {
            $old_name = $value['name'];
            if( $old_name == $name)
            {
                return array(
                        'code'=>1,
                        'msg'=>'user name has been used, please choose the other one.',
                        'data'=>''
                        );
            }
        }
        $data = $this->model->update_user($name, $tel, $addr, $cert, $id);
        return $data;
    }
    public function login($name, $pwd)
    {
        $password = sha1($pwd);
        $data = $this->model->login($name, $password);
        return $data;
    }
}
