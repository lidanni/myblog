<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('blog_model');
		$this->load->model('comment_model');
		$this->load->model('message_model');
	}


	//index页面
	public function index(){
		$this->load->view('index');
	}
	//index页面,显示所有文章
	public function get_blogs(){
		$page = $this->input->get('page');//ajax传参数
		$offset = ($page-1) * 6;
		$blogs = $this->blog_model->get_by_page($offset);
		$totalCount = $this->blog_model->get_total_count();
		if($blogs && $totalCount){
			$res = array(
					'data' => $blogs,
					'isEnd' => ceil($totalCount/6) == $page ? true : false
			);
			echo json_encode($res);
		}
	}


	//blog页面,显示"文章"及"评论"
	public function blog(){			//非ajax方式传参,普通方式
		$blog_id = $this->input->get('blog_id');
		$blog = $this->blog_model->get_by_id($blog_id);
		$comments = $this->comment_model->get_comment_by_blogId($blog_id);
		$data = array(
				'comments' => $comments,
				'blog' => $blog
		);
		$this->load->view('blog', $data);
	}

	//blog页面,添加评论
	public function comment(){
		$blog_id =$this->input->get('blog_id');
		$comment = $this->input->get('comment');
		if($blog_id == '' || $comment == ''){
			echo 'fail';
		}else{
			$this->comment_model->save($blog_id, $comment);
			echo 'success';
		}
	}


	//contact页面
	public function contact(){
		$this->load->view('contact');//页面刷新
	}
	//contact页面,保存留言信息
	public function message(){
		$username = $this->input->post('username');
		$email = $this->input->post('email');
		$content = $this->input->post('content');
		if($username == '' || $email == '' || $content == ''){
			echo 'fail';
		}else{
			$this->message_model->save($username, $email, $content);
			echo 'success';
		}
	}



}

