<?php 
class admin_model{
	public $conn;

	public function __construct(){
		$this->conn = mysqli_connect('localhost','root','','my_shop');

		if(!$this->conn){
			die(mysqli_connect_error($this->conn));
		}
	}

	public function check_admin($mail){
		$query = "Select * from admin where vEmail = '$mail'";
		$res = mysqli_query($this->conn, $query);

		if(mysqli_num_rows($res)>0){
			return $result = '1';
		}else{
			return $result = '0';
		}
	}

	public function add_admin($name,$surName,$mail,$pass){
		$query = "Insert into admin VALUES (null,'$name','$surName','$mail', '$pass')";
		$res = mysqli_query($this->conn,$query);
		return $res;
	}

	public function check_admin_login($email, $password){
		$query = "Select * from admin where vEmail = '$email' and vPassword = '$password'";
		$res = mysqli_query($this->conn, $query);
        if(mysqli_num_rows($res)>0){
			return $result = '1';
		}else{
			return $result = '0';
		}
	}

	public function add_category($catName){
		$query = "INSERT INTO categories (vCatName) values ('$catName')";

		$res = mysqli_query($this->conn, $query);

		return $res;
	}


	public function show_all_categories(){
		$query = "Select * from categories where eStatus = 'Active'";
		$res = mysqli_query($this->conn, $query);
		$result = mysqli_fetch_all($res,MYSQLI_ASSOC);

		return $result;
	}

	public function update_cat($catId,$catName){
		$query = "Update categories SET vCatName = '$catName' where iCatId = $catId";
		$res = mysqli_query($this->conn, $query);
		return $res;
	}

	public function delete_cat($catId){
		$query = "Update categories SET eStatus = 'Inactive' where iCatId = $catId";
		$res = mysqli_query($this->conn, $query);
		return $res;
	}


	public function add_product($catId,$prodName,$prodPrice,$prodDesc,$image_name){
		$query = "Insert into products VALUES(null, $catId, '$prodName','$prodPrice','$prodDesc', '$image_name','Active')";

		$res = mysqli_query($this->conn, $query);
		return $res;
	}

	public function display_products($catId){

		$query = "Select * from products where iCatId = $catId  order by iProdId desc";

		$res = mysqli_query($this->conn, $query);
		$result = mysqli_fetch_all($res,MYSQLI_ASSOC);

		return $result;
	}

	public function get_product_by_id($prodId){
		$query = "Select * from products where iProdId = $prodId";
		$res = mysqli_query($this->conn, $query);
		$result = mysqli_fetch_all($res, MYSQLI_ASSOC);

		return $result;
	}

	public function save_edit_prod($iProdId,$vProdName,$iProdPrice,$vProdDesc,$image_name, $vProdStatus){

		if($image_name!=''){
			$image = "vProdImage = '$image_name',";
		}else{
			$image = '';
		}

		$query = "UPDATE products set vProdName = '$vProdName', iProdPrice= '$iProdPrice',  vProdDesc = '$vProdDesc', $image  eStatus = '$vProdStatus' where iProdId  = $iProdId	";
		$res = mysqli_query($this->conn, $query);
		return $res;
	}


	public function delete_prod($iProdid){
		$query = "Update products set eStatus ='Inactive' where iProdId = $iProdid ";
		$res = mysqli_query($this->conn, $query);
		return $res;
	}



	public function getOrdersForAdmin(){
		$query = "SELECT ord.*, pr.*, us.*, ord.eStatus as orderStatus, ord.vEmail as userEmail, concat(us.name,' ',us.lastName) as userName  from orders as ord left join products as  pr on ord.iProdId = pr.iProdId left join users as us on ord.vEmail = us.email where  ord.eConfirmed = 'true' and ord.eStatus = 'Active' ";
	
		$res = mysqli_query($this->conn, $query);
		$result = mysqli_fetch_all($res,MYSQLI_ASSOC);

		return $result;
	}

	public function confirmOrder($orderId){
		$query = "Update orders set eStatus = 'Inactive' where iOrderId = $orderId";
		$res = mysqli_query($this->conn, $query);
		return $res;
	}

}

$model = new admin_model();

?>