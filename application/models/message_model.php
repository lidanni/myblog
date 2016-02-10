<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Message_model extends CI_Model {
    public function get_all(){
        return $this->db->get('t_message')->result();
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