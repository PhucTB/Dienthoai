<?php 
	ob_start();
	include 'inc/header.php';
	// include 'inc/slider.php';
?>
<?php
	
	$login_check = Session::get('customer_login'); 
	if($login_check==false){
		header('Location:login.php');
	}
		
?>
<?php

	// if(!isset($_GET['proid']) || $_GET['proid']==NULL){
 //       echo "<script>window.location ='404.php'</script>";
 //    }else{
 //        $id = $_GET['proid']; 
 //    }
 //    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
 //        $quantity = $_POST['quantity'];
 //        $AddtoCart = $ct->add_to_cart($quantity, $id);
        
 //    }
?>
 <div class="main">
    <div class="content">
    	<div class="section group">
    		<div class="content_top">
	    		<div class="heading">
	    		<h3>Profile Customers</h3>
	    		</div>
	    		<div class="clear"></div>
    		</div>
			
			<table class="tblone">
				<?php
				$id = Session::get('customer_id');
				$get_customers = $cs->show_customers($id);
				if($get_customers){
					while($result = $get_customers->fetch_assoc()){
						date_default_timezone_set('Asia/Ho_Chi_Minh');
						$date=strtotime($result['Ngaysinh']);
						$ngay=date("d-m-Y",$date);
				?>
					<tr>
					<td>Tên khách hàng</td>
					<td>:</td>
					<td><?php echo $result['Tenkhachhang'] ?></td>
				</tr>
				<tr>
					<td>Ngày sinh</td>
					<td>:</td>
					<td><?php echo $ngay ?></td>
				</tr>
				<tr>
					<td>Giới tinh</td>
					<td>:</td>
					<td><?php if($result['Gioitinh']==0){
						echo "Nam";
					}else{
						echo "Nữ";
					}
					?></td>
				</tr>	
				<tr>
					<td>Thành phố</td>
					<td>:</td>
					<td><?php echo $result['Thanhpho'] ?></td>
				</tr>
				<tr>
					<td>Địa chỉ</td>
					<td>:</td>
					<td><?php echo $result['Diachi'] ?></td>
				</tr>
				<tr>
					<td>Điện thoại</td>
					<td>:</td>
					<td><?php echo $result['DT'] ?></td>
				</tr>
				<tr>
					<td>Email</td>
					<td>:</td>
					<td><?php echo $result['email'] ?></td>
				</tr>
				<tr>
					<td colspan="3"><a href="editprofile.php">Update Profile</a></td>
					
				</tr>
				
				<?php
					}
				}
				?>
			</table>
 		</div>
 	</div>
</div>
<?php 
	include 'inc/footer.php';
	ob_flush();
 ?>
