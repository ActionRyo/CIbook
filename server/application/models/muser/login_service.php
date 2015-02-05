<?php
class Login_service extends CI_Model{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('muser/user_model', 'user_model');
        $this->load->library('session');
    }
    public function checkin($name, $pwd)
    {
        $password = sha1($pwd);
        $data = $this->user_model->get_by_name_and_pwd($name, $password);
        if( count($data['data']) == 0)
        {
            return array(
                'code'=>1,
                'msg'=>'account name or pwd error.',
                'data'=>''
            );
        }
        $this->session->set_userdata('user_name', $name);
        return $data;
    }
    public function checkout()
    {
        $this->session->set_userdata('user_name', "");
        $this->session->sess_destroy();
        return array(
            'code'=>0,
            'msg'=>'',
            'data'=>''
        );
    }
    public function islogin()
    {
        if($user_name = $this->session->userdata('user_name'))
        {
            return array(
                'code'=>0,
                'msg'=>'',
                'data'=>''
            );
        }
        return array(
            'code'=>1,
            'msg'=>'You havent login, please login.',
            'data'=>''
        );
    }
}
