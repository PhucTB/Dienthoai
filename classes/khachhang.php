<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helpers/format.php');
?>

<?php
/**
 * 
 */
class Khachhang
{
	private $kh;
	private $cs;

	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}
	public function search_khachhang($tukhoa)
	{
		$tukhoa = $this->fm->validation($tukhoa);
		$query = "SELECT * FROM tbl_customer WHERE name LIKE '%$tukhoa%'";
		$result = $this->db->select($query);
		return $result;
	}

	// public function insert_khachhang($namekh){

	// 	// $namekh = $this->fm->validation($namekh);
	// 	$namekh = mysqli_real_escape_string($this->db->link, $data['Tenkhachhang']);
	//     $gioitinh = mysqli_real_escape_string($this->db->link, $data['Gioitinh']);
	//     $ngaysinh= mysqli_real_escape_string($this->db->link, $data['Ngaysinh']);
	//     $diachi = mysqli_real_escape_string($this->db->link, $data['Diachi']);
	// 	$city= mysqli_real_escape_string($this->db->link, $data['Thanhpho']);
	// 	$phone = mysqli_real_escape_string($this->db->link, $data['DT']);
	// 	$email= mysqli_real_escape_string($this->db->link, $data['email']);
	// 	if(empty($namekh)){
	// 		$alert = "<span class='error'>Tên khách hàng không được để trống</span>";
	// 		return $alert;
	// 	}else{
	// 		$query = "INSERT INTO tbl_customer(Tenkhachhang,Gioitinh,Ngaysinh,Diachi,Thanhpho,DT,email) 
	//         VALUES('$namekh','$gioitinh','$ngaysinh','$diachi','$city','$phone','$email')";
	// 		$result = $this->db->insert($query);
	// 		if($result){
	// 			$alert = "<span class='success'>Thêm thành công khách hàng</span>";
	// 			return $alert;
	// 		}else{
	// 			$alert = "<span class='error'>Thêm không thành công</span>";
	// 			return $alert;
	// 		}
	// 	}
	// }
	public function show_Khachhang()
	{
		$query = "SELECT * FROM tbl_customer order by customer_id desc";
		$result = $this->db->select($query);
		return $result;
	}
}
?>