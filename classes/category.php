<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>

<?php
	/**
	 * 
	 */
	class category
	{
		private $db;
		private $fm;
		
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}
		public function all_category(){
			
		}
		public function insert_category($catName){

			$catName = $this->fm->validation($catName);
			$catName = mysqli_real_escape_string($this->db->link, $catName);
			
			if(empty($catName)){
				$alert = "<span class='error'>Category must be not empty</span>";
				return $alert;
			}else{
				$query = "INSERT INTO tbl_category(catName) VALUES('$catName')";
				$result = $this->db->insert($query);
				if($result){
					$alert = "<span class='success'>Insert Category Successfully</span>";
					return $alert;
				}else{
					$alert = "<span class='error'>Insert Category Not Success</span>";
					return $alert;
				}
			}
		}
		public function show_category(){
			$query = "SELECT * FROM tbl_category order by catId desc";
			$result = $this->db->select($query);
			return $result;
		}
		public function update_category($catName,$id){

			$catName = $this->fm->validation($catName);
			$catName = mysqli_real_escape_string($this->db->link, $catName);
			$id = mysqli_real_escape_string($this->db->link, $id);

			if(empty($catName)){
				$alert = "<span class='error'>Category must be not empty</span>";
				return $alert;
			}else{
				$query = "UPDATE tbl_category SET catName = '$catName' WHERE catId = '$id'";
				$result = $this->db->update($query);
				if($result){
					$alert = "<span class='success'>Category Updated Successfully</span>";
					return $alert;
				}else{
					$alert = "<span class='error'>Category Updated Not Success</span>";
					return $alert;
				}
			}

		}
		public function del_category($id){
			$query = "DELETE FROM tbl_category where catId = '$id'";
			$result = $this->db->delete($query);
			if($result){
				$alert = "<span class='success'>Category Deleted Successfully</span>";
				return $alert;
			}else{
				$alert = "<span class='error'>Category Deleted Not Success</span>";
				return $alert;
			}
			
		}
		public function getcatbyId($id){
			$query = "SELECT * FROM tbl_category where catId = '$id'";
			$result = $this->db->select($query);
			return $result;
		}
		public function show_category_fontend(){
			$query = "SELECT * FROM tbl_category order by catId desc";
			$result = $this->db->select($query);
			return $result;
		}
		public function get_product_by_cat($id){
			$query = "SELECT tbl_product.*,tbl_brand.brandName FROM tbl_product INNER JOIN tbl_brand ON tbl_product.brandId = tbl_brand.brandId  WHERE catId='$id' order by catId desc LIMIT 12";
			$result = $this->db->select($query);
			return $result;
		}
		public function getproductdt_new($id){
			$query = "SELECT tbl_product.*,tbl_brand.brandName FROM tbl_product INNER JOIN tbl_brand ON tbl_product.brandId = tbl_brand.brandId  where catid='$id' order by productId DESC";
			$result = $this->db->select($query);
			return $result;
		}
		public function getproductdtAZ($id){
			$query = "SELECT tbl_product.*,tbl_brand.brandName FROM tbl_product INNER JOIN tbl_brand ON tbl_product.brandId = tbl_brand.brandId  where catid='$id' order by productName ASC";
			$result = $this->db->select($query);
			return $result;
		}
		public function getproductdtZA($id){
			$query = "SELECT tbl_product.*,tbl_brand.brandName FROM tbl_product INNER JOIN tbl_brand ON tbl_product.brandId = tbl_brand.brandId  where catid='$id' order by productName DESC";
			$result = $this->db->select($query);
			return $result;
		}
		public function getproductdttang($id){
			$query = "SELECT tbl_product.*,tbl_brand.brandName FROM tbl_product INNER JOIN tbl_brand ON tbl_product.brandId = tbl_brand.brandId  where catid='$id' order by price ASC ";
			$result = $this->db->select($query);
			return $result;
		}
		public function getproductdtgiam($id){
			$query = "SELECT tbl_product.*,tbl_brand.brandName FROM tbl_product INNER JOIN tbl_brand ON tbl_product.brandId = tbl_brand.brandId  where catid='$id' order by price DESC ";
			$result = $this->db->select($query);
			return $result;
		}
		public function get_name_by_cat($id){
			$query = "SELECT tbl_product.*,tbl_category.catName,tbl_category.catId FROM tbl_product,tbl_category WHERE tbl_product.catId=tbl_category.catId AND tbl_product.catId ='$id' LIMIT 1";
			$result = $this->db->select($query);
			return $result;
		}
		public function get_name_by_sum($id){
			$query = "SELECT tbl_product.*,tbl_category.catName,tbl_category.catId FROM tbl_product,tbl_category WHERE tbl_product.catId=tbl_category.catId AND tbl_product.catId ='$id'";
			$result = $this->db->select($query);
			return $result;
		}
	}
?>