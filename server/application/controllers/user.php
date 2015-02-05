<?php
    class User extends CI_Controller{
        public function __construct()
        {
            parent::__construct();
            $this->load->model('muser/user_service', 'user_service');
        }
        public function index()
        {
            $data['json'] = $this->user_service->get_all_user();
            $this->load->view('json_view', $data);
        }

        public function view($id)
        {
            $data['json'] = $this->user_service->get_user($id);
            if( $data['json']['code'] != 0)
            {
                show_404();
                return;
            }
            $this->load->view('json_view', $data);
        }
        public function add()
        {
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
            $data['json'] = $this->user_service->delete_user($id);
            $this->load->view('json_view', $data);
        }
        public function update( $id )
        {
            $name = $this->input->post('name');
            $tel = $this->input->post('tel');
            $addr = $this->input->post('addr');
            $cert = $this->input->post('cert');

            $data['json'] = $this->user_service->update_user($name, $tel, $addr, $cert, $id);
            $this->load->view('json_view', $data);
        }
    } 
