<?php
    class User extends CI_Controller{
        public function __construct()
        {
            parent::__construct();
            $this->load->model('muser/user_model', 'model');
        }
        public function view($id=FALSE)
        {
            if( $id === FALSE)
            {
                $data['json'] = $this->model->get_user();
                if( empty($data['json']))
                {
                    show_404();
                    return;
                }
                $this->load->view('json_view', $data);
                return;
            }
            $data['json'] = $this->model->get_user($id);
            if( empty($data['json']))
            {
                show_404();
                return;
            }
            $this->load->view('json_view', $data);
        }
        public function add()
        {
            $name = $this->input->post('name');
            $tel = $this->input->post('tel');
            $addr = $this->input->post('addr');
            $cert = $this->input->post('cert');
            $data['json'] = $this->model->add_user($name, $tel, $addr, $cert);
            $this->load->view('json_view', $data);
        }
        public function del( $id = FALSE)
        {
            if( $id === FALSE )
            {
                show_404();
                return;
            }

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
       /* public function login()
        {
            $name = $this->input->post('name');
            $pwd = $this->input->post('pwd');
            
            $data['json'] = $this->model->login($name, $pwd);
            $this->load->view('json_view', $data);
        }
        public function logout()
        {
            $data['json'] = $this->model->logout();
            $this->load->view('json_view', $data); 
        }*/
    } 
