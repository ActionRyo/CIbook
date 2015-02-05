<?php
class Book_service extends CI_Model{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mbook/book_model', 'book_model');
    }

    public function get_all_book()
    {
        $data = $this->book_model->get_all_book();
        if( $data['code'] != 0 )
        {
            return array(
                    'code'=>1,
                    'msg'=>'get all book error.',
                    'data'=>''
                    );
        }
        return $data;
    }

    public function get_book($id)
    {
        $data = $this->book_model->get_book($id);
        if( $data['code'] != 0)
        {
            return array(
                    'code'=>1,
                    'msg'=>'get book error.',
                    'data'=>''
                    );
        }
        return $data;
    }

    public function delete_book($id)
    {
        $data = $this->book_model->delete_book($id);
        return $data;
    }

    public function add_book( $name, $cate, $page, $content)
    {
        $data = $this->book_model->get_by_name($name);
        $tmp = $data['data'];
        foreach($tmp as $key=>$value)
        {
            $old_name = $value['name'];
            if( $old_name == $name)
            {
                return array(
                        'code'=>1,
                        'msg'=>'the name could not be same with the others.',
                        'data'=>''
                        );
            }
        }
        $data = $this->book_model->add_book($name, $cate, $page, $content);
        return $data;
    }

    public function update_book( $name, $cate, $page, $content, $id)
    {
        $data = $this->book_model->get_book($id);
        $tmp = $data['data'];
        $tmp2 = $tmp[0];
        $old_name = $tmp2['name'];
        if( $old_name == $name)
        {
            $data = $this->book_model->update_book( $name, $cate, $page, $content, $id);
            return $data;
        }
        $data = $this->book_model->get_by_name($name);
        $tmp = $data['data'];
        foreach( $tmp as $key=>$value)
        {
            $old_name = $value['name'];
            if($old_name == $name)
            {
                return array(
                        'code'=>1,
                        'msg'=>'book name could not be same with the others.',
                        'data'=>''
                        );
            }
        }
        $data = $this->book_model->update_book( $name, $cate, $page, $content, $id);
        return $data;
    }
}

