<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*

  add this code to controller construct

  public function __construct() {
  parent::__construct();
  if(!$this->session->userdata('logged_in')){
  //$base=base_url();
  //redirect($base, 'refresh');
  echo "Not Log in.";
  }
  else{
  echo 'Login';
  }
  }
  Login and logout url

  $base= base_url();
  echo "<a href='".$base."login/loginuser'>Login</a>";
  echo "<a href='<?php echo base_url(); ?>login/logout'>logout</a>";

 */

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
    }

    public function loginuser() {

        $email = $this->input->post('username');
        $password = $this->input->post('password');
        $usertype = $this->input->post('usertype');

        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $query = $this->db->get('user');
        $result = $query->result();
        //print_r($result[0]);


        if (isset($result[0])) {
            $usermail = $result[0]->email;
            $userpassword = $result[0]->password;
            $type = $result[0]->type;
            // die();
            if ($email == $usermail && $userpassword == $password && $usertype==$type) {
                $result['logged_in'] = TRUE;
				$result['type'] = $type;
                $this->session->set_userdata($result);
                $url = base_url();
                if ($usertype == 0) {
                    redirect($url, 'refresh');
                }
                if ($usertype == 1) {
                    redirect('/officer', 'refresh');
                }
                if ($usertype == 2) {
                    redirect('/store', 'refresh');
                }
                if ($usertype == 3) {
                    redirect('/purchase', 'refresh');
                }
                if ($usertype == 4) {
                    redirect('/store', 'refresh');
                }
                if ($usertype == 5) {
                    redirect('/director', 'refresh');
                }
            } else {
                $url = base_url();
                redirect($url, 'refresh');
            }
        } else {
            redirect('/', 'refresh');
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        if ($this->session->userdata('logged_in') == FALSE) {
            $base = base_url();
            redirect($base, 'refresh');
        }
    }

}