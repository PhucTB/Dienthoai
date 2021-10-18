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
 	$id = Session::get('customer_id');
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['save'])) {
		$date1= $_POST['ngaysinh'];
		$datetime=strtotime($date1);
		$date=date("Y-m-d H:i:s",$datetime);
        $UpdateCustomers = $cs->update_customers($_POST, $id,$date);
    }
?>
<style>
#gt {
    height: 21px;
}
</style>
<div class="main">
    <div class="content">
        <div class="section group">
            <div class="content_top">
                <div class="heading">
                    <h3>Update thông tin</h3>
                </div>
                <div class="clear"></div>
            </div>
            <form action="" method="post">
                <table class="tblone">
                    <tr>

                        <?php
						if(isset($UpdateCustomers)){
							echo '<td colspan="3">'.$UpdateCustomers.'</td>';
						}
						?>

                    </tr>
                    <?php
				$id = Session::get('customer_id');
				$get_customers = $cs->show_customers($id);
				if($get_customers){
					while($result = $get_customers->fetch_assoc()){
						date_default_timezone_set('Asia/Ho_Chi_Minh');
				?>
                    <tr>
                        <td>Tên khách hàng</td>
                        <td>:</td>
                        <td><input type="text" name="name" value="<?php echo $result['Tenkhachhang'] ?>"></td>
                    </tr>
                    <tr>
                        <td>Ngày sinh</td>
                        <td>:</td>
                        <td style="float:left;">
                            <?php
							$date1= $result['Ngaysinh'];					
							$datetime=strtotime($date1);
							$ngaysinh=date("d/m/Y",$datetime);
						?>
                            <input type="text" name="ngaysinh" id="datepicker" value="<?php echo $ngaysinh ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Giới tinh</td>
                        <td>:</td>
                        <td style="display: flex;width: 160px;">
                            <?php if($result['Gioitinh']==0){?>
                            <input type="radio" name="gioitinh" id="gt" checked value="0">Nam
                            <input type="radio" name="gioitinh" id="gt" value="1">Nữ
                            <?php }else{?>
                            <input type="radio" name="gioitinh" id="gt" value="0">Nam
                            <input type="radio" name="gioitinh" id="gt" checked value="1">Nữ
                            <?php
					}
					
					?>
                        </td>
                    </tr>

                    <tr>
                        <td>Tỉnh</td>
                        <td>:</td>
                        <td style="float:left;"><select name="thanhpho" id="">
                                <option value="<?php echo $result['Thanhpho'] ?>"><?php echo $result['Thanhpho'] ?>
                                </option>
                                <?php
						$tinhdemo=array(1=>"An Giang",2=>"Bà Rịa - Vũng Tàu",3=>"Bắc Giang",4=>"Bắc Kạn",5=>"Bạc Liêu",6=>"Bắc Ninh",7=>"Bến Tre",8=>"Bình Định",
						9=>"Bình Dương",10=>"Bình Phước",11=>"Bình Thuận",12=>"Cà Mau",13=>"Cao Bằng",14=>"Đắk Lắk",15=>"Đắk Nông",16=>"Điện Biên",17=>"Đồng Nai",
						18=>"Đồng Tháp",19=>"Gia Lai",20=>"Hà Giang",21=>"Hà Nam", 22=>"Hà Tĩnh" ,23=>"Hải Dương", 24=>"Hậu Giang" ,25=>"Hòa Bình" ,26=>"Hưng Yên" ,
						27=>"Khánh Hòa ",28=>"Kiên Giang",29=>"Kon Tum ",30=>"Lai Châu ",31=>"Lâm Đồng ",32=>"Lạng Sơn ",33=>"Lào Cai" ,34=>"Long An",
						35=>" Nam Định" ,36=>"Nghệ An" ,37=>"Ninh Bình",38=>"Ninh Thuận" ,39=>"Phú Thọ" ,40=>"Quảng Bình",41=>"Quảng Nam", 42=>"Quảng Ngãi", 
						43=>"Quảng Ninh" ,44=>"Quảng Trị" ,45=>"Sóc Trăng" ,46=>"Sơn La",47=>"Tây Ninh" ,48=>"Thái Bình" ,49=> "Thái Nguyên",50=> "Thanh Hóa" ,
						51=>"Thừa Thiên Huế ",52=>"Tiền Giang", 53=>"Trà Vinh", 54=>"Tuyên Quang",55=> "Vĩnh Long",56=> "Vĩnh Phúc",57=> "Yên Bái",
						58=> "Phú Yên",59=>"Cần Thơ",60=> "Đà Nẵng" ,61=>"Hải Phòng", 62=>"Hà Nội",63=> "TP HCM");	
						?>
                                <?php
							
								for($i=1;$i<=count($tinhdemo);$i++){
							?>
                                <option value="<?php echo $tinhdemo[$i] ?>"><?php echo $tinhdemo[$i] ?></option>
                                <?php } 
							
							?>

                            </select></td>
                    </tr>
                    <tr>
                        <td>Địa chỉ</td>
                        <td>:</td>
                        <td><input type="text" name="Diachi" value="<?php echo $result['Diachi'] ?>"></td>
                    </tr>
                    <tr>
                        <td>Điện thoại</td>
                        <td>:</td>
                        <td><input type="text" name="DT" value="<?php echo $result['DT'] ?>"></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td><input type="text" name="date" value="<?php echo $result['email'] ?>" disabled></td>
                    </tr>
                    <tr>
                        <td colspan="3"><input type="submit" name="save" value="Save"></td>

                    </tr>

                    <?php
					}
				}
				?>
                </table>
            </form>
        </div>
    </div>

    <?php 
	include 'inc/footer.php';
	ob_flush();
 ?>