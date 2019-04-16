<?php

if (!defined('BASEPATH'))
exit('No direct script access allowed');

class Officer extends CI_Controller {

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
					if($userdata==1){}
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


$all = $this->db->query("SELECT * FROM `user` where id = $user_id ");
$data['userinfo'] = $all->result();
$data['leftmenu'] = 'dashboard';
$data['leftside'] = $this->load->view('officer/asideleftofficer', $data, true);
$data['content'] = $this->load->view('officer/content_officer', $data, true);
$this->load->view('template/base', $data);
}



public function add_product() {
$data = array();
$all = $this->db->query("SELECT * FROM `product` WHERE `status`='New'");
$alldata = $all->result();
$config["base_url"] = base_url() . "store/category";
$config["per_page"] = 100;
$config["total_rows"] = count($alldata);
$config["uri_segment"] = 100;
$this->pagination->initialize($config);
//echo $page = $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
$this->db->limit($config["per_page"], $this->uri->segment(3));
$query = $this->db->query("SELECT * FROM `product` WHERE `status`='New'");
$data['result'] = $query->result();
$data["links"] = $this->pagination->create_links();
$category = $this->db->get('category');
$data['category'] = $category->result();
$data['leftside'] = $this->load->view('officer/asideleftofficer', $data, true);
$data['content'] = $this->load->view('officer/product_entry', $data, true);
$this->load->view('template/base', $data);
}

public function save_product() {
$data = $_POST;
$this->db->insert('product', $data);
if($_POST['type']=='tools'){
$data2['product_id'] = $this->db->insert_id();
$data2['product_name'] = $_POST['product_name'];
$this->db->insert('tools', $data2);

}
redirect('/officer/add_product/', 'refresh');
}

public function collectionform() {
$session = $this->session->userdata;
$user_id = $session[0]->id;
$data = array();
$all = $this->db->query("SELECT * FROM `collection` INNER JOIN user ON collection.user_id = user.id WHERE collection.status='0' AND collection.user_id = $user_id ");
$alldata = $all->result();
$config["base_url"] = base_url() . "officer/collectionform";
$config["per_page"] = 30;
$config["total_rows"] = count($alldata);
$config["uri_segment"] = 3;
$this->pagination->initialize($config);
//echo $page = $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
$this->db->limit($config["per_page"], $this->uri->segment(3));
$query = $this->db->query("SELECT * FROM `collection` INNER JOIN user ON collection.user_id = user.id WHERE collection.status='0' AND collection.user_id = $user_id ");
$data['result'] = $query->result();
$data["links"] = $this->pagination->create_links();
$data['leftmenu'] = 'collection';
$data['leftside'] = $this->load->view('officer/asideleftofficer', $data, true);
$data['content'] = $this->load->view('officer/collectionform_officer', $data, true);
$this->load->view('template/base', $data);

}

public function collectionview() {
$data = array();
$id = $_GET['id'];
$all = $this->db->query("SELECT * FROM `collection` INNER JOIN user ON collection.user_id = user.id JOIN collectionstatus ON collectionstatus.collection_ids=collection.collection_id  WHERE collection_id=$id");
$data['result'] = $all->result();
$data['leftside'] = $this->load->view('officer/asideleftofficer', $data, true);
$data['content'] = $this->load->view('officer/collectionview_officer', $data, true);
$this->load->view('template/base', $data);
}

public function product_search() {
$q = $_GET['q'];
$sql = "select * from `product` where `product_name` like '%$q%' and 'status' == 'Exist' LIMIT 5";
$resultSet = $this->db->query($sql);
$result = $resultSet->result();
foreach ($result as $product) {
$answer[] = array("id" => $product->id, "text" => $product->product_name);
}
echo json_encode($answer);
}


 public function product_search_collection() {
        $q = $_GET['q'];
        $sql = "SELECT * FROM `product` WHERE   `product_name` LIKE '%$q%'   LIMIT 5";
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
$status['collection_ids'] = $this->db->insert_id();
$this->db->insert('collectionstatus', $status);
redirect('/officer/collectionform/', 'refresh');
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
$all = $this->db->query("SELECT * FROM `requisition` INNER JOIN user ON requisition.user_id = user.id WHERE requisition.status='0' AND requisition.user_id = $user_id ");
$alldata = $all->result();
$config["base_url"] = base_url() . "officer/collectionform";
$config["per_page"] = 3;
$config["total_rows"] = count($alldata);
$config["uri_segment"] = 3;
$this->pagination->initialize($config);
//echo $page = $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
$this->db->limit($config["per_page"], $this->uri->segment(3));
$query = $this->db->query("SELECT * FROM `requisition` INNER JOIN user ON requisition.user_id = user.id WHERE requisition.status='0' AND requisition.user_id = $user_id ");
$data['result'] = $query->result();
$data["links"] = $this->pagination->create_links();
$data['leftmenu'] = 'requisition';
$data['leftside'] = $this->load->view('officer/asideleftofficer', $data, true);
$data['content'] = $this->load->view('officer/requisitionform_officer', $data, true);
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
$this->load->helper('date');
$data['code'] = time();
$data['note'] = $_POST['note'];
$session = $this->session->userdata;
$data['user_id'] = $session[0]->id;
$this->db->insert('requisition', $data);
redirect('/officer/requisitionform/', 'refresh');
}

