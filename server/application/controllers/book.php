<?php
class Book extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mbook/book_service', 'book_service');
        $this->load->model('muser/session_service', 'book_session_service');
    }
    private function session_check()
    {
        $data['json'] = $this->book_session_service->islogin();
        if( $data['json']['code'] != 0 )
        {
           $this->load->view('json_view', $data);
           return;
        }
    }
    public function index()
    {
        $this->session_check();
            
        $data['json'] = $this->book_service->get_all_book();
        $this->load->view('json_view', $data);
    }


    public function view($id)
    {
        $this->session_check();

        $data['json'] = $this->book_service->get_book($id);
        $this->load->view('json_view', $data);
    }
    public function add()
    {
        $this->session_check();

        $name = $this->input->post('name');
        $cate = $this->input->post('cate');
        $page = $this->input->post('page');
        $content = $this->input->post('content');

        if( ! is_numeric($page))
        {
            $data['json'] = array(
                'code'=>1,
                'msg'=>'page could not be character, it must be number.',
                'data'=>''
            );
            $this->load->view('json_view', $data);
            return;
        }
        $data['json'] = $this->book_service->add_book($name, $cate, $page, $content);
        $this->load->view('json_view', $data);
    }
    public function del($id)
    {
        $this->session_check();

        $data['json'] = $this->book_service->delete_book($id);
        $this->load->view('json_view', $data);
    }
    public function update($id)
    {
        $this->session_check();

        $name = $this->input->post('name');
        $cate = $this->input->post('cate');
        $page = $this->input->post('page');
        $content = $this->input->post('content');
        $data['json'] = $this->book_service->update_book($name, $cate, $page, $content, $id);
        $this->load->view('json_view', $data);
    }
}
/* End of file book.php */
/* Location: ./application/controllers/book.php */
