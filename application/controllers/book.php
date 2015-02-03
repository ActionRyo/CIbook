<?php
	class Book extends CI_Controller{
				public function __construct()
				{
						parent::__construct();
						$this->load->model('mbook/book_model', 'model');
				}
				public function index()
				{
						$data['json'] = $this->model->get_book();
						$this->load->view('json_view', $data);
				}


				public function view($id = FALSE)
				{
						if( $id === FALSE)
						{
							$data['json'] = $this->model->get_book();
							if( empty($data['json']))
							{
								show_404();		
                                return;
							}

							$this->load->view('json_view', $data);
                            return;
						}
						$data['json'] = $this->model->get_book($id);

						if( empty($data['json']) )
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

						$this->model->add_book($name, $cate, $page, $content);

						$data['json'] = $this->model->get_book();
						if(empty($data['json']))
						{
							show_404();		
                            return;
						}
						$this->load->view('json_view', $data);
				}
				public function del($id)
				{
						$this->model->delete_book($id);
					    $this->model->get_book();
						$this->load->view('json_view');
				}
				public function update($id)
				{
						$name = $this->input->post('name');
						$cate = $this->input->post('cate');
						$page = $this->input->post('page');
						$content = $this->input->post('content');
						$this->model->update_book($name, $cate, $page, $content, $id);
						$data['json'] = $this->model->get_book();
						if( empty($data['json']))
						{
							show_404();		
                            return;
						}
						$this->load->view('json_view', $data);
				}
		}
/* End of file book.php */
/* Location: ./application/controllers/book.php */
