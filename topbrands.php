<?php 
	include 'inc/header.php';
	// include 'inc/slider.php';
?>
<?php
	if(!isset($_GET['brandid']) || $_GET['brandid']==NULL){
       echo "<script>window.location ='404.php'</script>";
    }else{
        $id = $_GET['brandid']; 
    }
   
?>
 <div class="main">
    <div class="content">
    	<?php
	     	 $name_brand = $br->get_name_by_brand($id);
	      	 if($name_brand){
	      	 	while($result_name = $name_brand->fetch_assoc()){
	      	?>
    	<div class="content_top">
    		
    		<div class="heading">	
    		<h3>Thương hiệu : <?php echo $result_name['brandName'] ?></h3>
    		</div>
    		
    		<div class="clear"></div>

    	</div>
    	<?php
			}}
			?>
	   <div class="section group">
            <?php
	      		$product_new = $product->getproductall($id); if($product_new){ while($result_new = $product_new->fetch_assoc()){ ?>
            <div class="box">
                <div class="product-top">
                    <span class="top_left">Trả góp 0%</span>
                    <span class="top_right">-15%</span>
                </div>
                <a href="details.php?proid=<?php echo $result_new['productId'] ?>"><img class="image" src="admin/uploads/<?php echo $result_new['image'] ?>" alt="" /></a>
                <h3 class="product-name">
                    <ins style="font-size: 20px; margin-right: 20px;"><?php echo $result_new['brandName'] ?></ins>
                    <a href="details.php?proid=<?php echo $result_new['productId'] ?>"><?php echo $result_new['productName'] ?></a>
                </h3>
                <div class="product-price vat">
                    <span>
                        <del style="margin-left: 20px;"><?php echo $fm->format_currency($result_new['price_promotion'])." "."VNĐ" ?></del>
                        <?php echo $fm->format_currency($result_new['price'])." "."VNĐ" ?>
                    </span>
                </div>
                <span class="start-result-count" style="float: right; margin-right: 5px;">0 đánh giá</span>
                <div class="text_none">
                    <div class="sort">
                        <a href="details.php?proid=<?php echo $result_new['productId'] ?>"><span>Mua ngay </span></a>
                    </div>
                    <?php $productphone = $product->getPhone($result_new['productId']);
                     if($productphone){ 
                         while($resultphone = $productphone->fetch_assoc()){ ?>
                    <div class="text_cauhinh">
                        <div class="text_p_c">
                            <p>Màn hình :<?php echo $resultphone['Manhinh'] ?></p>
                             <p>Chíp :<?php echo $resultphone['Chip'] ?></p>
                        </div>
                        <div class="text_p_c">
                            <p>Ram : <?php echo $resultphone['Ram'] ?></p>
                        <p>Rom : <?php echo $resultphone['Rom'] ?></p></div>
                        
                    </div>
                    <?php
				        }
		    	    }?>
                </div>
            </div>
			<?php
		}
	}else{
		echo 'Thương hiệu hiện tại chưa có sản phẩm';
	}
		?>
        </div>
    </div>
 </div>
<?php 
	include 'inc/footer.php';
	
 ?>

