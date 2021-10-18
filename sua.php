
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="csssua1/css/bootstrap.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="csssua1/css/bootstrap.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="csssua1/css/bootstrap.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="csssua1/css/bootstrap.css" rel="stylesheet" type="text/css" media="all"/>
    <title>Document</title>
</head>
<body>
<?php
    include 'lib/session.php';
    Session::init();
?>
<?php
	
	include 'lib/database.php';
	include 'helpers/format.php';

	spl_autoload_register(function($class){
		include_once "classes/".$class.".php";
	});
		

	$db = new Database();
	$fm = new Format();
	$ct = new cart();
	$us = new user();
	$br = new brand();
	$cat = new category();
	$cs = new customer();
	$product = new product();
	$khachhang= new khachhang();
		
	      	 	
?>
<div class="f-grid py-2">
    <h3 class="agileits-sear-head mb-3">Sản phẩm bán chạy</h3>
    <div class="box-scroll">
        <div class="scroll">

        <?php
				$getLastes = $product->getLastestdt(); 
                if($getLastes){ while($resultdell = $getLastes->fetch_assoc()){
         ?>

            <div class="row">
                <div class="col-lg-3 col-sm-2 col-3 left-mar">
                    <img src="images/<?php echo $resultdell['image'] ?>" alt="" class="img-fluid" />
                </div>
                <div class="col-lg-9 col-sm-10 col-9 w3_mvd">
                    <a href=""><?php echo $resultdell['productName'] ?></a>
                    <a href="" class="price-mar mt-2"><?php echo number_format($resultdell['price_promotion']).'vnđ' ?></a>
                    <del><?php echo number_format($resultdell['price']).'vnđ' ?></del>
                </div>
            </div>
            <?php
									} }
									?></div>
    </div>
</div>
</body>
</html>