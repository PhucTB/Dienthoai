<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php 

$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../classes/cart.php');
include_once ($filepath.'/../helpers/format.php');

?>
<?php
	$ct = new cart();
	if(isset($_GET['shiftid'])){
     	$id = $_GET['shiftid'];
     	$time = $_GET['time'];
     	$price = $_GET['price'];
     	$shifted = $ct->shifted($id,$time,$price);
    }

    if(isset($_GET['delid'])){
     	$id = $_GET['delid'];
     	$time = $_GET['time'];
     	$price = $_GET['price'];
     	$del_shifted = $ct->del_shifted($id,$time,$price);
    }
?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Đơn hàng
        </h2>

        <div class="block">
            <?php 
                if(isset($shifted)){
                	echo $shifted;
                }
                ?>
            <?php 
                if(isset($del_shifted)){
                	echo $del_shifted;
                }
                
                ?>
            <table class="data display datatable" id="example">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Thời gian đặt hàng</th>
                        <th>Tên sản phẩm</th>
                        <th>Quantity</th>
                        <th>Giá</th>
                        <th>Tổng</th>
                        <th>Tên Khách hàng</th>
                        <th>Kiểm tra</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
						$ct = new cart();
						$fm = new Format();
						$get_inbox_cart = $ct->get_inbox_cart();
						if($get_inbox_cart){
							$i = 0;
							$tong=0;
							while($result = $get_inbox_cart->fetch_assoc()){
								$i++;
								$tong=$result['quantity']*$result['Gia'].' '.'VNĐ';
						 ?>

                    <tr class="odd gradeX">
                        <td><?php echo $i; ?></td>
                        <td><?php echo $fm->formatDate($result['date_order']) ?></td>
                        <td><?php echo $result['productName'] ?></td>
                        <td><?php echo $result['quantity'] ?></td>
                        <td><?php echo $result['Gia'].' '.'VNĐ' ?></td>
                        <td><?php echo $result['price1'].' '.'VNĐ' ?></td>
                        <td><?php echo $result['Tenkhachhang'] ?></td>
                        <td>
                            <?php 
							if($result['status']==0){
							?>

                            <a class="custom-btn btn-4"
                                href="?shiftid=<?php echo $result['id'] ?>&price=<?php echo $result['price1'] ?>&time=<?php echo $result['date_order'] ?>">Pending</a>

                            <?php
							}elseif($result['status']==1){
								?>
                            <?php
								echo '<div class="custom-btn btn-3">Shifting...</div>';
								?>
                            <?php
							}elseif($result['status']==2){
							?>

                            <a class="custom-btn btn-5"
                                href="?delid=<?php echo $result['id'] ?>&price=<?php echo $result['price1'] ?>&time=<?php echo $result['date_order'] ?>">Delete</a>

                            <?php
								}
							
							?>
                        </td>
                    </tr>
                    <?php
					}}
						?>
                </tbody>
            </table>
            <style>
            .form_hoadon {
                display: flex;
            }

            .p_hd {
                margin-top: 10px;
                margin-right: 20px;
            }

            select.sp_chon {
                width: 200px;
            }
            </style>
        </div>

    </div>
</div>
<script type="text/javascript">
$(document).ready(function() {
    setupLeftMenu();

    $('.datatable').dataTable();
    setSidebarHeight();
});
</script>
<?php include 'inc/footer.html';?>