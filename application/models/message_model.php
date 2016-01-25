<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Message_model extends CI_Model {
    public function get_all(){
        return $this -> db ->get('t_message') -> result();
    }

    public function get_by_username($username){
        //get查所有数据
        //get_where根据条件查
        $data = array(
            'username' => $username
        );
        return $this->db->get_where('t_message', $data)->row();
    }

    public function save($username, $email, $content){
         $data = array(
             'username' => $username,
             'email' => $email,
             'content' => $content
         );
        $this->db->insert('t_message', $data);

    }

    public function delete($id){
        $this->db->delete('t_message', array('id' => $id));
    }


    public function delete_more_in($str){
        $this->db->query("delete from t_message where id in($str)");
    }



}