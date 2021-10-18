<?php 
ob_start();
	include 'inc/header.php';
	// include 'inc/slider.php';
?><?php

	if(!isset($_GET['proid']) || $_GET['proid']==NULL){
       echo "<script>window.location ='404.php'";
    }else{
        $id = $_GET['proid']; 
    }
 	$customer_id = Session::get('customer_id');
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['compare'])) {

        $productid = $_POST['productid'];
        $insertCompare = $product->insertCompare($productid, $customer_id);
        
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['wishlist'])) {

        $productid = $_POST['productid'];
        $insertWishlist = $product->insertWishlist($productid, $customer_id);
        
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['binhluansanpham'])) {

      $productid1 = $_POST['productid'];
      $binhluan = $_POST['binhluansp'];
      $time=$_POST['time'];
      $insertBinhluan = $product->insertBinhluan($productid1, $customer_id,$binhluan,$time);
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

        $quantity = $_POST['quantity'];
        $insertCart = $ct->add_to_cart($quantity, $id);
        
    }
    // if(isset($_POST['binhluan_submit'])){
    // 	$binhluan_insert = $cs->insert_binhluan();
    // }
?><style>
.group {
    zoom: 1;
    display: flex;
}

a.menu_col_1:hover {
    background-color: #fff;
    color: aqua;
    font-size: 20px;
}

