<?php 
	include 'inc/header.php';
	include 'inc/slider.php';
?>
<style>
    .grid_1_of_4.images_1_of_4 a img {
        width: 220px;
        height: 190px;
    }
    .images_1_of_4 h2 {
        font-size: 1.5rem;
        height: 40px;
    }
    .btn_1 {
        text-align: center;
    }
</style>

<div class="main">
    <div class="content">
        <div class="content_top">
            <div class="heading">
                <h3>Sản phẩm nổi bật</h3>
            </div>
            <div class="clear"></div>
        </div>
        <div class="section group">
            <?php
	      		$product_feathered = $product->getproduct_feathered(); if($product_feathered){ while($result = $product_feathered->fetch_assoc()){ ?>
            <div class="box">
                <div class="product-top">
                    <span class="top_left">Trả góp 0%</span>
                    <span class="top_right">-15%</span>
                </div>
                <a href="details.php?proid=<?php echo $result['productId'] ?>"><img class="image" src="admin/uploads/<?php echo $result['image'] ?>" alt="" /></a>
                <h3 class="product-name">
                    <ins style="font-size: 20px; margin-right: 20px;"><?php echo $result['brandName'] ?></ins>
                    <a href="details.php?proid=<?php echo $result['productId'] ?>"><?php echo $result['productName'] ?></a>
                </h3>
                <div class="product-price vat">
                    <span>
                        <del style="margin-left: 20px;"><?php echo $fm->format_currency($result['price_promotion'])." "."VNĐ" ?></del>
                        <?php echo $fm->format_currency($result['price'])." "."VNĐ" ?>
                    </span>
                </div>
                <span class="start-result-count" style="float: right; margin-right: 5px;">0 đánh giá</span>
                <div class="text_none">
                    <div class="sort">
                        <a href="details.php?proid=<?php echo $result['productId'] ?>"><span>Mua ngay</span></a>
                    </div>
                    <?php $productphone = $product->getPhone($result['productId']);
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
			}?>
        </div>
        <div class="content_bottom">
            <div class="heading">
                <h3>Sản phẩm mới nhất</h3>
            </div>
            <div class="clear"></div>
       		 </div>
        <div class="section group">
            <?php
	      		$product_new = $product->getproduct_new(); if($product_new){ while($result_new = $product_new->fetch_assoc()){ ?>
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
                    <?php $productphone = $product->getPhone($result_new['productId'] );
                     if($productphone){ while($resultphone = $productphone->fetch_assoc()){ ?> 
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
			}
				?>
        </div>
        <div class="content_bottom">
            <div class="heading">
                <h3>Sản phẩm bán chạy</h3>
            </div>
            <div class="clear"></div>
       		 </div>
        <div class="section group">
            <?php
	      		$product_new = $product->getAll_Iphone_bn(); if($product_new){ while($result_new = $product_new->fetch_assoc()){ ?>
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
                    <?php $productphone = $product->getPhone($result_new['productId'] );
                     if($productphone){ while($resultphone = $productphone->fetch_assoc()){ ?> 
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
			}
				?>
        </div>
        <div class="content_bottom">
            <div class="heading">
                <h3>Sản phẩm Iphone</h3>
            </div>
            <div class="All" style="float: right;">
            <?php $product_all = $product->getAll_Iphone(); if(isset($product_all)){ ?>
                <a href="topbrands.php?brandid=16">Xem tất cả (<span><?php echo $product_all ?></span>)</a>
            </div>
            <div class="clear"></div>
        </div><?php }?>
        <div class="section group">
            <?php
	      		$product_new = $product->getproduct_Iphone(); if($product_new){ while($result_new = $product_new->fetch_assoc()){ ?>
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
                    <?php $productphone = $product->getPhone($result_new['productId'] );
                     if($productphone){ while($resultphone = $productphone->fetch_assoc()) { ?>
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
			}
				?>
        </div>
        <style type="text/css">
            a.phantrang {
                border: 1px solid #ddd;
                padding: 10px;
                background: #414045;
                color: #fff;
                cursor: pointer;
            }
            a.phantrang:hover {
                background: blue;
            }
        </style>
        <!-- <div class="btn_1">
				<style>
					a.phantrang:hover{
						background: #f59f6d; 
						color: #fff;
					}
				</style>
				<?php
				if(isset($_GET['trang'])){
					$trang = $_GET['trang'];
				}else{
					$trang = 1;
				}
				$product_all = $product->get_all_product(); 
				$product_count = mysqli_num_rows($product_all);
				$product_button = ceil($product_count/4);
				$i = 1;
				echo '<p>Trang : </p>';
				for($i=1;$i<=$product_button;$i++){
					?>
					<a class="phantrang" <?php if($i==$trang){ echo 'style="background:orange"';} ?> style="margin:0 10px;" href="index.php?trang=<?php echo $i ?>"><?php echo $i ?></a>	
					<?php
					
				}
				?>
			</div> -->
    </div>
</div>
</div>
</div>
<?php 
	include 'inc/footer.php';
	
 ?>
