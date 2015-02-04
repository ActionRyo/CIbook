<?php
    class User extends CI_Controller{
        public function __construct()
        {
            parent::__construct();
            $this->load->model('muser/user_service', 'model');
        }
        public function index()
        {
            $data['json'] = $this->model->get_all_user();
            $this->load->view('json_view', $data);
        }
        public function view($id)
        {
            $data['json'] = $this->model->get_user($id);
            $this->load->view('json_view', $data);
        }
        public function add()
        {
            $name = $this->input->post('name');
            $pwd = sha1('123');
            $tel = $this->input->post('tel');
            $addr = $this->input->post('addr');
            $cert = $this->input->post('cert');
            $data['json'] = $this->model->add_user($name, $pwd,  $tel, $addr, $cert);
            $this->load->view('json_view', $data);
        }
        public function del( $id )
        {
            $data['json'] = $this->model->delete_user($id);
            $this->load->view('json_view', $data);
        }
        public function update( $id )
        {
            $name = $this->input->post('name');
            $tel = $this->input->post('tel');
            $addr = $this->input->post('addr');
            $cert = $this->input->post('cert');

            $data['json'] = $this->model->update_user($name, $tel, $addr, $cert, $id);
            $this->load->view('json_view', $data);
        }
    } 
