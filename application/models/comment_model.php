<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comment_model extends CI_Model
{
    public function get_all(){
        return $this -> db ->get('t_comment') -> result();
    }

    public function get_comment_by_blogId($blog_id){
        return $this->db->get_where('t_comment', array('blog_id' => $blog_id))->result();
    }

    public function save($blog_id, $comment){
        $this->db->insert('t_comment',
            array('blog_id' => $blog_id, 'comment' => $comment)
        );
        return $this->db->affected_rows();
    }

    public function delete($id){
        $this->db->delete('t_comment', array('comment_id' => $id));
        return $this->db->affected_rows();
    }


    public function delete_more_in($str){
        $this->db->query("delete from t_comment where comment_id in($str)");
        return $this->db->affected_rows();
    }




}
