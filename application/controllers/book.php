<?php
	class Book extends CI_Controller{
				public function __construct(){
						parent::__construct();
						$this->load->model('mbook/book_model');
						}
				public function index(){
						$data['book'] = $this->book_model->get();
						$data['title'] = 'book info';

						$this->load->view('templates/header', $data);
						$this->load->view('book/index', $data);
						$this->load->view('templates/footer');
						}

				public function view($slug){
						$data['book_item'] = $this->book_model->get($slug);

						if(empty($data['book_item'])){
								show_404();
								}

						$data['title'] = $data['book_item']['category'];

						$this->load->view('templates/header', $data);
						$this->load->view('book/view', $data);
						$this->load->view('templates/footer');
						}
			}
?>