ol.breadcrumb {
    background-color: #fff;
    margin: 0;
    padding: 20px 0;
}
</style>
<div class="main">
    <div class="content"><?php
		$get_product_details = $product->get_details($id);
		if($get_product_details){
			while($result_details = $get_product_details->fetch_assoc()){
		?>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a
                        href="topbrands.php?brandid=<?php echo $result_details['brandId'] ?>"><?php echo $result_details['brandName'] ?></a>
                </li>
            </ol>
        </nav>
        <div>
            <h4><?php echo $result_details['productName'] ?> </h4>
        </div>
        <div class="section group">

            <div class="cont-desc span_1_of_2">
                <div class="information_phone">
                    <div class="grid images_3_of_2 middle">
                        <div class="slides">
                            <input type="radio" name="r" id="r1" checked>
                            <input type="radio" name="r" id="r2">
                            <input type="radio" name="r" id="r3">
                            <div class="slides1 s1">
                                <img src="admin/uploads/<?php echo $result_details['image'] ?>" alt />
                            </div>
                            <div class="slides1">
                                <img src="admin/uploads/<?php echo $result_details['image'] ?>" alt />
                            </div>
                            <div class="slides1">
                                <img src="admin/uploads/<?php echo $result_details['image'] ?>" alt />
                            </div>
                        </div>
                        <div class="navigation">
                            <label for="r1" class="bar"><img src="admin/uploads/<?php echo $result_details['image'] ?>"
                                    alt /></label>
                            <label for="r2" class="bar"><img src="admin/uploads/<?php echo $result_details['image'] ?>"
                                    alt /></label>
                            <label for="r3" class="bar"><img src="admin/uploads/<?php echo $result_details['image'] ?>"
                                    alt /></label>
                        </div>
                    </div>
                    <div class="desc span_3_of_2">
                        <h2><?php echo $result_details['productName'] ?></h2>
                        <p><?php echo $fm->textShorten($result_details['content'],100) ?></p>
                        <div class="price">
                            <p>Giá:
                                <span><?php echo $fm->format_currency($result_details['price'])." "."VNĐ" ?></span>
                                <del><?php echo $fm->format_currency($result_details['price'])." "."VNĐ" ?></del>
                            </p>
                            <p>Loại sản phẩm:
                                <span><?php echo $result_details['catName'] ?></span>
                            </p>
                            <p>Hãng :
                                <span><?php echo $result_details['brandName']?></span>
                            </p>
                        </div>
                        <div class="add-cart">
                            <form action method="post">
                                <input type="number" class="buyfield" name="quantity" value="1" min="1" />
                                <input type="submit" class="buysubmit" name="submit" value="Thêm vào giỏ hàng" />
                            </form><?php
						if(isset($insertCart)){
							echo $insertCart;
						}
					?>
                        </div>
                        <div class="add-cart">
                            <div class="button_details">
                                <form action method="POST">
                                    <input type="hidden" name="productid"
                                        value="<?php echo $result_details['productId'] ?>" /><?php
	
					$login_check = Session::get('customer_login'); 
						if($login_check){
							echo '<input type="submit" class="buysubmit" name="compare" value="Thêm vào so sánh"/>'.'  ';
							
						}else{
							echo '';
						}
							
					?>
                                </form>
                                <form action method="POST">
                                    <input type="hidden" name="productid"
                                        value="<?php echo $result_details['productId'] ?>" /><?php
	
					$login_check = Session::get('customer_login'); 
						if($login_check){
							
							echo '<input type="submit" class="buysubmit" name="wishlist" value="Thêm vào yêu thích">';
						}else{
							echo '';
						}
							
					?>
                                </form>
                            </div>
                            <div class="clear"></div>
                            <p><?php
					if(isset($insertCompare)){
						echo $insertCompare;
					}
					?><?php
					if(isset($insertWishlist)){
						echo $insertWishlist;
					}
					?></p>
                        </div>
                    </div>
                </div>
                <div class="product-desc">
                    <h3>Nội dung sản phẩm</h3>
                    <div id="content">
                        <div class="dt_thongtin_construction">
                            <div class="dt_construction_text">
                                <h3 style="margin-bottom: 20px;font-size: 36px;">iPhone 12 mini 64 GB tuy là phiên bản
                                    thấp nhất trong bộ 4
                                    iPhone 12 series,
                                    nhưng vẫn sở hữu những ưu điểm vượt trội về kích thước nhỏ gọn,
                                    tiện lợi, hiệu năng đỉnh cao, tính năng sạc nhanh cùng bộ camera chất lượng cao.
                                </h3>
                                <h3 style="margin-bottom: 20px;font-size: 24px;">Điện thoại sở hữu thiết kế đẳng cấp,
                                    sang trọng</h3>
                                <p class="text_dt_p">Điện thoại iPhone 12 Mini 64GB Đỏ không còn được thiết kế viền máy
                                    bo cong ở các cạnh
                                    như ở các dòng máy trước mà được thay thế bằng phần cạnh máy được vát phẳng tạo nên
                                    sự mạnh mẽ và cá tính
                                    cho người dùng.
                                    Bên cạnh đó, máy còn được làm bằng khung nhôm cao cấp trong ngành hàng không vũ trụ
                                    mang đến thiết kế cứng
                                    cáp và vô cùng bền bỉ.
                                    Đặc biệt, máy nổi bật với hệ thống camera hình vuông vô cùng độc đáo kết hợp với mặt
                                    lưng bằng kính mang
                                    đến cảm giác cầm nắm vô cùng thích.
                                </p>
                                <div class="detail-content-image">
                                    <figure class="image-content image-auto">
                                        <img style="width: 100%;"
                                            src="https://cdn.nguyenkimmall.com/images/companies/_1/vien-thong/iphone/iphone-12-mini/iphone-12-mini/dien-thoai-iphone-12-mini-64gb-do-thiet-ke-dang-cap-sang-trong.jpg"
                                            alt="">
                                        <div class="text_i">
                                            <i>Thiết kế của iPhone 12 mini 64 GB </i>
                                        </div>

                                    </figure>
                                </div>
                                <h2 style="margin-bottom: 20px;">Màn hình siêu sắc nét nhờ công nghệ OLED Super Retina
                                    XDR</h2>
                                <p class="text_dt_p">Điện thoại iPhone 12 Mini 64GB Đỏ được thiết kế với màn hình kiểu
                                    dáng tai thỏ vô cùng
                                    quen thuộc nhưng phần viền màn hình lại gọn hơn nên mang đến cảm giác màn hình lớn
                                    mặc dù kích thước màn
                                    hình của điện thoại thông minh này chỉ 5.4 inch. Chính vì kích thước nhỏ nên bạn có
                                    thể dễ dàng mang theo
                                    bên mình và để vào túi áo, quần 1 cách dễ dàng hơn so với các dòng điện thoại trước.
                                    Tấm OLED Super Retina được trang bị cho chiếc điện thoại này mang đến những hình ảnh
                                    có màu sắc sống động
                                    và chân thực đến từng chi tiết, không xảy ra tính trạng bị nhỏe màu sắc.</p>
                                <div class="">
                                    <img style="width: 100%;"
                                        src="https://cdn.nguyenkimmall.com/images/companies/_1/vien-thong/iphone/iphone-12-mini/iphone-12-mini/dien-thoai-iphone-12-mini-64gb-do-man-hinh-sieu-sac-net.jpg"
                                        alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <button id="show-more" onclick="mysline()">Đọc thêm</button>
                    <script>
                    var content = document.getElementById("content");
                    var button = document.getElementById("show-more");
                    button.onclick = function() {
                        console.log("Show more clicked!!!");
                        if (content.className == "open") {
                            content.className = "";
                            button.innerHTML = "Đọc thêm";
                        } else {
                            content.className = "open";
                            button.innerHTML = "Đóng";
                        }
                    };
                    </script>


                </div>
                <?php
		$get_product_details = $product->get_details($id);
		if($get_product_details){
			while($result_details = $get_product_details->fetch_assoc()){
		?>
                <div class="cauhinh">
                    <h2>Cấu hình <?php echo $result_details['productName']?></h2>
                    <div class="parameter">
                        <ul>
                            <li>
                                <p class="lileft">Màn hình :</p>
                                <div class="liright">
                                    <span><?php echo $result_details['Manhinh']?></span>
                                </div>
                            </li>
                            <li>
                                <p class="lileft">Hệ điều hành:</p>
                                <div class="liright">
                                    <span><?php echo $result_details['HDH']?></span>
                                </div>
                            </li>
                            <li>
                                <p class="lileft">Camera sau:</p>
                                <div class="liright">
                                    <span><?php echo $result_details['Camerasau']?></span>
                                </div>
                            </li>
                            <li>
                                <p class="lileft">Camera trước :</p>
                                <div class="liright">
                                    <span><?php echo $result_details['Cameratruoc']?></span>
                                </div>
                            </li>
                            <li>
                                <p class="lileft">Chip :</p>
                                <div class="liright">
                                    <span><?php echo $result_details['Chip']?></span>
                                </div>
                            </li>
                            <li>
                                <p class="lileft">Ram :</p>
                                <div class="liright">
                                    <span><?php echo $result_details['Ram']?></span>
                                </div>
                            </li>
                            <li>
                                <p class="lileft">Rom :</p>
                                <div class="liright">
                                    <span><?php echo $result_details['Rom']?></span>
                                </div>
                            </li>
                            <li>
                                <p class="lileft">Sim :</p>
                                <div class="liright">
                                    <span><?php echo $result_details['Sim']?></span>
                                </div>
                            </li>
                            <li>
                                <p class="lileft">Pin,sạc :</p>
                                <div class="liright">
                                    <span><?php echo $result_details['Pin']?>,<?php echo $result_details['Sac']?></span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <?php
			}
		}
		?>
            </div>
        </div>
        <style>
        p {
            color: #000;
        }
        </style>
        <div class="content_bottom">
            <div class="heading">
                <h3>Sản phẩm có liên quan</h3>
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
                <a href="details.php?proid=<?php echo $result_new['productId'] ?>"><img class="image"
                        src="admin/uploads/<?php echo $result_new['image'] ?>" alt="" /></a>
                <h3 class="product-name">
                    <ins style="font-size: 20px; margin-right: 20px;">VIVO</ins>
                    <a
                        href="details.php?proid=<?php echo $result_new['productId'] ?>"><?php echo $result_new['productName'] ?></a>
                </h3>
                <div class="product-price vat">
                    <span>
                        <del
                            style="margin-left: 20px;"><?php echo $fm->format_currency($result_new['price_promotion'])." "."VNĐ" ?></del>
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
                            <p>Rom : <?php echo $resultphone['Rom'] ?></p>
                        </div>

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

        <div class="comment_cus" style="width: 59.13%;">
            <div class="binhluan">
                <div class="row" style="margin:0px;">
                    <div class="col-comment">
                        <h5>Bình luận sản phẩm</h5><?php
              if(isset($insertBinhluan)){
                echo $insertBinhluan;
              } 
              $timestamp = time();
              ?>
                        <form action method="POST">
                            <input type="hidden" name="productid" value="<?php echo $id?>" />
                            <input type="hidden" name="time" value="<?php echo $timestamp?>" />
                            <textarea rows="5" style="resize: none;" placeholder="Bình luận...." class="form-control"
                                name="binhluansp"></textarea>
                            <?php $login_check = Session::get('customer_login'); 
                  if($login_check){
                    echo '<input type="submit" name="binhluansanpham" class="btn btn-success" value="Gửi bình luận"/>';
                  }else{
                    echo '<a href="login.php"><h4>Mời đăng nhập hệ thống</h4></a>';
                  }
                ?>
                        </form>

                    </div>
                    <?php
                }
              }
              ?>
                    <!-- <?php
              $product_new = $cs->show_comment($id); 
              if($product_new){ while($result_new = $product_new->fetch_assoc()){?>
              <span>Tổng số bình luận <?php $result_new['tong']?></span>
              <?php }
              }?> -->
                    <style>
                    .media-list .media img {
                        width: 64px;
                        height: 64px;
                        border: 2px solid #e5e7e8;
                    }

                    .media {
                        line-height: 38px;
                    }

                    .media-body {
                        margin-left: 20px;
                    }

                    .media-list {
                        width: 100%;

                    }

                    li.media.adm {
                        margin-left: 80px;
                    }
                    </style>
                    <?php
              function tinhtime($timebl){
                $phut=round($timebl/60);
                $gio=round($phut/60);
                $ngay=round($gio/24);
                $thang=round($ngay/30);
                $nam=round  ($ngay/365);
                if($timebl>0 && $timebl<60){
                  return $timebl.'Giây trước';
                }
                elseif($timebl>60 && $timebl<3600){
                  return $phut.' Phút trước';
                }else if($phut>=60 && $phut<1440){
                  return $gio.' Giờ trước';
                }else if($gio>=24 && $gio<=720){
                  return $ngay.' Ngày trước';
                }else if($ngay>30 && $ngay<365){
                  return $thang.' Tháng trước';
                }
                else{
                  return $nam.'Năm trước';
                }
              }
              $i=0;
              $product_new = $cs->show_comment($id); 
              $date = getdate();
              date_default_timezone_set('Asia/Ho_Chi_Minh');
              $timestamp = time();
              if($product_new){ while($result_new = $product_new->fetch_assoc()){ 
                    $i++;
                    if($result_new['tgbinhluan']==0){

                    }else{
                      $thoigian=$timestamp- $result_new['tgbinhluan'];
                      $time1=tinhtime($thoigian);
              ?>
                    <ul class="media-list">
                        <li class="media">
                            <a href="#" class="pull-left">
                                <img src="https://bootdey.com/img/Content/user_1.jpg" alt="" class="img-circle">
                            </a>
                            <div class="media-body">
                                <span class="text-muted pull-right">
                                    <small class="text-muted"><?php echo $time1 ?></small>
                                </span>
                                <strong class="text-success"><?php echo $result_new['Tenkhachhang'] ?></strong>
                                <p class="textdemo"><?php echo $result_new['binhluan'] ?></p>
                            </div>
                        </li>
                        <?php 
                    if($result_new['binhluan_admin'] ==""){
                    }else{
                    ?>
                        <li class="media adm">
                            <a href="#" class="pull-left">
                                <img src="https://bootdey.com/img/Content/user_1.jpg" alt="" class="img-circle">
                            </a>
                            <div class="media-body">
                                <span class="text-muted pull-right">
                                    <small class="text-muted"></small>
                                </span>
                                <strong class="text-success">Cửa hàng PSD</strong>
                                <p class="textdemo"><?php echo $result_new['binhluan_admin'] ?></p>
                            </div>
                        </li>
                    </ul>
                    <?php }
              }
            }
              }?>
                    <div class="number">
                        <p><?php echo 'Tổng số bình luận'.' :'.$i;
              ?></p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div><?php 
	include 'inc/footer.php';
	ob_flush();
 ?>