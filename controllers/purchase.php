<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Purchase extends CI_Controller {

    /**
     * Index Page for this controller.
     */
    public function __construct() {
        parent:: __construct();
		$this->load->library('session');
        if (!$this->session->userdata('logged_in')) {
            $base = base_url();
            redirect($base, 'refresh');
            //echo "Not Log in.";
        } else {
			$userdata=$this->session->userdata('type');
			if($userdata==3){}
			else{ 
			$base = base_url();
            redirect($base, 'refresh');
			}			
            //echo 'Login';
        }

        $this->load->helper("url");
        $this->load->library("pagination");
    }

    public function index() {
        $data = array();
        
        $session = $this->session->userdata;
        $user_id = $session[0]->id;
        $all = $this->db->query("SELECT * FROM `user` where id = $user_id ");
        $data['userinfo'] = $all->result();

        $this->db->where('status', '0');
        $data['p_collection'] = $this->db->count_all_results('collection');

        $this->db->where('status', '0');
        $data['p_requisition'] = $this->db->count_all_results('requisition');

        $this->db->where('type', 'raw');
        $data['tp_product'] = $this->db->count_all_results('product');

        $this->db->where('type', 'tools');
        $data['tt_product'] = $this->db->count_all_results('product');


        $data['t_tools'] = $this->db->count_all_results('tools');
        $data['tools_action'] = $this->db->count_all_results('tools_action');        
         $data['leftmenu'] = "dashboard";
        $data['leftside'] = $this->load->view('purchase/asideleftpurchase', $data, true);
        $data['content'] = $this->load->view('purchase/content_purchase', $data, true);
        $this->load->view('template/base', $data);
    }

/*===========================user start=================================*/
    

    public function user() {
        $data = array();
        $all_user= $this->db->query("SELECT * FROM user INNER JOIN department ON user.dept_id=department.id");
        $data['result'] = $all_user->result();
       // $result = $all_user->result();
        //print_r($result);
        //die();
        $all = $this->db->get('department');
        $data['department'] = $all->result();
        $data['leftside'] = $this->load->view('purchase/asideleftpurchase', $data, true);
        $data['content'] = $this->load->view('template/user', $data, true);
        $this->load->view('template/base', $data);
    }

    public function save_user(){
        $data=$_POST;
        $this->db->insert('user', $data);
        redirect('/store/user/', 'refresh');
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
        
    }/*===========================user start=================================*/  
    
  public function profile(){
 $data = array();
$session = $this->session->userdata;
$user_id = $session[0]->id;
$all = $this->db->query("SELECT * FROM `user` where id = $user_id ");
$data['userinfo'] = $all->result();
$data['leftmenu'] = 'profile';
$data['leftside'] = $this->load->view('purchase/asideleftpurchase', $data, true);
$data['content'] = $this->load->view('store/content_store_profile', $data, true);
$this->load->view('template/base', $data);   
}
  
    
    public function department() {

        $data = array();
        $config = array();
        $all = $this->db->get('department');
        $alldata = $all->result();
        $config["base_url"] = base_url() . "store/department";
        $config["per_page"] = 3;
        $config["total_rows"] = count($alldata);
        $config["uri_segment"] = 3;
        /*
          $config['full_tag_open'] = '<ul>';
          $config['full_tag_close'] = '</ul>';
          $config['prev_tag_open'] = '<li>';
          $config['prev_tag_close'] = '</li>';
          $config['next_tag_open'] = '<li>';
          $config['next_tag_close'] = '</li>';
          $config['display_pages'] = FALSE;

         */
        $this->pagination->initialize($config);
        //echo $page = $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
        $this->db->limit($config["per_page"], $this->uri->segment(3));
        $query = $this->db->get('department');
        $data['result'] = $query->result();
        $data["links"] = $this->pagination->create_links();
        $data['leftside'] = $this->load->view('template/asideleftpurchase', $data, true);
        $data['content'] = $this->load->view('store/department', $data, true);
        $this->load->view('template/base', $data);
    }

    public function save_department() {
        $data = array();
        $data['department'] = $this->input->post('department');
        $data['description'] = $this->input->post('description');
        $this->db->insert('department', $data);
        $this->department();
    }

    public function category() {

        $data = array();
        $config = array();
        $all = $this->db->get('category');
        $alldata = $all->result();
        $config["base_url"] = base_url() . "store/category";
        $config["per_page"] = 3;
        $config["total_rows"] = count($alldata);
        $config["uri_segment"] = 3;
        /*
          $config['full_tag_open'] = '<ul>';
          $config['full_tag_close'] = '</ul>';
          $config['prev_tag_open'] = '<li>';
          $config['prev_tag_close'] = '</li>';
          $config['next_tag_open'] = '<li>';
          $config['next_tag_close'] = '</li>';
          $config['display_pages'] = FALSE;

         */
        $this->pagination->initialize($config);
        //echo $page = $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
        $this->db->limit($config["per_page"], $this->uri->segment(3));
        $query = $this->db->get('category');
        $data['result'] = $query->result();
        $data["links"] = $this->pagination->create_links();
        $data['leftside'] = $this->load->view('template/asideleftpurchase', $data, true);
        $data['content'] = $this->load->view('store/content', $data, true);
        $this->load->view('template/base', $data);
    }

    public function save_category() {
        $data = array();
        $data['category'] = $this->input->post('category');
        $data['description'] = $this->input->post('description');
        $this->db->insert('category', $data);
        $this->category();
    }

    public function add_product() {
        $session = $this->session->userdata;
        $user_id = $session[0]->id;
        $data = array();
        $all = $this->db->query("SELECT * FROM `product` WHERE `status`='New' and author = $user_id");
        $alldata = $all->result();
        $config["base_url"] = base_url() . "store/category";
        $config["per_page"] = 3;
        $config["total_rows"] = count($alldata);
        $config["uri_segment"] = 3;
        $this->pagination->initialize($config);
        //echo $page = $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
        $this->db->limit($config["per_page"], $this->uri->segment(3));
        $query = $this->db->query("SELECT * FROM `product` WHERE `status`='New' and author = $user_id");
        $data['result'] = $query->result();
        $data["links"] = $this->pagination->create_links();
        $category = $this->db->get('category');
        $data['category'] = $category->result();
        
        $data['leftmenu']="operations";
        $data['leftside'] = $this->load->view('purchase/asideleftpurchase', $data, true);
        $data['content'] = $this->load->view('purchase/product_entry', $data, true);
        $this->load->view('template/base', $data);
    }

    public function save_product() {
        $data = $_POST;
        $this->db->insert('product', $data);
        redirect('/purchase/add_product/', 'refresh');
    }

    public function collectionform() {
        $session = $this->session->userdata;
        $user_id = $session[0]->id;
         $data = array();       
        $all = $this->db->query("SELECT * FROM `collection` INNER JOIN user ON collection.user_id = user.id WHERE collection.status='0'");
        $alldata = $all->result();
        $this->load->library('pagination');
	$config["base_url"] = base_url() . "purchase/collectionform/";
	$config["total_rows"] = count($alldata);
        $per_page = $config["per_page"] = 20;
        $this->pagination->initialize($config);
        $start = $this->uri->segment(3);
        $offset = ($this->uri->segment(3) != '' ? $this->uri->segment(3) : 0);   
        $query = $this->db->query("SELECT *, collection.status as collection_status FROM `collection` INNER JOIN user ON collection.user_id = user.id WHERE collection.status='0' Limit $offset ,$per_page");
        $data['result'] = $query->result();
        $data["links"] = $this->pagination->create_links();
        $data['leftmenu'] = "collection";
        $data['leftside'] = $this->load->view('purchase/asideleftpurchase', $data, true);
        $data['content'] = $this->load->view('purchase/collectionform_purchase', $data, true);
        $this->load->view('template/base', $data);
    }
    public function collection() {
        $data['product_id'] = json_encode($_POST['id']);
        $data['product_name'] = json_encode($_POST['product_name']);
        $data['quantity'] = json_encode($_POST['quantity']);
        $data['price'] = json_encode($_POST['price']);
        $data['memo'] = json_encode($_POST['memo']);
        $data['mobile'] = json_encode($_POST['mobile']);
        $data['purchase_date'] = json_encode($_POST['purchase_date']);
        $data['note'] = $_POST['note'];
        $session = $this->session->userdata;
        $data['user_id'] = $session[0]->id;
        $this->db->insert('collection', $data);
        $status['collection_ids'] =  $this->db->insert_id();
        $this->db->insert('collectionstatus', $status);
        redirect('/purchase/collectionform/', 'refresh');
    }
    
        public function collection_update() {
        $id= $_GET['id'];
        $data['quantity'] = json_encode($_POST['quantity']);
        $data['price'] = json_encode($_POST['price']);
        $data['memo'] = json_encode($_POST['memo']);
        $data['mobile'] = json_encode($_POST['mobile']);
        $data['purchase_date'] = json_encode($_POST['purchase_date']);
        $this->db->where('collection_id',$id);
        $this->db->update('collection', $data); 
        redirect("/purchase/collectionview/?id=$id", 'refresh');
    }
    public function collectionview() {
        $data = array();
        $id = $_GET['id'];
        $session = $this->session->userdata;
        $data['level'] = $session[0]->level;
        $all = $this->db->query("SELECT * FROM `collection` INNER JOIN user ON collection.user_id = user.id JOIN collectionstatus ON collectionstatus.collection_ids=collection.collection_id  WHERE collection_id=$id");
        $data['result'] = $all->result();
        $data['leftmenu']="collection";
        $data['leftside'] = $this->load->view('purchase/asideleftpurchase', $data, true);
        $data['content'] = $this->load->view('purchase/collectionview_purchase', $data, true);
        $this->load->view('template/base', $data);
    }
  
 public function requisitionform() {
        $session = $this->session->userdata;
        $user_id = $session[0]->id;
        $data = array();
        $all = $this->db->query("SELECT * FROM `requisition` INNER JOIN user ON requisition.user_id = user.id WHERE requisition.status='0'");
        $alldata = $all->result();
        $config["base_url"] = base_url() . "purchase/collectionform";
        $config["per_page"] = 1000;
        $config["total_rows"] = count($alldata);
        $config["uri_segment"] = 3;
        $this->pagination->initialize($config);
        //echo $page = $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
        $this->db->limit($config["per_page"], $this->uri->segment(3));
        $query = $this->db->query("SELECT * FROM `requisition` INNER JOIN user ON requisition.user_id = user.id WHERE requisition.status='0'");
        $data['result'] = $query->result();
        $numberofrequisition = $data['result'];
        $data['numberofrequisition'] = count($numberofrequisition);
        $data["links"] = $this->pagination->create_links();
        $data['leftmenu'] = "requisition";
        $data['leftside'] = $this->load->view('purchase/asideleftpurchase', $data, true);
        $data['content'] = $this->load->view('store/requisitionform_store', $data, true);
        $this->load->view('template/base', $data);
    }

    public function inventory() {
        $data = array();
         $all = $this->db->query("SELECT * FROM `product` where status = 'Exist'  ");
         $res = $all->result();       
        $this->load->library('pagination');
        $config["base_url"] = base_url() . "purchase/inventory/";
        $config["total_rows"] = count($res);

        $per_page = $config["per_page"] = 20;
        $this->pagination->initialize($config);
        $start = $this->uri->segment(3);
        $offset = ($this->uri->segment(3) != '' ? $this->uri->segment(3) : 0);        
        
        $all = $this->db->query("SELECT * FROM `product` where status = 'Exist' Limit $offset ,$per_page ");
        $data['result'] = $all->result();
        $data['leftmenu'] = "inventory";
        $data["links"] = $this->pagination->create_links();
        $data['leftside'] = $this->load->view('purchase/asideleftpurchase', $data, true);
        $data['content'] = $this->load->view('template/inventory', $data, true);
        $this->load->view('template/base', $data);
    }

    
 /* =============================Tools start============================ */

    public function tools_requisition_form() {
        $session = $this->session->userdata;
        $user_id = $session[0]->id;
        $data = array();
        $all = $this->db->query("SELECT * FROM `requisition` INNER JOIN user ON requisition.user_id = user.id WHERE requisition.status='0' AND requisition.user_id = $user_id ");
        $alldata = $all->result();
        $config["base_url"] = base_url() . "store/tools_requisition_form";
        $config["per_page"] = 3;
        $config["total_rows"] = count($alldata);
        $config["uri_segment"] = 3;
        $this->pagination->initialize($config);
        //echo $page = $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
        $this->db->limit($config["per_page"], $this->uri->segment(3));
        $query = $this->db->query("SELECT * FROM `requisition` INNER JOIN user ON requisition.user_id = user.id WHERE requisition.status='0' AND requisition.user_id = $user_id ");
        $data['result'] = $query->result();
        $data["links"] = $this->pagination->create_links();
        $data['leftmenu'] = "tools";
        $data['leftside'] = $this->load->view('purchase/asideleftpurchase', $data, true);
        $data['content'] = $this->load->view('store/tools_requisitionform_store', $data, true);
        $this->load->view('template/base', $data);
    }    


    public function tools_by_user() {
        if (isset($_GET['user_id'])) {
            $id = $_GET['user_id'];

            $this->db->count_all_results('tools_action');

            $this->load->library('pagination');
            $config["base_url"] = base_url() . "purchase/tools_by_user/";
            $config["total_rows"] = $this->db->count_all_results('tools_action');

            $per_page = $config["per_page"] = 25;
            $this->pagination->initialize($config);
            $start = $this->uri->segment(3);
            $offset = ($this->uri->segment(3) != '' ? $this->uri->segment(3) : 0);
            $sql = "select * from `tools_action` INNER JOIN user ON tools_action.user_id = user.id Limit $offset ,$per_page";





            $resultSet = $this->db->query($sql);
            $data["links"] = $this->pagination->create_links();
            $data['store'] = 'store';
            $data['result'] = $resultSet->result();
            $data['leftmenu'] = "tools";
            $data['leftside'] = $this->load->view('purchase/asideleftpurchase', $data, true);
            $data['content'] = $this->load->view('store/tools_requisition_view_store', $data, true);
            $this->load->view('template/base', $data);
        } else {
            $this->load->library('pagination');
            $config["base_url"] = base_url() . "purchase/tools_by_user/";
            $config["total_rows"] = $this->db->count_all_results('tools_action');

            $per_page = $config["per_page"] = 25;
            $this->pagination->initialize($config);
            $start = $this->uri->segment(3);
            $offset = ($this->uri->segment(3) != '' ? $this->uri->segment(3) : 0);
            $sql = "select * from `tools_action` INNER JOIN user ON tools_action.user_id = user.id Limit $offset ,$per_page";
            $resultSet = $this->db->query($sql);
            $data["links"] = $this->pagination->create_links();
            $data['store'] = 'store';
            $data['result'] = $resultSet->result();
            $data['leftmenu'] = "tools";
            $data['leftside'] = $this->load->view('purchase/asideleftpurchase', $data, true);
            $data['content'] = $this->load->view('store/tools_requisition_view_store', $data, true);
            $this->load->view('template/base', $data);
        }
    }
    
    public function tools_inventory() {
        $data = array();
        $this->db->count_all_results('tools');

        $this->load->library('pagination');
        $config["base_url"] = base_url() . "purchase/tools_inventory/";
        $config["total_rows"] = $this->db->count_all_results('tools');

        $per_page = $config["per_page"] = 25;
        $this->pagination->initialize($config);
        $start = $this->uri->segment(3);
        $offset = ($this->uri->segment(3) != '' ? $this->uri->segment(3) : 0);




        $all = $this->db->query("SELECT * FROM `tools` Limit $offset ,$per_page");
        $data['result'] = $all->result();
        $data["links"] = $this->pagination->create_links();
        $data['leftmenu'] = "tools";
        $data['leftside'] = $this->load->view('purchase/asideleftpurchase', $data, true);
        $data['content'] = $this->load->view('template/tools_inventory', $data, true);
        $this->load->view('template/base', $data);
    }
    
    
    public function demondstatus_ad(){
        $data['ass_director']=$_GET['ass_director'];
        $this->db->where('collection_ids', $_GET['collection_id']);
        $this->db->update('collectionstatus', $data); 
        echo "Apply successfully. Thank You.";
    }
    public function demondstatus_d(){
        $data['director']=$_GET['director'];
        $this->db->where('collection_ids', $_GET['collection_id']);
        $this->db->update('collectionstatus', $data); 
        echo "Apply successfully. Thank You.";
    }
    public function demondstatus_p(){
        $data['purchase']=$_GET['purchase'];
       
        $this->db->where('collection_ids', $_GET['collection_id']);
        $this->db->update('collectionstatus', $data); 
        echo "Apply successfully. Thank You.";
    }     
    
    
    
    public function product_search() {
        $q = $_GET['q'];
        $sql = "select * from `product` where `product_name` like '%$q%'  LIMIT 5";
        $resultSet = $this->db->query($sql);
        $result = $resultSet->result();
        foreach ($result as $product) {
            $answer[] = array("id" => $product->id, "text" => $product->product_name);
        }
        echo json_encode($answer);
    }

    public function product_select() {
        $id = $_GET['id'];
        $sql = "select * from `product` where `id` = $id";
        $resultSet = $this->db->query($sql);
        $result = $resultSet->result();
        foreach ($result as $product) {
            echo '<tr id="' . $product->id . '_row">
                <td>' . $product->id . '<input type="hidden" value="' . $product->id . '" name="id[]" value="0" /></td>
                <td>' . $product->product_name . '<input type="hidden" value="' . $product->product_name . '" name="product_name[]" value="' . $product->product_name . '" /></td>
                <td><input type="text" size="11" name="quantity[]" value="0" /></td>
                <td><input type="text" size="11" name="price[]" value="0" readonly="readonly" />(' . $product->price . ')</td>
                <td><input type="text" name="memo[]" value="0" readonly="readonly" /></td>
                <td><input type="text" name="mobile[]" value="0" readonly="readonly" /></td>
                <td><input type="text" name="purchase_date[]" value="0" readonly="readonly" /></td>
                <td>' . $product->date . '</td>
                <td><input type="button" onclick="delete_pro(' . $product->id . ')" class="del" value="Delete" /></td></tr>';
        }
        //print_r($result);
    }



    public function new_collection() {
        $all = $this->db->query("SELECT * FROM `collection` WHERE `status`='0'");
        $alldata = $all->result();
        print_r($alldata);
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */