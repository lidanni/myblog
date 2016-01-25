<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog_model extends CI_Model {

    public function get_all(){
        return $this -> db ->get('t_blog') -> result();
    }


    public function get_by_id($blog_id){
        $this->db->select('*');
        $this->db->from('t_blog blog');
        $this->db->join('t_admin admin','blog.author=admin.admin_id');
        $this->db->where('blog.blog_id', $blog_id);
        return $this->db->get()->row();
    }


    public function delete($blog_id){
        $this->db->delete('t_blog', array('blog_id' => $blog_id));
        return $this->db->affected_rows();
    }

    
    public function update($blog_id, $title, $content, $img, $author, $add_time){
        $data = array(
            'title' => $title,
            'content' => $content,
            'img' => $img,
            'author' => $author,
            'add_time' => $add_time
        );
        $this->db->where('blog_id', $blog_id);
        $this->db->update('t_blog', $data);
        return $this->db->affected_rows();
    }


    public function get_by_page($page){
        $this->db->select('*');
        $this->db->from('t_blog blog');//blog是别名
        $this->db->join('t_admin admin', 'blog.author=admin.admin_id');//admin别名 关联条件
        $this->db->order_by('blog.blog_id','asc');
        $this->db->limit(6, $page);
        return $this->db->get()->result();
    }


    public function get_total_count(){
        return $this -> db -> count_all('t_blog');
    }

    public function delete_more_in($str){
        $this->db->query("delete from t_blog where blog_id in($str)");
//        双引号中的变量可以直接写
//        单引号中的变量要用.拼
        return $this->db->affected_rows();
    }

    public function save($title,$content,$img,$author,$add_time){
        $this->db->insert('t_blog',array(
            'title' => $title,
            'content' => $content,
            'img' => $img,
            'author' =>$author,
            'add_time' => $add_time
        ));
        return $this->db->affected_rows();
    }







}
