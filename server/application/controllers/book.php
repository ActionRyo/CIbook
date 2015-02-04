<?php
class Book extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mbook/book_service', 'model');
    }
    public function index()
    {
        $data['json'] = $this->model->get_all_book();
        $this->load->view('json_view', $data);
    }


    public function view($id)
    {
        $data['json'] = $this->model->get_book($id);
        if( $data['json']['code'] != 0 )
        {
            show_404();
            return;
        }
        $this->load->view('json_view', $data);
    }
    public function add()
    {
        $name = $this->input->post('name');
        $cate = $this->input->post('cate');
        $page = $this->input->post('page');
        $content = $this->input->post('content');

        $data['json'] = $this->model->add_book($name, $cate, $page, $content);
        $this->load->view('json_view', $data);
    }
    public function del($id)
    {
        $data['json'] = $this->model->delete_book($id);
        $this->load->view('json_view', $data);
    }
    public function update($id)
    {
        $name = $this->input->post('name');
        $cate = $this->input->post('cate');
        $page = $this->input->post('page');
        $content = $this->input->post('content');
        $data['json'] = $this->model->update_book($name, $cate, $page, $content, $id);
        $this->load->view('json_view', $data);
    }
}
/* End of file book.php */
/* Location: ./application/controllers/book.php */
