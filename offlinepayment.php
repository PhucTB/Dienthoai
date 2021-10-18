<?php 
	
	include 'inc/header.php';
	// include 'inc/slider.php';
	
?>
<?php
	if(isset($_GET['orderid']) && $_GET['orderid']=='order'){
       $customer_id = Session::get('customer_id');
	   $tong=$_GET['tong'];
       $insertOrder = $ct->insertOrder($customer_id);
       $checkorder = $ct->check_order_hd($customer_id);
        if($checkorder!=false){
            $delCart = $ct->del_all_data_cart();	
	    $insert_hoadon=$ct->inserthoadon($customer_id,$tong);
        }
    }
?>

<style type="text/css">
.box_left {
    width: 50%;
    border: 1px solid #666;
    float: left;
    padding: 4px;

}

.box_right {
    width: 47%;
    border: 1px solid #666;
    float: right;
    padding: 4px;
}

a.a_order {
    background: red;
    padding: 7px 20px;
    color: #fff;
    font-size: 21px;
}
</style>
<form action="" method="POST">
    <div class="main">
        <div class="content">
            <div class="section group">
                <div class="heading">
                    <h3>Đặt hàng</h3>
                </div>

                <div class="clear"></div>
                <div class="box_left">
                    <div class="cartpage">

                        <?php
			    	 if(isset($update_quantity_cart)){
			    	 	echo $update_quantity_cart;
			    	 }
			    	?>
                        <?php
			    	 if(isset($insertOrder)){
			    	 	echo $insertOrder;
			    	 }
			    	?>
                        <?php
			    	 if(isset($insert_hoadon)){
			    	 	echo $insert_hoadon;
			    	 }
			    	?>
                        <?php
			    	 if(isset($delcart)){
			    	 	echo $delcart;
			    	 }
			    	?>
                        <table class="tblone">
                            <tr>
                                <th width="5%">ID</th>
                                <th width="15%">Tên điện thoại</th>
                                <th width="15%">Số lượng</th>
                                <th width="25%">pirce</th>
                                <th width="20%">Tổng tiền</th>

                            </tr>
                            <?php
							$get_product_cart = $ct->get_product_cart();
							if($get_product_cart){
								$subtotal = 0;
								$qty = 0;
								$i = 0;
								while($result = $get_product_cart->fetch_assoc()){
									$i++;
							?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $result['productName'] ?></td>
                                <td>

                                    <?php echo $result['quantity'] ?>

                                </td>
                                <td><?php echo $fm->format_currency($result['price'])." "."VNĐ" ?></td>

                                <td><?php
								$total = $result['price'] * $result['quantity'];
								echo $fm->format_currency($total).' '.'VNĐ' ;
								 ?></td>

                            </tr>
                            <?php
							$subtotal += $total;
							$qty = $qty + $result['quantity'];
							}
						}
						?>

                        </table>
                        <?php
							$check_cart = $ct->check_cart();
								if($check_cart){
								?>
                        <table style="float:right;text-align:left;margin:5px" width="40%">
                            <tr>
                                <th>Sub Total : </th>
                                <td><?php 

									echo $fm->format_currency($subtotal).' '.'VNĐ' ;
									Session::set('sum',$subtotal);
									Session::set('qty',$qty);
								?></td>
                            </tr>
                            <tr>
                                <th>VAT 1% :</th>
                                <td><?php 
								$vat = $subtotal * 0.01;
								echo $fm->format_currency($vat).' '.'VNĐ' ;
								?></td>
                            </tr>
                            <tr>
                                <th>Grand Total :</th>
                                <td><?php 
								$vat = $subtotal * 0.01;
								$gtotal = $subtotal + $vat;
								echo $fm->format_currency($gtotal).' '.'VNĐ' ;
								?>
                                </td>
                            </tr>

                        </table>
                        <?php
					}else{
						echo 'Giỏ của bạn trống trơn ! Hãy mua sắm ngay bây giờ';
					}
					  ?>


                    </div>
                </div>
                <div class="box_right">
                    <table class="tblone">
                        <?php
				$id = Session::get('customer_id');
				$get_customers = $cs->show_customers($id);
				if($get_customers){
					while($result = $get_customers->fetch_assoc()){

				?>
                        <tr>
                            <td>Tên khách hàng</td>
                            <td>:</td>
                            <td><?php echo $result['Tenkhachhang'] ?></td>
                        </tr>
                        <tr>
                            <td>Ngày sinh</td>
                            <td>:</td>
                            <td><?php echo $result['Ngaysinh'] ?></td>
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
                            <td>Địa chỉ</td>
                            <td>:</td>
                            <td><?php echo $result['Diachi'] ?></td>
                        </tr>
                        <tr>
                            <td>Thành phố</td>
                            <td>:</td>
                            <td><?php echo $result['Thanhpho'] ?></td>
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
                            <td colspan="3"><a href="editprofile.php">Update thông tin</a></td>

                        </tr>

                        <?php
					}
				}
				?>
                    </table>
                </div>

            </div>

        </div>
        <center style="margin-top: 20px;"><a href="?orderid=order&&tong=<?php echo $gtotal ?>" class="a_order">Đặt hàng
                ngay</a></center><br>
    </div>
</form>
<?php 
	include 'inc/footer.php';
	
 ?>