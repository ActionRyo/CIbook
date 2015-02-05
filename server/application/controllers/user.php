<?php
class User extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('muser/user_service', 'user_service');
        $this->load->model('muser/login_service', 'login_service');
    }
    public function index()
    {
        $data['json'] = $this->login_service->islogin();
        if( $data['json']['code'] != 0 )
        {
            $this->load->view('json_view', $data);
            return;
        }

        $data['json'] = $this->user_service->get_all_user();
        $this->load->view('json_view', $data);
    }

    public function view($id)
    {
        $data['json'] = $this->login_service->islogin();
        if( $data['json']['code'] != 0 )
        {
            $this->load->view('json_view', $data);
            return;
        }
        $data['json'] = $this->user_service->get_user($id);
        $this->load->view('json_view', $data);
    }
    public function add()
    {
        $data['json'] = $this->login_service->islogin();
        if( $data['json']['code'] != 0 )
        {
            $this->load->view('json_view', $data);
            return;
        }

        $name = $this->input->post('name');
        $pwd = sha1('123');
        $tel = $this->input->post('tel');
        $addr = $this->input->post('addr');
        $cert = $this->input->post('cert');
        $data['json'] = $this->user_service->add_user($name, $pwd,  $tel, $addr, $cert);
        $this->load->view('json_view', $data);
    }
    public function del( $id )
    {
        $data['json'] = $this->login_service->islogin();
        if( $data['json']['code'] != 0 )
        {
            $this->load->view('json_view', $data);
            return;
        }

        $data['json'] = $this->user_service->delete_user($id);
        $this->load->view('json_view', $data);
    }
    public function update( $id )
    {
        $data['json'] = $this->login_service->islogin();
        if( $data['json']['code'] != 0 )
        {
            $this->load->view('json_view', $data);
            return;
        }

        $name = $this->input->post('name');
        $tel = $this->input->post('tel');
        $addr = $this->input->post('addr');
        $cert = $this->input->post('cert');

        $data['json'] = $this->user_service->update_user($name, $tel, $addr, $cert, $id);
        $this->load->view('json_view', $data);
    }
} 