public function requisitionview() {
$data = array();
$id = $_GET['id'];
$all = $this->db->query("SELECT * FROM `requisition` INNER JOIN user ON requisition.user_id = user.id   WHERE requisition_id=$id");
$data['result'] = $all->result();
$data['leftside'] = $this->load->view('officer/asideleftofficer', $data, true);
$data['content'] = $this->load->view('officer/requisitionview_officer', $data, true);
$this->load->view('template/base', $data);
}

public function requisitiondelete() {
$id = $_GET['id'];
$this->db->delete('requisition', array('requisition_id' => $id));
redirect('/officer/requisitionform/', 'refresh');
}

/* =============================Requisiton============================ */
/* =============================Tools start============================ */

public function tools_requisition_form() {
$session = $this->session->userdata;
$user_id = $session[0]->id;
$data = array();
$all = $this->db->query("SELECT * FROM `requisition` INNER JOIN user ON requisition.user_id = user.id WHERE requisition.status='0' AND requisition.user_id = $user_id ");
$alldata = $all->result();
$config["base_url"] = base_url() . "officer/collectionform";
$config["per_page"] = 3;
$config["total_rows"] = count($alldata);
$config["uri_segment"] = 3;
$this->pagination->initialize($config);
//echo $page = $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
$this->db->limit($config["per_page"], $this->uri->segment(3));
$query = $this->db->query("SELECT * FROM `requisition` INNER JOIN user ON requisition.user_id = user.id WHERE requisition.status='0' AND requisition.user_id = $user_id ");
$data['result'] = $query->result();
$data["links"] = $this->pagination->create_links();
$data['leftmenu'] = 'tools';
$data['leftside'] = $this->load->view('officer/asideleftofficer', $data, true);
$data['content'] = $this->load->view('officer/tools_requisitionform_officer', $data, true);
$this->load->view('template/base', $data);
}

public function tools_search() {
$q = $_GET['q'];
$sql = "select * from `tools` where `product_name` like '%$q%'  LIMIT 5";
$resultSet = $this->db->query($sql);
$result = $resultSet->result();
foreach ($result as $product) {
$answer[] = array("id" => $product->product_id, "text" => $product->product_name);
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
// print_r($data); requisitionform
//$this->db->insert('tools_action', $data);
$idx=$session[0]->id;
$red ="/officer/tools_by_user/?user_id=$idx";
redirect($red, 'refresh');
}

public function tools_by_user() {
$id = $_GET['user_id'];
$sql = "select * from `tools_action` where `user_id` = $id";
$resultSet = $this->db->query($sql);
$data['result'] = $resultSet->result();
$data['leftmenu'] = 'tools';
$data['leftside'] = $this->load->view('officer/asideleftofficer', $data, true);
$data['content'] = $this->load->view('officer/tools_requisition_view_officer', $data, true);
$this->load->view('template/base', $data);
}

/* =============================Tools end============================ */
public function inventory(){
        $data = array();
         $all = $this->db->query("SELECT * FROM `product` where status = 'Exist'  ");
         $res = $all->result();       
        $this->load->library('pagination');
        $config["base_url"] = base_url() . "officer/inventory/";
        $config["total_rows"] = count($res);

        $per_page = $config["per_page"] = 25;
        $this->pagination->initialize($config);
        $start = $this->uri->segment(3);
        $offset = ($this->uri->segment(3) != '' ? $this->uri->segment(3) : 0);        
        
        $all = $this->db->query("SELECT * FROM `product` where status = 'Exist' Limit $offset ,$per_page ");
        $data['result'] = $all->result();
        $data['leftmenu'] = "inventory";
        $data["links"] = $this->pagination->create_links();
        $data['leftside'] = $this->load->view('officer/asideleftofficer', $data, true);
        $data['content'] = $this->load->view('template/inventory', $data, true);
        $this->load->view('template/base', $data);

}
/*==============================profile====================================*/
public function profile(){
 $data = array();
$session = $this->session->userdata;
$user_id = $session[0]->id;
$all = $this->db->query("SELECT * FROM `user` where id = $user_id ");
$data['userinfo'] = $all->result();
$data['leftmenu'] = 'profile';
$data['leftside'] = $this->load->view('officer/asideleftofficer', $data, true);
$data['content'] = $this->load->view('officer/content_officer_profile', $data, true);
$this->load->view('template/base', $data);   
}

/*==============================profile====================================*/



}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */