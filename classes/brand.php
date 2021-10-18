<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helpers/format.php');
?>

<?php
/**
 * 
 */
class brand
{
	private $db;
	private $fm;

	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function insert_brand($brandName)
	{

		$brandName = $this->fm->validation($brandName);
		$brandName = mysqli_real_escape_string($this->db->link, $brandName);

		if (empty($brandName)) {
			$alert = "<span class='error'>Brand must be not empty</span>";
			return $alert;
		} else {
			$query = "INSERT INTO tbl_brand(brandName) VALUES('$brandName')";
			$result = $this->db->insert($query);
			if ($result) {
				$alert = "<span class='success'>Insert Brand Successfully</span>";
				return $alert;
			} else {
				$alert = "<span class='error'>Insert Brand Not Success</span>";
				return $alert;
			}
		}
	}
	public function showlogin($id)
	{
		$query = "SELECT * FROM tbl_admin WHERE adminId = '$id'";
		$result = $this->db->select($query);
		return $result;
	}
	public function show_khachhang()
	{
		$query = "SELECT * FROM tbl_customer ";
		$result = $this->db->select($query);
		return $result;
	}
	public function show_admin()
	{
		$query = "SELECT * FROM tbl_admin ";
		$result = $this->db->select($query);
		return $result;
	}
	public function show_product()
	{
		$query = "SELECT * FROM tbl_product ";
		$result = $this->db->select($query);
		return $result;
	}
	public function show_brand()
	{
		$query = "SELECT * FROM tbl_brand order by brandId desc";
		$result = $this->db->select($query);
		return $result;
	}
	public function get_product_by_brand($id)
	{
		$query = "SELECT * FROM tbl_product WHERE brandId='$id' order by brandId desc LIMIT 8";
		$result = $this->db->select($query);
		return $result;
	}
	public function get_name_by_brand($id)
	{
		$query = "SELECT tbl_product.*,tbl_brand.brandName,tbl_brand.brandId FROM tbl_product,tbl_brand WHERE tbl_product.brandId=tbl_brand.brandId AND tbl_brand.brandId ='$id' LIMIT 1";
		$result = $this->db->select($query);
		return $result;
	}
	public function show_brand_home()
	{
		$query = "SELECT * FROM tbl_brand order by brandId desc";
		$result = $this->db->select($query);
		return $result;
	}
	public function getbrandbyId($id)
	{
		$query = "SELECT * FROM tbl_brand where brandId = '$id'";
		$result = $this->db->select($query);
		return $result;
	}

	public function update_brand($brandName, $id)
	{

		$brandName = $this->fm->validation($brandName);
		$brandName = mysqli_real_escape_string($this->db->link, $brandName);
		$id = mysqli_real_escape_string($this->db->link, $id);

		if (empty($brandName)) {
			$alert = "<span class='error'>Brand must be not empty</span>";
			return $alert;
		} else {
			$query = "UPDATE tbl_brand SET brandName = '$brandName' WHERE brandId = '$id'";
			$result = $this->db->update($query);
			if ($result) {
				$alert = "<span class='success'>Brand Updated Successfully</span>";
				return $alert;
			} else {
				$alert = "<span class='error'>Brand Updated Not Success</span>";
				return $alert;
			}
		}
	}
	public function update_admin($id, $level)
	{
		$query = "UPDATE tbl_admin SET level='$level' WHERE adminId = '$id'";
		$result = $this->db->update($query);
		if ($result) {
			$alert = "<span class='success'>Brand Updated Successfully</span>";
			return $alert;
		} else {
			$alert = "<span class='error'>Brand Updated Not Success</span>";
			return $alert;
		}
	}
	public function update_admin_pass($id, $adminPass, $adminPass1, $adminPass2)
	{

		if ($adminPass1 != $adminPass2) {
			$alert = "<span class='error'>Mời bạn nhập lại mật khẩu</span>";
			return $alert;
		} else {
			$query = "UPDATE tbl_admin SET adminPass='$adminPass1' WHERE adminId = '$id' and adminPass='$adminPass'";
			$result = $this->db->update($query);
			echo $query;
			if ($result) {
				$alert = "<span class='success'>Updated Mật khẩu thành công</span>";
				return $alert;
			} else {
				$alert = "<span class='error'>Updated Mật khẩu thất bại</span>";
				return $alert;
			}
		}
	}
	public function del_brand($id)
	{
		$query = "DELETE FROM tbl_brand where brandId = '$id'";
		$result = $this->db->delete($query);
		if ($result) {
			$alert = "<span class='success'>Brand Deleted Successfully</span>";
			return $alert;
		} else {
			$alert = "<span class='error'>Brand Deleted Not Success</span>";
			return $alert;
		}
	}
	public function del_admin($id)
	{
		$query = "DELETE FROM tbl_admin where adminId = '$id'";
		$result = $this->db->delete($query);
		if ($result) {
			$alert = "<span class='success'>admin Deleted Successfully</span>";
			return $alert;
		} else {
			$alert = "<span class='error'>admin Deleted Not Success</span>";
			return $alert;
		}
	}
	public function show_admin_tt($id)
	{
		$query = "select * FROM tbl_admin where adminId = '$id'";
		$result = $this->db->select($query);
		return $result;
	}
	public function show_tong()
	{
		$query = "select sum() FROM tbl_product";
		$result = $this->db->select($query);
		return $result;
	}
	public function show_tonghoadon()
	{
		$query = "select * FROM tbl_hoadon ";
		$result = $this->db->select($query);
		return $result;
	}
	public function show_tongsp()
	{
		$query = "select * FROM tbl_order where checkhd='1'";
		$result = $this->db->select($query);
		return $result;
	}
	public function show_tongdoanhthu()
	{
		$query = "select * FROM tbl_hoadon";
		$result = $this->db->select($query);
		return $result;
	}
	public function show_tongchietkhau()
	{
		$query = "select sum(Tong*1/100) FROM tbl_admin";
		$result = $this->db->select($query);
		return $result;
	}
	public function insert_admin($data, $files)
	{
		$adminName = mysqli_real_escape_string($this->db->link, $data['adminName']);
		$Gioitinh = mysqli_real_escape_string($this->db->link, $data['Gioitinh']);
		$Ngaysinh = mysqli_real_escape_string($this->db->link, $data['Ngaysinh']);
		$adminUser = mysqli_real_escape_string($this->db->link, $data['adminUser']);
		$adminEmail = mysqli_real_escape_string($this->db->link, $data['adminEmail']);
		$SDT = mysqli_real_escape_string($this->db->link, $data['SDT']);
		$adminPass = mysqli_real_escape_string($this->db->link, $data['adminPass']);
		$adminPass1 = mysqli_real_escape_string($this->db->link, $data['adminPass1']);
		$level = mysqli_real_escape_string($this->db->link, $data['level']);
		if ($adminPass != $adminPass1) {
			$alert = "<span class='error'>Mật khẩu sai mời nhập lại</span>";
			return $alert;
		} else {
			$query = "INSERT INTO tbl_admin(adminName,Gioitinh,Ngaysinh,SDT,adminEmail,adminUser,adminPass,level) VALUES('$adminName','$Gioitinh','$Ngaysinh','$SDT','$adminEmail','$adminUser','$adminPass','$level')";
			$result = $this->db->insert($query);
			if ($result) {
				$alert = "<span class='success'>Tạo tài khoản thành công</span>";
				return $alert;
			} else {
				$alert = "<span class='error'>Tạo tài khoản thất bại</span>";
				return $alert;
			}
		}
	}
}
?>