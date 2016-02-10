<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->model('admin/admin_model');
        $this->load->model('blog_model');
        $this->load->model('comment_model');
        $this->load->model('message_model');
    }

    //管理员登录
    public function login(){
        $this->load->view('admin/login');
    }
    public function check_login(){
        $admin_name = $this->input->post('admin_name');
        $admin_pwd = $this->input->post('admin_pwd');
        $row = $this->admin_model->get_by_name_pwd($admin_name, $admin_pwd);
        if($row){
//          开启一个session
            $this->session->set_userdata('admin',$row);

            $result = $this->blog_model->get_all();
            $data = array(
                'blogs' => $result
            );
            redirect('admin/show_blog', $data);
        }else{
            redirect('admin/login');
        }
    }
    //var_dump($data);
    //die();


    //文章管理
    public function show_blog(){
        $result = $this->blog_model->get_all();
        $data = array(
            'blogs' => $result
        );
        $this->load->view('admin/show_blog', $data);
    }
    public function delete_blog(){
        $blog_id = $this->input->get('blog_id');
        $rows = $this->blog_model->delete($blog_id);
        if($rows > 0){
            redirect('admin/show_blog');
        }
    }
    public function update_blog(){
        $blog_id = $this->input->get('blog_id');
        $row = $this->blog_model->get_by_id($blog_id);
        if($row){
            $data = array(
                'blog' => $row
            );
            $this->load->view('admin/update_blog', $data);
        }
    }
    public function confirm_update(){
        $blog_id = $this->input->post('blog_id');
        $title = $this->input->post('title');
        $content = $this->input->post('content');
        $img = $this->input->post('img');
        $author = $this->input->post('author');
        $add_time = $this->input->post('add_time');

        $rows = $this->blog_model->update($blog_id, $title, $content, $img, $author, $add_time);
        if($rows > 0){
            redirect('admin/show_blog');
        }
    }
    public function blog_content(){
        $blog_id = $this->input->get('blog_id');
        $row = $this->blog_model->get_by_id($blog_id);
        if($row){
            $data = array(
                'blog' => $row
            );
            $this->load->view('admin/blog_content', $data);
        }
    }
    public function delete_more(){
        $str = $this->input->get('str');
        $rows = $this->blog_model->delete_more_in($str);
        if($rows > 0){
            redirect('admin/show_blog');
        }
    }
    public function add_blog_page(){
        $this->load->view('admin/add_blog');
    }
    public function add_blog(){
        $title = $this->input->post('title');
        $content = $this->input->post('content');
        $img = $this->input->post('img');
        $author = $this->input->post('author');
        $add_time = $this->input->post('add_time');

        $rows = $this->blog_model->save($title,$content,$img,$author,$add_time);

        if($rows > 0){
            redirect('admin/show_blog');
        }
    }


    //评论管理
    public function show_comment(){
        $result = $this->comment_model->get_all();
        if($result){
            $data = array(
                'comments' => $result
            );
            $this->load->view('admin/show_comment', $data);
        }
    }
    public function delete_comment(){
        $id =  $this->input->get('id');
        $rows =  $this->comment_model->delete($id);
        if($rows > 0){
            redirect('admin/show_comment');
        }
    }
    public function delete_more_comment(){
        $str = $this->input->get('str');
        $rows = $this->comment_model->delete_more_in($str);
        if($rows > 0){
            redirect('admin/show_comment');
        }
    }


    //留言管理
    public function show_message(){
        $result = $this->message_model->get_all();
        if($result){
            $data = array(
                'messages' => $result
            );
            $this->load->view('admin/show_message', $data);
        }
    }
    public function delete_message(){
        $id =  $this->input->get('id');
        $rows = $this->message_model->delete($id);
        if($rows > 0){
            redirect('admin/show_message');
        }
    }
    public function delete_more_message(){
        $str = $this->input->get('str');
        $rows = $this->message_model->delete_more_in($str);
        if($rows > 0) {
            redirect('admin/show_message');
        }
    }


    //logout
    public function logout(){
//      关闭一个session
        $this->session->unset_userdata('admin');
        redirect('admin/login');
    }









}






