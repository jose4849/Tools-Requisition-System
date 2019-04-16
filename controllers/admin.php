<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -  
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in 
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function index() {
        $data = array();
        $data['leftside'] = $this->load->view('template/asideleft', $data, true);
        $this->load->view('template/base', $data);
    }

    public function user() {
        $data = array();
        $all_user= $this->db->query("SELECT * FROM user INNER JOIN department ON user.dept_id=department.id");
        $data['result'] = $all_user->result();
       // $result = $all_user->result();
        //print_r($result);
        //die();
        $all = $this->db->get('department');
        $data['department'] = $all->result();
        $data['leftside'] = $this->load->view('template/asideleftstore', $data, true);
        $data['content'] = $this->load->view('template/user', $data, true);
        $this->load->view('template/base', $data);
    }

    public function save_user(){
        $data=$_POST;
        $this->db->insert('user', $data);
		return;
    }
    public function update_user(){
        $id=$_GET['id'];
        $email=$_GET['email'];
        if($email!=''){
        $sql="UPDATE user SET `email` = '$email' WHERE (`id` = $id) ";
        $this->db->query($sql);            
        }
        $newpass=$_GET['newpass'];
        $oldpass=$_GET['oldpass'];
        
        $sql="UPDATE user SET `password` = CASE WHEN `password` = '$oldpass' THEN '$newpass' ELSE `password` END WHERE (`id` = $id) ";
        $this->db->query($sql);
        echo "Your changes is effect in next login. Thank you.";
        
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */