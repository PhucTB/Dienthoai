<?php
    include '../lib/session.php';
?>
<?php 

$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../classes/cart.php');
include_once ($filepath.'/../helpers/format.php');
$ct = new cart();
$fm = new Format();
?>
<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>
<?php
	
	if(isset($_GET['id_hoadon'])){
		$admin= $_GET['admin'];
		$id = $_GET['customerid'];
		$id_hoadon=$_GET['id_hoadon'];
		$update_order= $ct->update_hoadon_order($id,$id_hoadon);
		$update_hd= $ct->update_check_hd($id_hoadon,$admin);
   	}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/csshoadon.css" media="screen" />
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>

<body>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <div class="container bootstrap snippets bootdeys">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default invoice" id="invoice">
                    <div class="panel-body">
                        <div class="invoice-ribbon">
                            <div class="ribbon-inner">PAID</div>
                        </div>
                        <div class="row">

                            <div class="col-sm-6 top-left">
                                <i class="fa fa-rocket"></i>
                            </div>
                            <?php
						
						$get_inbox_cart = $ct->get_inbox_hoadon($id,$_GET['id_hoadon']);
						if($get_inbox_cart){
							$i = 0;
							$tong=0;
							while($result = $get_inbox_cart->fetch_assoc()){
								$i++;
								$tong=$result['quantity']*$result['price'].' '.'VNĐ';
				?>

                            <div class="col-sm-6 top-right">
                                <h3 class="marginright">INVOICE-1234578</h3>
                                <span class="marginright"><?php echo $fm->formatDate($result['Date']) ?></span>
                            </div>

                        </div>
                        <hr>
                        <div class="row">

                            <div class="col-xs-4 from">
                                <p class="lead marginbottom">From : PSD</p>
                                <p>Suite 2200, San Francisco</p>
                                <p>California, 94105</p>
                                <p>Phone: 415-767-3600</p>
                                <p>Email: contact@dynofy.com</p>
                            </div>

                            <div class="col-xs-4 to">
                                <p class="lead marginbottom">To : <?php echo $result['Tenkhachhang'] ?></p>
                                <p><?php echo $result['Thanhpho'] ?></p>
                                <p><?php echo $result['Diachi'] ?></p>
                                <p>Phone: <?php echo $result['DT'] ?></p>
                                <p>Email: <?php echo $result['email'] ?></p>

                            </div>

                            <div class="col-xs-4 text-right payment-details">
                                <p class="lead marginbottom payment-info">Payment details</p>
                                <p>Date: <?php echo $fm->formatDate($result['date_order']) ?></p>
                                <p>VAT: DK888-777 </p>
                                <p>Total Amount: <?php echo $result['Tong'].' '.'VNĐ' ?></p>
                                <p>Account Name: Flatter</p>
                            </div>

                        </div>
                        <?php }}?>
                        <div class="row table-row">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width:5%">#</th>
                                        <th style="width:50%">Tên điện thoại</th>
                                        <th class="text-right" style="width:15%">Số lượng</th>
                                        <th class="text-right" style="width:15%">Giá</th>
                                        <th class="text-right" style="width:15%">Tổng tiền</th>
                                    </tr>
                                </thead>
                                <?php
						
						$get_inbox_cart = $ct->get_inbox_hoadonlist($id,$_GET['id_hoadon']);
						if($get_inbox_cart){
							$i = 0;
							$tong=0;
                            $tongtien=0;
							while($result = $get_inbox_cart->fetch_assoc()){
								$i++;
								$tong=$result['quantity']*$result['Gia'];
                                $tongtien+=$tong;
				?>
                                <tbody>
                                    <tr>

                                        <td class="text-center"><?php echo $i ?></td>
                                        <td><?php echo $result['productName'] ?></td>
                                        <td class="text-right"><?php echo $result['quantity'] ?></td>
                                        <td class="text-right"><?php echo $result['Gia'] ?></td>
                                        <td class="text-right"><?php echo $tong.' '.'VNĐ' ?></td>
                                    </tr>
                                </tbody>
                                <?php }} 
                //    $khuyenmai=$tongtien*10/100; 
                   $thue=$tongtien*1/100;
                //    $tongtra=$tongtien-$khuyenmai+$thue;
                   $tongtra=$tongtien+$thue;
                   ?>

                            </table>

                        </div>

                        <div class="row">
                            <div class="col-xs-6 margintop">
                                <p class="lead marginbottom">THANK YOU!</p>

                                <!-- <button class="btn btn-success" id="invoice-print"><i class="fa fa-print"></i> Print Invoice</button>
				<button class="btn btn-danger"><i class="fa fa-envelope-o"></i> Mail Invoice</button> -->
                                <a href="Hoadon.php">Home</a>
                            </div>
                            <div class="col-xs-6 text-right pull-right invoice-total">
                                <p>Subtotal :<?php echo $tongtien.' '.'VNĐ' ?> </p>
                                <!-- <p>Khuyến mãi (10%) : <?php echo $khuyenmai.' '.'VNĐ' ?></p> -->
                                <p>Thuế VAT (1%) : <?php echo $thue.' '.'VNĐ' ?> </p>
                                <p>Tông tiền trả : <?php echo $tongtra.' '.'VNĐ' ?> </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>