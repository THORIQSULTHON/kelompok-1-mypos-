<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_m extends CI_Model {

    public function login_users($post)
    {
        $this->db->select('*');
        $this->db->from('customer');
        $this->db->where('email_db', $post['username']);
        $this->db->where('password_db', $post['password']);
        $query = $this->db->get();
        return $query;
    }
    public function get($id = null)
    {
            $this->db->from('customer');
            if($id != null)
            {
                $this->db->where('customer_id', $id);
            }
            $query = $this->db->get();
            return $query;
    }
    public function add($post)
    {
        $params     =   [
        // name ini sesuai dengan di database, dan post[] sesuai dengan nama inputan di form customer
            'name'          =>   $post['customer_name'],
            'gender'        =>   $post['gender'],
            'email_db'      =>   $post['email'],
            'password_db'   =>   $post['pass'],
            'phone'         =>   $post['phone'],
            'address'       =>   $post['addr'],
        ];
        $this->db->insert('customer', $params);
    }    

    public function regis($post)
    {
        $params     =   [
        // name ini sesuai dengan di database, dan post[] sesuai dengan nama inputan di form customer
            'name'          =>   $post['customer_name'],
            'gender'        =>   $post['gender'],
            'email_db'      =>   $post['email'],
            'password_db'   =>   $post['pass'],
            'phone'         =>   $post['phone'],
            'address'       =>   $post['addr'],
        ];
        $this->db->insert('customer', $params);
    }    
    
    public function edit($post)
    {
        $params     =   [
        // name ini sesuai dengan di database, dan post[] sesuai dengan nama inputan di form customer
        'name'          =>   $post['customer_name'],
        'gender'        =>   $post['gender'],
        'phone'         =>   $post['phone'],
        'email_db'      =>   $post['email'],
        'password_db'   =>   $post['pass'],
        'address'       =>   $post['addr'],
        ];
        $this->db->where('customer_id', $post['id']);
        $this->db->update('customer', $params);
    }
    public function del($id)
    {
        $this->db->where('customer_id', $id);
        $this->db->delete('customer');
    }

}