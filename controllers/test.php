<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test extends CI_Controller {
	public function index()
	{
		
	}
	public function product(){
	$this->db->query("TRUNCATE category");
	$this->db->query("TRUNCATE product");
	$this->db->query("TRUNCATE collection");
	$this->db->query("TRUNCATE requisition");
	

	for($i=1;$i<40;$i++){
	$sql="INSERT INTO category (category,description) VALUES ( 'category_".$i."', 'Category_".$i." Lorem ipsum dolor sit amet, consectetur')";
	$this->db->query($sql);
	$sql= "INSERT INTO product (product_name,description,type,status,categoryid,category,quantity,Unit,price,location,barcode) VALUES ('Product".$i."', 'Product ".$i." Lorem ipsum dolor sit amet, consectetur adipisicing elit, ', 'raw', 'New', '".$i."', 'category_".$i."', '0', 'Kg', '20', '".$i."/1234', '0')";
	$this->db->query($sql);

	}
	}
	public function clean(){
	
	
	}
        public function collection(){
            for($i=1;$i<40;$i++){
            $sql="INSERT INTO `store`.`collection` (`collection_id`, `product_id`, `product_name`, `quantity`, `price`, `memo`, `mobile`, `purchase_date`, `status`, `date`, `user_id`, `note`) VALUES (NULL, '[1]', '[product Name]', '[1]', '[1]', '[1234]', '[122]', '[1]', '1', CURRENT_TIMESTAMP, '2', 'With Thank.')";
            $this->db->query($sql);
            }
        }

         public function toolaction(){
            for($i=1;$i<40;$i++){
            $sql="INSERT INTO `store`.`tools_action` (`collection_id`, `product_id`, `product_name`, `quantity`, `price`, `memo`, `mobile`, `purchase_date`, `status`, `date`, `user_id`, `note`) VALUES (NULL, '[1]', '[product Name]', '[1]', '[1]', '[1234]', '[122]', '[1]', '1', CURRENT_TIMESTAMP, '2', 'With Thank.')";
            $this->db->query($sql);
            }
        } 
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */