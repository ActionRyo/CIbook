<?php
class User_service extends CI_Model{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('muser/user_model', 'user_model');
    }
    public function get_all_user()
    {
        $data = $this->user_model->get_all_user();
        return $data;
    }
    public function get_user($id)
    {
        $data = $this->user_model->get_user($id);
        return $data;
    }
    public function add_user( $name, $password, $tel, $addr, $cert)
    {
        $data = $this->user_model->get_by_name($name);
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
        $data = $this->user_model->add_user( $name, $password, $tel, $addr, $cert);
        return $data;
    }
    public function delete_user( $id )
    {
        $data = $this->user_model->delete_user($id);
        return $data;
    }
    public function update_user( $name, $tel, $addr, $cert, $id )
    {
        $data = $this->user_model->get_user($id);
        $tmp = $data['data'];
        $tmp2 = $tmp[0];
        $old_name = $tmp2['name'];
        if( $old_name == $name)
        {
            $data = $this->user_model->update_user($name, $tel, $addr, $cert, $id);
            return $data;
        }

        $data = $this->user_model->get_by_name($name);
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
        $data = $this->user_model->update_user($name, $tel, $addr, $cert, $id);
        return $data;
    }
}
