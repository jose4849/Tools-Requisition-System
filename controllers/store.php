<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Store extends CI_Controller {

    /**
     * Index Page for this controller.
     */
    public function __construct() {
        parent:: __construct();
		$this->load->library('session');
        if (!$this->session->userdata('logged_in')) {
            $base = base_url();
           // redirect($base, 'refresh');
            //echo "Not Log in.";
        } else {
			$userdata=$this->session->userdata('type');
			if($userdata==2){}
			else{ 
			$base = base_url();
            //redirect($base, 'refresh');
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
        $data['leftside'] = $this->load->view('store/asideleftstore', $data, true);
        $data['content'] = $this->load->view('template/content', $data, true);
        $this->load->view('template/base', $data);
    }

    public function clear() {
        $sql = "update `product` set `quantity` = '0' ,`price` = '0';";
        $this->db->query($sql);
        echo "It's Done do fun!";
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
        $data['leftside'] = $this->load->view('store/asideleftstore', $data, true);
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
        
    }
/*===========================user start=================================*/  
/*==============================profile====================================*/
public function profile(){
 $data = array();
$session = $this->session->userdata;
$user_id = $session[0]->id;
$all = $this->db->query("SELECT * FROM `user` where id = $user_id ");
$data['userinfo'] = $all->result();
$data['leftmenu'] = 'profile';
$data['leftside'] = $this->load->view('store/asideleftstore', $data, true);
$data['content'] = $this->load->view('store/content_store_profile', $data, true);
$this->load->view('template/base', $data);   
}

/*==============================profile====================================*/
  
    
    
    
    
    
    
    
    
    
    
    
    
    
    public function department() {

        $data = array();
        $config = array();
        $all = $this->db->get('department');
        $alldata = $all->result();
        $config["base_url"] = base_url() . "store/department";
        $config["per_page"] = 30;
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
        $data['leftside'] = $this->load->view('store/asideleftStore', $data, true);
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

    public function department_update() {
        $id = $this->input->post('id');
        $data['department'] = $this->input->post('department');
        $data['description'] = $this->input->post('description');
        $this->db->where('id', $id);
        $this->db->update('department', $data);
        echo "Department is update successfully";
    }

    public function department_delete() {
        $id = $this->input->post('id');
        $query = $this->db->query("SELECT * FROM USER WHERE dept_id = $id");
        $result = $query->result();
        //print_r($result);
        $count = count($result);
        if ($count > 0) {  // id found stop
            echo "You cannot Delete this Department becouse Officer is available to this Department.";
        } else {
            $this->db->delete('department', array('id' => $id));
            echo "Your department is successfully Deleted";
        }
    }

    public function category() {

        $data = array();
        $config = array();
        $all = $this->db->get('category');
        $alldata = $all->result();
        $config["base_url"] = base_url() . "store/category";
        $config["per_page"] = 20;
        $config["total_rows"] = count($alldata);
        $config["uri_segment"] = 3;
        $this->pagination->initialize($config);
        //echo $page = $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
        $this->db->limit($config["per_page"], $this->uri->segment(3));
        $query = $this->db->get('category');
        $data['result'] = $query->result();
        $data["links"] = $this->pagination->create_links();
        $data['leftside'] = $this->load->view('store/asideleftstore', $data, true);
        $data['content'] = $this->load->view('store/content', $data, true);
        $this->load->view('template/base', $data);
    }

    public function save_category() {
        $data = array();
        // print_r($_POST);
        //die();
        $data['category'] = $this->input->post('category');
        $data['description'] = $this->input->post('description');
        $this->db->insert('category', $data);
        redirect('/store/category/', 'refresh');
    }

    public function category_update() {
        $id = $this->input->post('id');
        $data['category'] = $this->input->post('category');
        $data['description'] = $this->input->post('description');
        $this->db->where('id', $id);
        $this->db->update('category', $data);
        echo "Category is update successfully";
    }

    public function category_delete() {
        $id = $this->input->post('id');
        $query = $this->db->query("SELECT * FROM product WHERE categoryid = $id");
        $result = $query->result();
        $count = count($result);
        if ($count > 0) {  // id found stop
            echo "You cannot Delete this Category becouse product is available to this Category.";
        } else {
            $this->db->delete('category', array('id' => $id));
            echo "Your category is successfully Deleted";
        }
    }

    public function add_product() {
        $data = array();
        $query = $this->db->query("SELECT * FROM `product` WHERE `status`='New'");
        $data['result'] = $query->result();
        $category = $this->db->get('category');
        $data['category'] = $category->result();
        $data['leftside'] = $this->load->view('store/asideleftstore', $data, true);
        $data['content'] = $this->load->view('store/product_entry', $data, true);
        $this->load->view('template/base', $data);
    }

    public function save_product() {
        $data = $_POST;
        $this->db->insert('product', $data);
        if ($_POST['type'] == 'tools') {
            $data2['product_id'] = $this->db->insert_id();
            $data2['product_name'] = $_POST['product_name'];
            $this->db->insert('tools', $data2);
        }
        redirect('/store/add_product/', 'refresh');
    }
    public function delete_new_product(){
    $id=$_POST['id'];    
    $sql = "SELECT product_id , GROUP_CONCAT(product_id SEPARATOR ', ') as product FROM collection WHERE collection.`status` = '0'";
    $query=$this->db->query($sql);
    $result=$query->result();
    $string = $result[0]->product;
    $vowels = array('[',']', '"');
    $onlyconsonants = str_replace($vowels, "", $string);
    $array = explode(',', $onlyconsonants);
    
    if (in_array($id, $array)) {
        echo "This product used in an Collection Form!";
    }
    else {
        $this->db->delete('product', array('id' => $id)); 
        echo "Delete Successfully.";
    }
    //print_r($result);
    }
    public function collectionform() {
        $data = array();       
        $all = $this->db->query("SELECT * FROM `collection` INNER JOIN user ON collection.user_id = user.id WHERE collection.status='0'");
        $alldata = $all->result();
        $this->load->library('pagination');
	$config["base_url"] = base_url() . "store/collectionform/";
	$config["total_rows"] = count($alldata);
        $per_page = $config["per_page"] = 20;
        $this->pagination->initialize($config);
        $start = $this->uri->segment(3);
        $offset = ($this->uri->segment(3) != '' ? $this->uri->segment(3) : 0);   
        $query = $this->db->query("SELECT * FROM `collection` INNER JOIN user ON collection.user_id = user.id WHERE collection.status='0' Limit $offset ,$per_page");
        $data['result'] = $query->result();
        $data["links"] = $this->pagination->create_links();
        $data['leftmenu'] = "collection";
        $data['leftside'] = $this->load->view('store/asideleftstore', $data, true);
        $data['content'] = $this->load->view('store/collectionform', $data, true);
        $this->load->view('template/base', $data);
    }

    public function collectionview() {
        $data = array();
        $id = $_GET['id'];
        $session = $this->session->userdata;
        $data['level'] = $session[0]->level;
        $all = $this->db->query("SELECT *, collection.status as collection_status FROM `collection` INNER JOIN user ON collection.user_id = user.id JOIN collectionstatus ON collectionstatus.collection_ids=collection.collection_id  WHERE collection_id=$id");
        $data['result'] = $all->result();
        $data['leftmenu'] = "collection";
        $data['leftside'] = $this->load->view('store/asideleftstore', $data, true);
        $data['content'] = $this->load->view('store/collectionview_store', $data, true);
        $this->load->view('template/base', $data);
    }

    public function demondstatus_s() {

        $id = $_GET['collection_id'];
        $data['store'] = $_GET['store'];
        $this->db->where('collection_ids', $id);
        $this->db->update('collectionstatus', $data);
        $status['status'] = 1;
        $this->db->where('collection_id', $_GET['collection_id']);
        $this->db->update('collection', $status);
        $all = $this->db->query("SELECT * FROM `collection` WHERE `status`='1' AND collection_id=$id");
        $alldata = $all->result();
        //  print_r($alldata);
        //die();
        $productid = json_decode($alldata[0]->product_id);
        $quantity = json_decode($alldata[0]->quantity);
        $price = json_decode($alldata[0]->price);
        //print_r($price);
        //die();
        $i = 0;
        foreach ($productid as $product_id) {
            echo $i . "p";
            $arrayx = array();
            $qu = "select * from product where id = $product_id";
            $old = $this->db->query($qu);
            $olddata = $old->result();
            $quantityx = $quantity[$i] + $olddata[0]->quantity;
            $pricex = $price[$i];
            $sql = "UPDATE product SET quantity = $quantityx ,status = 'Exist' , price = $pricex  WHERE id = $product_id";
            $this->db->query($sql);
            $sql = "UPDATE `tools` SET `current_quantity` = $quantityx WHERE `product_id` =$product_id";
            $this->db->query($sql);

            $data = array(
                'agent' => '',
                'description' => 'Product Update',
                'ref_type' => 'collection',
                'ref' => $id,
                'price_new' => $price[$i],
                'quantity' => $quantity[$i],
                'current_quantity' => $quantityx,
                'product_id' => $product_id
            );

            $this->db->insert('product_journal', $data);

            echo $i++;
        }
        echo "Apply successfully. Thank You.";
    }

    public function product_search() {
        $q = $_GET['q'];
        $sql = "SELECT * FROM `product` WHERE  `product`.`status` = 'Exist' AND `product_name` LIKE '%$q%'   LIMIT 5";
        $resultSet = $this->db->query($sql);
        $result = $resultSet->result();
        foreach ($result as $product) {
            $answer[] = array("id" => $product->id, "text" => $product->product_name);
        }
        echo json_encode($answer);
    }

    public function product_search_collection() {
        $q = $_GET['q'];
        $sql = "SELECT * FROM `product` WHERE `product_name` LIKE '%$q%'   LIMIT 5";
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
                <td><input type="text" size="11" name="price[]" value="0" />(' . $product->price . ')</td>
                <td><input type="text" name="memo[]" value="0" /></td>
                <td><input type="text" name="mobile[]" value="0" /></td>
                <td><input type="text" name="purchase_date[]" value="0" /></td>
                <td>' . $product->date . '</td>
                <td><input type="button" onclick="delete_pro(' . $product->id . ')" class="del" value="Delete" /></td></tr>';
        }
        //print_r($result);
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
        redirect('/store/collectionform/', 'refresh');
    }

    public function new_collection() {
        $all = $this->db->query("SELECT * FROM `collection` WHERE `status`='0'");
        $alldata = $all->result();
        print_r($alldata);
    }

    /* =============================Requisiton============================ */

    public function requisitionform() {
        $session = $this->session->userdata;
        $user_id = $session[0]->id;
        $data = array();
        $all = $this->db->query("SELECT * FROM `requisition` INNER JOIN user ON requisition.user_id = user.id WHERE requisition.status='0'");
        $alldata = $all->result();
        $config["base_url"] = base_url() . "store/requisitionform";
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
        $data['leftside'] = $this->load->view('store/asideleftstore', $data, true);
        $data['content'] = $this->load->view('store/requisitionform_store', $data, true);
        $this->load->view('template/base', $data);
    }

    public function product_select_requisition() {
        $id = $_GET['id'];
        $sql = "select * from `product` where `id` = $id";
        $resultSet = $this->db->query($sql);
        $result = $resultSet->result();
        foreach ($result as $product) {
            echo '<tr id="' . $product->id . '_row">
                <td>' . $product->id . '<input type="hidden" value="' . $product->id . '" name="id[]" value="0" /></td>
                <td>' . $product->product_name . '<input type="hidden" value="' . $product->product_name . '" name="product_name[]" value="' . $product->product_name . '" /></td>
                <td><input type="text" size="11" name="quantity[]" value="0" />(' . $product->quantity . ')</td>
                <td>' . $product->date . '</td>
                <td><input type="button" onclick="delete_pro(' . $product->id . ')" class="del" value="Delete" /></td></tr>';
        }
        //print_r($result);
    }

    public function requisition() {
        $data['product_id'] = json_encode($_POST['id']);
        $data['product_name'] = json_encode($_POST['product_name']);
        $data['quantity'] = json_encode($_POST['quantity']);
        $data['note'] = $_POST['note'];
        $session = $this->session->userdata;
        $data['user_id'] = $session[0]->id;
        $this->db->insert('requisition', $data);
        redirect('/store/requisitionform/', 'refresh');
    }

    public function requisitionview() {
        $data = array();
        $id = $_GET['id'];
        $all = $this->db->query("SELECT *,                                                                                 requisition.status as requisition_status FROM `requisition` INNER JOIN user ON requisition.user_id = user.id   WHERE requisition_id=$id");
        $data['result'] = $all->result();
        $data['leftmenu'] = "requisition";
        $data['leftside'] = $this->load->view('store/asideleftstore', $data, true);
        $data['content'] = $this->load->view('store/requisitionview_store', $data, true);
        $this->load->view('template/base', $data);
    }

    public function requisitiondelete() {
        $id = $_GET['id'];
        $this->db->delete('requisition', array('requisition_id' => $id));
        redirect('/store/requisitionform/', 'refresh');
    }

    public function requisitionstatus() {

        if ($_GET['store'] == "Accept") {
            
        }

        $id = $_GET['requisition_id'];
        $data['reciver'] = $_GET['reciver'];
        $data['code'] = $_GET['code'];
        $data['store'] = $_GET['store'];
        if ($data['reciver'] == "") {
            echo "Enter Reciver Name Please! ";
            die();
        }
        if ($data['code'] == "") {
            echo "Enter SECRET CODE Please! ";
            die();
        }
        $all = $this->db->query("SELECT * FROM `requisition` WHERE `status`='0' AND requisition_id=$id");
        $alldata = $all->result();
        $code = $alldata[0]->code;



        if ($code == $data['code'] && $data['store'] == "Done") {

            $status['status'] = 1;
            $status['store'] = "Done";
            $status['reciver'] = $data['reciver'];
            $this->db->where('requisition_id', $id);
            $this->db->update('requisition', $status);

            $productid = json_decode($alldata[0]->product_id);
            $quantity = json_decode($alldata[0]->quantity);
            $i = 0;
            foreach ($productid as $product_id) {
                $i . "p";
                $arrayx = array();
                $qu = "select * from product where id = $product_id";
                $old = $this->db->query($qu);
                $olddata = $old->result();
                $oq = $olddata[0]->quantity;
                $quantityx = $oq - $quantity[$i];
                $sql = "UPDATE product SET quantity = $quantityx  WHERE id = $product_id";
                $this->db->query($sql);
                
                $data = array(
                    'agent' => '',
                    'description' => 'Product Requisition',
                    'ref_type' => 'Requisition',
                    'ref' => $id,
                    'price_new' => '',
                    'quantity' => $quantity[$i],
                    'current_quantity' => $quantityx,
                    'product_id' => $product_id
                );
               // print_r($data);
                $this->db->insert('product_journal', $data);
                $i++;
            }
            echo "Apply successfully. Thank You.";
        } else {
            echo "Invalid SECRET CODE Try Again";
        }


        die();
    }

    public function inventory() {
        $data = array();
         $all = $this->db->query("SELECT * FROM `product` where status = 'Exist'  ");
         $res = $all->result();       
        $this->load->library('pagination');
        $config["base_url"] = base_url() . "store/inventory/";
        $config["total_rows"] = count($res);

        $per_page = $config["per_page"] = 25;
        $this->pagination->initialize($config);
        $start = $this->uri->segment(3);
        $offset = ($this->uri->segment(3) != '' ? $this->uri->segment(3) : 0);        
        
        $all = $this->db->query("SELECT * FROM `product` where status = 'Exist' Limit $offset ,$per_page ");
        $data['result'] = $all->result();
        $data['leftmenu'] = "inventory";
        $data["links"] = $this->pagination->create_links();
        $data['leftside'] = $this->load->view('store/asideleftstore', $data, true);
        $data['content'] = $this->load->view('template/inventory', $data, true);
        $this->load->view('template/base', $data);
    }

    public function tools_inventory() {
        $data = array();
        $this->db->count_all_results('tools');

        $this->load->library('pagination');
        $config["base_url"] = base_url() . "store/tools_inventory/";
        $config["total_rows"] = $this->db->count_all_results('tools');

        $per_page = $config["per_page"] = 25;
        $this->pagination->initialize($config);
        $start = $this->uri->segment(3);
        $offset = ($this->uri->segment(3) != '' ? $this->uri->segment(3) : 0);




        $all = $this->db->query("SELECT * FROM `tools` Limit $offset ,$per_page");
        $data['result'] = $all->result();
        $data["links"] = $this->pagination->create_links();
        $data['leftmenu'] = "tools";
        $data['leftside'] = $this->load->view('store/asideleftstore', $data, true);
        $data['content'] = $this->load->view('template/tools_inventory', $data, true);
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
        $data['leftside'] = $this->load->view('store/asideleftstore', $data, true);
        $data['content'] = $this->load->view('store/tools_requisitionform_store', $data, true);
        $this->load->view('template/base', $data);
    }

    public function tools_search() {
        $q = $_GET['q'];
        $sql = "select * from `tools` where `product_name` like '%$q%'  LIMIT 5";
        $resultSet = $this->db->query($sql);
        $result = $resultSet->result();
        foreach ($result as $product) {
            $answer[] = array("id" => $product->id, "text" => $product->product_name);
        }
        echo json_encode($answer);
    }

    public function tools_select_requisition() {
        $id = $_GET['id'];
        $sql = "select * from `tools` where `product_id` = $id";
        $resultSet = $this->db->query($sql);
        $result = $resultSet->result();
        foreach ($result as $product) {
            echo '<tr id="' . $product->product_id . '_row">
                <td>' . $product->id . '<input type="hidden" value="' . $product->product_id . '" name="id[]" value="0" /></td>
                <td>' . $product->product_name . '<input type="hidden" value="' . $product->product_name . '" name="product_name[]" value="' . $product->product_name . '" /></td>
                <td><input type="hidden" size="11" name="quantity[]" value="1" />1(' . $product->current_quantity . ')</td>
                <td></td>
                <td><input type="button" onclick="delete_pro(' . $product->id . ')" class="del" value="Delete" /></td></tr>';
        }
        //print_r($result);
    }

    public function tools_requisition() {
        $data = $_POST;
        $product_id = $data['id'];
        $product_name = $data['product_name'];
        //$quantity = $data['quantity'];
        $x = 0;
        foreach ($product_id as $id) {
            $each = array();
            $each['product_id'] = $id;
            $each['product_name'] = $product_name[$x];
            $each['quantity'] = 1;
            $session = $this->session->userdata;
            $each['user_id'] = $session[0]->id;
            $this->db->insert('tools_action', $each);
            $x++;
        }
        // print_r($data);
        //$this->db->insert('tools_action', $data);
        redirect('/store/tools_by_user/', 'refresh');
    }

    public function tools_by_user() {
        if (isset($_GET['user_id'])) {
            $id = $_GET['user_id'];

            $this->db->count_all_results('tools_action');

            $this->load->library('pagination');
            $config["base_url"] = base_url() . "store/tools_by_user/";
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
            $data['leftside'] = $this->load->view('store/asideleftstore', $data, true);
            $data['content'] = $this->load->view('store/tools_requisition_view_store', $data, true);
            $this->load->view('template/base', $data);
        } else {
            $this->load->library('pagination');
            $config["base_url"] = base_url() . "store/tools_by_user/";
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
            $data['leftside'] = $this->load->view('store/asideleftstore', $data, true);
            $data['content'] = $this->load->view('store/tools_requisition_view_store', $data, true);
            $this->load->view('template/base', $data);
        }
    }

    public function tools_received() {
        $tool_id = $_GET['tool_id'];
        $pid = $_GET['pid'];
        $sql = "DELETE FROM `tools_action` WHERE `tools_action`.`tool_action_id` = $tool_id";
        $this->db->query($sql);
        $sql = "UPDATE `tools` SET `current_quantity` = `current_quantity` + 1 WHERE `product_id` =$pid";
        $this->db->query($sql);
        redirect('/store/tools_by_user/', 'refresh');
    }

    public function tools_given() {
        $tool_id = $_GET['tool_id'];
        $pid = $_GET['pid'];
        //  $sql = "DELETE FROM `tools_action` WHERE `tools_action`.`tool_action_id` = $tool_id";
        //$this->db->query($sql);
        $sql = "UPDATE `tools` SET  `current_quantity` = `current_quantity` - 1 WHERE `product_id` =$pid";

        $this->db->query($sql);
        $is = '"Issued"';
        $sql2 = "UPDATE `tools_action` SET `status` = $is  WHERE `tool_action_id` = $tool_id";
        $this->db->query($sql2);
        redirect('/store/tools_by_user/', 'refresh');
    }

    /* =============================Tools end============================ */
    /* =============================History end============================ */

    public function requisitionhistory() {
        $session = $this->session->userdata;
        $user_id = $session[0]->id;
        $data = array();
        $data['leftmenu'] = "reports";
        $all = $this->db->query("SELECT * FROM `requisition` INNER JOIN user ON requisition.user_id = user.id WHERE requisition.status='1'");
        $alldata = $all->result();
        $this->load->library('pagination');
        $config["base_url"] = base_url() . "store/requisitionhistory";
        $config["total_rows"] = count($alldata);
        $per_page = $config["per_page"] = 5;
        $this->pagination->initialize($config);
        $start = $this->uri->segment(3);
        $offset = ($this->uri->segment(3) != '' ? $this->uri->segment(3) : 0);
        $query = $this->db->query("SELECT *, requisition.status as requisition_status FROM `requisition`   INNER JOIN user ON requisition.user_id = user.id WHERE requisition.status='1' Limit $offset ,$per_page");
        $data['result'] = $query->result();
        $numberofrequisition = $data['result'];
        $data['numberofrequisition'] = count($numberofrequisition);
        $data['pagi'] = $this->pagination->create_links();
        $data['leftside'] = $this->load->view('store/asideleftstore', $data, true);
        $data['content'] = $this->load->view('store/requisitionhistory', $data, true);
        $this->load->view('template/base', $data);
        ;
    }

    public function collectionhistory() {
        $data = array();
        $data['leftmenu'] = "reports";
        $all = $this->db->query("SELECT * FROM `collection` INNER JOIN user ON collection.user_id = user.id WHERE collection.status='1'");
        $alldata = $all->result();
        $this->load->library('pagination');
        $config["base_url"] = base_url() . "store/collectionhistory";
        $config["total_rows"] = count($alldata);
        $per_page = $config["per_page"] = 25;
        $this->pagination->initialize($config);
        $start = $this->uri->segment(3);
        $offset = ($this->uri->segment(3) != '' ? $this->uri->segment(3) : 0);
        $query = $this->db->query("SELECT * FROM `collection` INNER JOIN user ON collection.user_id = user.id WHERE collection.status='1'  Limit $offset ,$per_page");
        $data['result'] = $query->result();
        $data["links"] = $this->pagination->create_links();
        $data['leftside'] = $this->load->view('store/asideleftstore', $data, true);
        $data['content'] = $this->load->view('store/collectionlist', $data, true);
        $this->load->view('template/base', $data);
    }

    public function collectionviewsingle() {
        $data = array();
        $id = $_GET['id'];
        $session = $this->session->userdata;
        $data['level'] = $session[0]->level;
        $all = $this->db->query("SELECT * FROM `collection` INNER JOIN user ON collection.user_id = user.id JOIN collectionstatus ON collectionstatus.collection_ids=collection.collection_id  WHERE collection_id=$id");
        $data['result'] = $all->result();
        $data['leftside'] = $this->load->view('store/asideleftstore', $data, true);
        $data['content'] = $this->load->view('store/collectionview_store', $data, true);
        $this->load->view('template/base', $data);
    }

    /* =============================history end ============================ */
    /* ============================= print start ================================ */

    public function requisitionviewprint() {
        $data = array();
        $id = $_GET['id'];
        $all = $this->db->query("SELECT *, requisition.status as requisition_status FROM `requisition` INNER JOIN user ON requisition.user_id = user.id   WHERE requisition_id=$id");
        $data['result'] = $all->result();
        $data['header'] = $this->load->view('print/header', $data, true);
        $data['footer'] = $this->load->view('print/footer', $data, true);
        $this->load->view('print/requisitionprint_store', $data);
        //$this->load->view('template/base', $data);
    }

    public function collectionviewprint() {
        $data = array();
        $id = $_GET['id'];
        $all = $this->db->query("SELECT *, collection.status as collection_status FROM `collection` INNER JOIN user ON collection.user_id = user.id JOIN collectionstatus ON collectionstatus.collection_ids=collection.collection_id  WHERE collection_id=$id");
        $data['result'] = $all->result();
        $data['header'] = $this->load->view('print/header', $data, true);
        $data['footer'] = $this->load->view('print/footer', $data, true);
        $this->load->view('print/collectionprint_store', $data);
        //$this->load->view('template/base', $data);
    }

    public function singleproduct() {
        $id = $_GET['id'];
        $data = array();
        $all = $this->db->query("SELECT * from product where id = $id");
        $data['result'] = $all->result();
        $result = $this->db->query("SELECT * from product_journal where product_id = $id");
        $data['journal'] = $result->result();
        $data['header'] = $this->load->view('print/header', $data, true);
        $data['footer'] = $this->load->view('print/footer', $data, true);
        $this->load->view('print/singleproduct', $data);
    }

    public function tools_by_user_print() {
        $data = array();
        $sql = "select *, tools_action.status as tools_action_status from `tools_action`  INNER JOIN user ON tools_action.user_id = user.id ";
        $resultSet = $this->db->query($sql);
        $data['result'] = $resultSet->result();
        $data['header'] = $this->load->view('print/header', $data, true);
        $data['footer'] = $this->load->view('print/footer', $data, true);
        $this->load->view('print/tools_print', $data);
    }

    public function tools_inventory_print() {
        $data = array();
        $sql = "select * from tools";
        $resultSet = $this->db->query($sql);
        $data['result'] = $resultSet->result();
        $data['header'] = $this->load->view('print/header', $data, true);
        $data['footer'] = $this->load->view('print/footer', $data, true);
        $this->load->view('print/tools_inventory_print', $data);
    }

  public function inventory_print() {
        $data = array();
         $all = $this->db->query("SELECT * FROM `product` where status = 'Exist'  ");
         $res = $all->result();       
        $this->load->library('pagination');
        $config["base_url"] = base_url() . "store/inventory/";
        $config["total_rows"] = count($res);

        $per_page = $config["per_page"] = 25;
        $this->pagination->initialize($config);
        $start = $this->uri->segment(3);
        $offset = ($this->uri->segment(3) != '' ? $this->uri->segment(3) : 0);        
        
        $all = $this->db->query("SELECT * FROM `product` where status = 'Exist' Limit $offset ,$per_page ");
        $data['result'] = $all->result();
        $data['leftmenu'] = "inventory";
        $data["links"] = $this->pagination->create_links();
        $data['header'] = $this->load->view('print/header', $data, true);
        $data['footer'] = $this->load->view('print/footer', $data, true);
        $this->load->view('print/inventory_print', $data);
    }
    
    
    
    /* ============================= print end ================================ */
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */