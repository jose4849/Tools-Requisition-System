<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report extends CI_Controller {

	 /*
	 * Index Page for this controller.
	 */
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
	public function collectionview() {
        $data = array();
        $id = $_GET['id'];
        $session = $this->session->userdata;
        $data['level'] = $session[0]->level;
		$type = $session[0]->type;
        $all = $this->db->query("SELECT *, collection.status as collection_status FROM `collection` INNER JOIN user ON collection.user_id = user.id JOIN collectionstatus ON collectionstatus.collection_ids=collection.collection_id  WHERE collection_id=$id");
        $data['result'] = $all->result();
        $data['leftmenu'] = "collection";
		if($type==1){$type="officer";}
		if($type==2){$type="store";}
		if($type==3){$type="purchase";}
		if($type==5){$type="director";}
        $data['leftside'] = $this->load->view("$type/asideleft$type", $data, true);
        $data['content'] = $this->load->view("$type/collectionview_$type", $data, true);
        $this->load->view('template/base', $data);
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
 	
	
}
