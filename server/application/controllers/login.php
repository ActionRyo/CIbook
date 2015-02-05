<?php
class Login extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('muser/session_service', 'session_service');
    }
    public function islogin()
    {
        $data['json'] = $this->session_service->islogin();
        $this->load->view('json_view', $data);
    }
    public function checkin()
    {
        $name = $this->input->post('name');
        $pwd = $this->input->post('pwd');

        $data['json'] = $this->session_service->checkin($name, $pwd);
        $this->load->view('json_view', $data);
    }
    public function checkout()
    {
        $data['json'] = $this->session_service->checkout();
        $this->load->view('json_view', $data); 
    }
}
