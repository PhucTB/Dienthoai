<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>

<?php
	/**
	 * 
	 */
	class customer
	{
		private $db;
		private $fm;
		
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}
		public function del_comment($id){
			$query = "DELETE FROM tbl_binhluan where id_binhluan = '$id'";
			$result = $this->db->delete($query);
			if($result){
				$alert = "<span class='success'>Xóa bình luận thành công</span>";
				return $alert;
			}else{
				$alert = "<span class='error'>Xóa bình luận không thành công</span>";
				return $alert;
			}
		}
		public function update_comment($id_bl,$binhluanad){
			$query = "update tbl_binhluan set binhluan_admin=N'$binhluanad' where id_binhluan = '$id_bl'";
			$result = $this->db->update($query);
			if($result){
				$alert = "<span class='success'>Trả lời bình luận thành công</span>";
				return $alert;
			}else{
				$alert = "<span class='error'>Trả lời bình luận không thành công</span>";
				return $alert;
			}
		}
		public function show_comment($id){
			$query = "SELECT tbl_binhluan.*,tbl_product.productName,tbl_customer.Tenkhachhang FROM tbl_binhluan
			INNER JOIN tbl_product ON tbl_product.productId = tbl_binhluan.productId 
			INNER JOIN tbl_customer ON tbl_customer.customer_id = tbl_binhluan.customer_id where tbl_binhluan.productId='$id' order by id_binhluan desc LIMIT 15 ";
			$result = $this->db->select($query);
			return $result;
		}
		public function show_comment_list(){
			$query = "SELECT tbl_binhluan.*,tbl_product.productName,tbl_customer.Tenkhachhang FROM tbl_binhluan
			INNER JOIN tbl_product ON tbl_product.productId = tbl_binhluan.productId 
			INNER JOIN tbl_customer ON tbl_customer.customer_id = tbl_binhluan.customer_id 	order by id_binhluan desc LIMIT 15 ";
			$result = $this->db->select($query);
			return $result;
		}
		// public function show_admin_comment(){
		// 	$query = "SELECT tbl_binhluan.*,tbl_product.productName,tbl_customer.Tenkhachhang FROM tbl_binhluan
		// 	INNER JOIN tbl_product ON tbl_product.productId = tbl_binhluan.productId 
		// 	INNER JOIN tbl_customer ON tbl_customer.customer_id = tbl_binhluan.customer_id LIMIT 1 ";
		// 	$result = $this->db->select($query);
		// 	return $result;
		// }
		public function show_adminid($id){
			$query = "SELECT tbl_binhluan.*,tbl_product.productName,tbl_customer.Tenkhachhang FROM tbl_binhluan
			INNER JOIN tbl_product ON tbl_product.productId = tbl_binhluan.productId 
			INNER JOIN tbl_customer ON tbl_customer.customer_id = tbl_binhluan.customer_id where id_binhluan='$id' ";
			$result = $this->db->select($query);
			return $result;
		}
		public function insert_customers($data){
			$name = mysqli_real_escape_string($this->db->link, $data['name']);
			$email = mysqli_real_escape_string($this->db->link, $data['email']);
			$gioitinh=mysqli_real_escape_string($this->db->link, $data['gender']);
			$date = mysqli_real_escape_string($this->db->link, $data['date']);
			$phone = mysqli_real_escape_string($this->db->link, $data['phone']);
			$password1 = mysqli_real_escape_string($this->db->link, md5($data['password1']));
			$password2 = mysqli_real_escape_string($this->db->link, md5($data['password2']));
			if($name=="" || $email=="" || $phone =="" || $password1 ==""|| $password2 ==""){
				$alert = "<span class='error'>Bạn cần nhập đủ thông tin</span>";
				return $alert;
			}else{
				$check_email = "SELECT * FROM tbl_customer WHERE email='$email' LIMIT 1";
				$result_check = $this->db->select($check_email);
				if($result_check){
					$alert = "<span class='error'>Email đã tồn tại mời bạn Đăng kí Email khác !</span>";
					return $alert;
				}else if($password =! $password2){
					$alert = "<span class='error'>Nhập mật khẩu không trùng khớp</span>";
					return $alert;
				}
				else
				{
					$query = "INSERT INTO tbl_customer(Tenkhachhang,Gioitinh,Ngaysinh,DT,email,password) VALUES('$name','$gioitinh','$date','$phone','$email','$password1')";
					$result = $this->db->insert($query);
					echo $query;
					if($result){
						$alert = "<span class='success'>Tài khoản của bạn đã đăng kí thành công</span>";
						return $alert;
					}else{
						$alert = "<span class='error'>Tài khoản đăng kí thất bại</span>";
						return $alert;
					}
				}
			}
		}
		public function login_customers($email,$password){
			// $email = mysqli_real_escape_string($this->db->link, $data['email']);
			// $password = md5(mysqli_real_escape_string($this->db->link, $data['password']));
			$email = $this->fm->validation($email);
			$password = $this->fm->validation($password);

			$email = mysqli_real_escape_string($this->db->link, $email);
			$password = mysqli_real_escape_string($this->db->link, $password);
			if($email=='' || $password==''){
				$alert = "<span class='error'>Password and Email must be not empty</span>";
				return $alert;
			}else{
				$check_login = "SELECT * FROM tbl_customer WHERE email='$email' AND password='$password'";
				$result_check = $this->db->select($check_login);
				if($result_check!=false){

					$value = $result_check->fetch_assoc();
					Session::set('customer_login',true);
					Session::set('customer_id',$value['customer_id']);
					Session::set('customer_name',$value['Tenkhachhang']);
					header('Location:index.php');
				}else{
					$alert = "<span class='error'>Email or Password doesn't match</span>";
					return $alert;
				}
			}
		}
		public function show_customers($id){
			$query = "SELECT * FROM tbl_customer WHERE customer_id='$id'";
			$result = $this->db->select($query);
			return $result;
		}
		public function show_sumbinhluan($id){
			$query = "SELECT sum(id_binhluan) as tong FROM tbl_binhluan WHERE productId='$id'";
			$result = $this->db->select($query);
			return $result;
		}
		public function update_customers($data, $id,$date){
			
			$Tenkhachhang = mysqli_real_escape_string($this->db->link, $data['name']);
			$ngaysinh = mysqli_real_escape_string($this->db->link, $date);
			$gioitinh = mysqli_real_escape_string($this->db->link, $data['gioitinh']);
			$Diachi = mysqli_real_escape_string($this->db->link, $data['Diachi']);
			$DT = mysqli_real_escape_string($this->db->link, $data['DT']);
			$thanhpho = mysqli_real_escape_string($this->db->link, $data['thanhpho']);
			
			if($Tenkhachhang=="" || $Diachi=="" || $DT ==""){
				$alert = "<span class='error'>Fields must be not empty</span>";
				return $alert;
			}else{
				$query = "UPDATE tbl_customer SET Tenkhachhang='$Tenkhachhang',Gioitinh='$gioitinh',Ngaysinh='$ngaysinh',Thanhpho='$thanhpho',Diachi='$Diachi',DT='$DT' WHERE customer_id ='$id'";
				$result = $this->db->insert($query);
				if($result){
						header('Location:profile.php');
				}else{
						$alert = "<span class='error'>Customer Updated Not Successfully</span>";
						return $alert;
				}
				
			}
		}
	}
?>