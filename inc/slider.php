<style>
    .images_1_of_2 img {
        height: 133px;
        width: 120px;
    }
    a.phantrang:hover {
        background-color: #f59f6d;
        color: #000;
    }
    .full-width{
        width: 1300px;
        margin: auto;
    }
</style>
<div class="full-width">
<div class="header_bottom">
    <div class="header_bottom_left">
        <div class="section group">
            <?php
				$getLastestDell = $product->getLastestIphone(); if($getLastestDell){ while($resultdell = $getLastestDell->fetch_assoc()){ ?>
            <div class="listview_1_of_2 images_1_of_2">
                <div class="listimg listimg_2_of_1">
                    <a href="details.php?proid=<?php echo $resultdell['productId']  ?>"> <img src="admin/uploads/<?php echo $resultdell['image'] ?>" alt="" /></a>
                </div>
                <div class="text list_2_of_1">
                    <h2>Iphone</h2>
                    <p><?php echo $resultdell['productName'] ?></p>
                    <div class="button">
                        <span><a href="details.php?proid=<?php echo $resultdell['productId']  ?>">Add to cart</a></span>
                    </div>
                </div>
            </div>
            <?php
			}}
			    ?>
            <?php
				$getLastestOPPO = $product->getLastestOppo(); if($getLastestOPPO){ while($resultOPPO = $getLastestOPPO->fetch_assoc()){ ?>
            <div class="listview_1_of_2 images_1_of_2">
                <div class="listimg listimg_2_of_1">
                    <a href="details.php?proid=<?php echo $resultdell['productId']  ?>"> <img src="admin/uploads/<?php echo $resultOPPO['image'] ?>" alt="" /></a>
                </div>
                <div class="text list_2_of_1">
                    <h2>OPPO</h2>
                    <p><?php echo $resultOPPO['productName'] ?></p>
                    <div class="button">
                        <span><a href="details.php?proid=<?php echo $resultOPPO['productId']  ?>">Add to cart</a></span>
                    </div>
                </div>
            </div>
            <?php
			}}
			    ?>
        </div>
        <div class="section group">
            <?php
				$getLastestDell = $product->getLastestXiaomi(); if($getLastestDell){ while($resultdell = $getLastestDell->fetch_assoc()){ ?>
            <div class="listview_1_of_2 images_1_of_2">
                <div class="listimg listimg_2_of_1">
                    <a href="details.php?proid=<?php echo $resultdell['productId']  ?>"> <img src="admin/uploads/<?php echo $resultdell['image'] ?>" alt="" /></a>
                </div>
                <div class="text list_2_of_1">
                    <h2>Xiaomi</h2>
                    <p><?php echo $resultdell['productName'] ?></p>
                    <div class="button">
                        <span><a href="details.php?proid=<?php echo $resultdell['productId']  ?>">Add to cart</a></span>
                    </div>
                </div>
            </div>
            <?php
			}}
			    ?>
            <?php
				$getLastestDell = $product->getLastestSamsung(); if($getLastestDell){ while($resultdell = $getLastestDell->fetch_assoc()){ ?>
            <div class="listview_1_of_2 images_1_of_2">
                <div class="listimg listimg_2_of_1">
                    <a href="details.php?proid=<?php echo $resultdell['productId']  ?>"> <img src="admin/uploads/<?php echo $resultdell['image'] ?>" alt="" /></a>
                </div>
                <div class="text list_2_of_1">
                    <h2>Samsung</h2>
                    <p><?php echo $resultdell['productName'] ?></p>
                    <div class="button">
                        <span><a href="details.php?proid=<?php echo $resultdell['productId']  ?>">Add to cart</a></span>
                    </div>
                </div>
            </div>
            <?php
			}}
			    ?>
        </div>
        <div class="clear"></div>
    </div>
    <div class="header_bottom_right_images">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <?php
						$get_slider1 = $product->show_slider_img1();
						 $get_slider2 = $product->show_slider_img2();
						  $get_slider3 = $product->show_slider_img3();
						   if($get_slider1){ while($result_slider = $get_slider1->fetch_assoc()){ ?>
                    <img class="d-block w-100" src="admin/uploads/<?php echo $result_slider['slider_image'] ?>" alt="<?php echo $result_slider['sliderName'] ?>" alt="First slide" />
                    <?php
							}
						}
						 ?>
                </div>
                <div class="carousel-item">
                    <?php
				   if($get_slider2){
					while($result_slider = $get_slider2->fetch_assoc()){ ?>
                    <img class="d-block w-100" src="admin/uploads/<?php echo $result_slider['slider_image'] ?>" alt="<?php echo $result_slider['sliderName'] ?>" alt="Second slide" />
                    <?php
					}
				}
				   ?>
                </div>
                <div class="carousel-item">
                    <?php
				   if($get_slider3){
					while($result_slider = $get_slider3->fetch_assoc()){ ?>
                    <img class="d-block w-100" src="admin/uploads/<?php echo $result_slider['slider_image'] ?>" alt="<?php echo $result_slider['sliderName'] ?>" alt="Third slide" />
                    <?php
					}
				}
				   ?>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <!-- FlexSlider -->
    </div>
    <div class="clear"></div>
</div>
