

<?php 

class user_model{
	public $conn;

	public function __construct(){
		$this->conn = mysqli_connect('localhost','root','','my_shop');

		if(!$this->conn){
			die(mysqli_connect_error($this->conn));
		}
	}


	public function check_user($mail){
		$query = "Select * from users where email = '$mail'";
		$res = mysqli_query($this->conn, $query);

		if(mysqli_num_rows($res)>0){
			return $result = '1';
		}else{
			return $result = '0';
		}
	}


	public function add_user($name,$surName,$mail,$pass,$phone){
		$query = "Insert into users VALUES (null,'$name','$surName','$mail', '$pass', '$phone')";
		$res = mysqli_query($this->conn,$query);
		return $res;
	}

	public function check_user_login($email,$password){
		$query = "Select * from users where email = '$email' and password = '$password'";
		$res = mysqli_query($this->conn, $query);
        if(mysqli_num_rows($res)>0){
			return $result = '1';
		}else{
			return $result = '0';
		}
	}


	public function show_all_categories(){
		$query = "Select * from categories where eStatus = 'Active'";
		$res = mysqli_query($this->conn, $query);
		$result = mysqli_fetch_all($res,MYSQLI_ASSOC);

		return $result;
	}


	public function get_products($catId){
		$query = "Select * from products where iCatId = $catId and eStatus = 'Active'";
		$res = mysqli_query($this->conn, $query);
		$result = mysqli_fetch_all($res, MYSQLI_ASSOC);

		return $result;
	}

	public function readDesc($prodId){
		$query = "Select vProdDesc, vProdName from products where iProdId = $prodId";
		$res = mysqli_query($this->conn, $query);
		$result = mysqli_fetch_all($res, MYSQLI_ASSOC);

		return $result;
	}

	public function check_card($userEmail, $prodId){
		$query = "Select * from cards where iProdId = $prodId and vEmail = '$userEmail'";
		$res = mysqli_query($this->conn, $query);

		if(mysqli_num_rows($res)>0){
			return $result = '1';
		}else{
			return $result = '0';
		}
	}

	public function add_to_card($userEmail, $prodId){
		$query = "Insert Into cards VALUES(null, $prodId, 1, '$userEmail')";
		$res = mysqli_query($this->conn, $query);

		return $res;
	}


	public function update_card($userEmail, $prodId,$quantity,$type){
		if($type == 'add'){
			$query = "Update cards set quantity = quantity +$quantity  where iProdId = $prodId and vEmail = '$userEmail'";
		}else{
			$query = "Update cards set quantity = $quantity where iProdId = $prodId and vEmail = '$userEmail'";
		}

		$res = mysqli_query($this->conn, $query);
		return $res;
	}


	public function getCards($userEmail){
		$query = "SELECT cd.*, pr.* from cards as cd left join products as  pr on cd.iProdId = pr.iProdId where vEmail = '$userEmail'";
		
		$res = mysqli_query($this->conn, $query);
		$result = mysqli_fetch_all($res,MYSQLI_ASSOC);

		return $result;
	}


	public function removeCard($cardId){
		$query = "Delete from cards where iCardId = $cardId";
		$res = mysqli_query($this->conn, $query);
		return $res;
	}


	public function createOrder($prodId,$userEmail,$quant){

		$query = "Select * from orders where iProdId = $prodId and vEmail = '$userEmail'";
		$res = mysqli_query($this->conn, $query);
		$result = mysqli_fetch_all($res,MYSQLI_ASSOC);
		
		if(mysqli_num_rows($res)>0){
			$query  = "Update orders set quantity = quantity + $quant where iOrderId =". $result[0]['iOrderId'];

		}else{
			$query = "INSERT INTO orders VALUES(null, $prodId,$quant,'$userEmail','false','Active')";
		}

		$res = mysqli_query($this->conn, $query);
		return $res;
	}


	public function getSentOrders($userEmail){
		$query = "SELECT ord.*, pr.*, ord.eStatus as orderStatus  from orders as ord left join products as  pr on ord.iProdId = pr.iProdId where ord.vEmail = '$userEmail' and ord.eConfirmed = 'true' and ord.eStatus = 'Active' ";
		
		$res = mysqli_query($this->conn, $query);
		$result = mysqli_fetch_all($res,MYSQLI_ASSOC);

		return $result;
	}

	public function removeOrder($orderId){
		$query = "Delete from orders where iOrderId = $orderId";
		$res = mysqli_query($this->conn, $query);
		return $res;
	}

	public function sendOrder($userEmail){
		$query = "Update orders set eConfirmed = 'true' where vEmail = '$userEmail' and eConfirmed = 'false' and eStatus = 'Active'";
		$res = mysqli_query($this->conn, $query);
		return $res;
	}


	public function getNewOrders($userEmail){
		$query = "SELECT ord.*, pr.*, ord.eStatus as orderStatus  from orders as ord left join products as  pr on ord.iProdId = pr.iProdId where ord.vEmail = '$userEmail' and ord.eConfirmed = 'false' and ord.eStatus = 'Active' ";
		
		$res = mysqli_query($this->conn, $query);
		$result = mysqli_fetch_all($res,MYSQLI_ASSOC);
		return $result;
	}


	public function confirmedByAdminOrders($userEmail){
		$query = "SELECT ord.*, pr.*, ord.eStatus as orderStatus  from orders as ord left join products as  pr on ord.iProdId = pr.iProdId where ord.vEmail = '$userEmail' and ord.eConfirmed = 'true' and ord.eStatus = 'Inactive' ";
		
		$res = mysqli_query($this->conn, $query);
		$result = mysqli_fetch_all($res,MYSQLI_ASSOC);
		return $result;
	}

	public function allSale(){
		$query = "Select * from products where iCatId = 7 and eStatus = 'Active'";
		$res = mysqli_query($this->conn, $query);
		$result = mysqli_fetch_all($res, MYSQLI_ASSOC);

		return $result;

	}


	public function allTop(){
		$query = "Select * from products where iCatId = 9 and eStatus = 'Active'";
		$res = mysqli_query($this->conn, $query);
		$result = mysqli_fetch_all($res, MYSQLI_ASSOC);

		return $result;

	}
	public function allNew(){
		$query = "Select * from products where iCatId = 8 and eStatus = 'Active'";
		$res = mysqli_query($this->conn, $query);
		$result = mysqli_fetch_all($res, MYSQLI_ASSOC);

		return $result;

	}
}

$model = new user_model();

?>