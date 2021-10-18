<?php 
	include 'inc/header.php';
	include 'inc/slider.php';
?>
<?php
	if(!isset($_GET['catid']) || $_GET['catid']==NULL){
       echo "<script>window.location ='404.php'</script>";
    }else{
        $id = $_GET['catid']; 
    }
    
    // if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //     $catName = $_POST['catName'];
    //     $updateCat = $cat->update_category($catName,$id);
        
    // }
?>
 <div class="main">
	 
    <div class="content">
    	<?php
	     	 $tong=0;
            $name_cat1 = $cat->get_name_by_sum($id);
            if($name_cat1){
                
                while($result_demo = $name_cat1->fetch_assoc()){
                 $tong++;
                }}
            ?>
           <?php
             $name_cat = $cat->get_name_by_cat($id);
	      	 if($name_cat){
	      	 	while($result_name = $name_cat->fetch_assoc()){
                    
	      	?>
    		<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.php">Home</a></li>
					<li class="breadcrumb-item active" aria-current="page"> <?php echo $result_name['catName'] ?></li>
				</ol>
			</nav>
    		<div class="clear"></div>
    	
			<div class="head_boloc">
                <div class="boloc">
                    <p class="boloc_p" style="color:#000;">Có <?php echo $tong?> sản phẩm</p>
                    <div class="check_gia">
                        <div class="options">
                            <label class="container-checkbox">
                                <a rel="nofollow" href="">Dưới 5 triệu <input type="checkbox"><span class="checkmark"></span></a></label>
                            <label class="container-checkbox">
                                <a rel="nofollow" href="">Từ 5 đến 10 triệu <input type="checkbox"> <span class="checkmark"></span></a>
                            </label>
                            <label class="container-checkbox">
                                <a rel="nofollow" href="">Từ 10 đến 20 triệu <input type="checkbox" checked=""><span class="checkmark"></span></a>
                            </label>
                            <label class="container-checkbox">
                                <a rel="nofollow" href="">Trên 20 triệu <input type="checkbox"><span class="checkmark"></span></a>
                            </label>
                        </div>
                    </div>
                    <div class="link_boloc">
                        <div class="a_boloc"><button class="dropbtn1" onclick="myFunction1()">Bộ lọc</button></div>
                        <div class="a_boloc">
                            <button type="button" class="dropbtn" onclick="myFunction()"> <span>Sắp xếp theo</span></button>
                            <div id="sort-dropdown" class="dropdown-content">
                                <a rel="nofollow" href="?catid=<?php echo $result_name['catId'] ?>&&actionid=hmv">Hàng mới về</a>
                                <a rel="nofollow" href="?catid=<?php echo $result_name['catId'] ?>&&actionid=AZ">A =&gt; Z</a>
                                <a rel="nofollow" href="?catid=<?php echo $result_name['catId'] ?>&&actionid=ZA">Z =&gt; A</a>
                                <a rel="nofollow" href="?catid=<?php echo $result_name['catId'] ?>&&actionid=tang">Giá tăng dần</a>
                                <a rel="nofollow" href="?catid=<?php echo $result_name['catId'] ?>&&actionid=giam">Giá giảm dần</a>
                            </div>
							<?php
			}}
			?>
                            <script>
                                function myFunction() {
                                    document.getElementById("sort-dropdown").classList.toggle("show");
                                }

                                // Close the dropdown if the user clicks outside of it
                                window.onclick = function (event) {
                                    if (!event.target.matches('.dropbtn')) {
                                        var dropdowns = document.getElementsByClassName("dropdown-content");
                                        var i;
                                        if (dropdowns != null) {
                                            for (i = 0; i < dropdowns.length; i++) {
                                                var openDropdown = dropdowns[i];
                                                if (openDropdown.classList.contains('show')) {
                                                    openDropdown.classList.remove('show');
                                                }
                                            }
                                        }
                                    }
                                }
                            </script>
                        </div>
                    </div>
                </div>
				
                <div id="filter-box" class="filter-content .active">
                    <div class="filter-feature">
                        <div class="filter-title">Tính năng</div>
                        <div class="options">
                            <label class="container-checkbox">
                                <a rel="nofollow" href="">
                                    2 SIM <input type="checkbox">
                                    <span class="checkmark"></span>
                                </a>
                            </label>
                            <label class="container-checkbox">
                                <a rel="nofollow" href="">
                                    Bảo mật vân tay <input type="checkbox">
                                    <span class="checkmark"></span>
                                </a>
                            </label>
                            <label class="container-checkbox">
                                <a rel="nofollow" href="">
                                    Chuyên self <input type="checkbox">
                                    <span class="checkmark"></span>
                                </a>
                            </label>
                            <label class="container-checkbox">
                                <a rel="nofollow" href="">
                                    Hỗ trợ 4G <input type="checkbox">
                                    <span class="checkmark"></span>
                                </a>
                            </label>
                            <label class="container-checkbox">
                                <a rel="nofollow" href="">
                                    Pin khủng(&gt;3000 mAh) <input type="checkbox">
                                    <span class="checkmark"></span>
                                </a>
                            </label>
                        </div>
                    </div>
                    <div class="filter-feature">
                        <div class="filter-title">Bộ nhớ</div>
                        <div class="options">
                            <label class="container-checkbox">
                                <a rel="nofollow" href="">
                                    2 GB <input type="checkbox">
                                    <span class="checkmark"></span>
                                </a>
                            </label>
                            <label class="container-checkbox">
                                <a rel="nofollow" href="">
                                    4 GB <input type="checkbox">
                                    <span class="checkmark"></span>
                                </a>
                            </label>
                            <label class="container-checkbox">
                                <a rel="nofollow" href="">
                                    8 GB <input type="checkbox">
                                    <span class="checkmark"></span>
                                </a>
                            </label>
                            <label class="container-checkbox">
                                <a rel="nofollow" href="">
                                    16 GB <input type="checkbox">
                                    <span class="checkmark"></span>
                                </a>
                            </label>
                            <label class="container-checkbox">
                                <a rel="nofollow" href="">
                                    32 GB <input type="checkbox">
                                    <span class="checkmark"></span>
                                </a>
                            </label>
                        </div>
                    </div>
                </div>
                <script>
                    function myFunction1() {
                        document.getElementById("filter-box").classList.toggle("active");
                    }

                    // Close the dropdown if the user clicks outside of it
                    window.onclick = function (event) {
                        if (!event.target.matches('.dropbtn1')) {
                            var dropdownss = document.getElementsByClassName("filter-content");
                            var i;
                            for (i = 0; i < dropdownss.length; i++) {
                                var openDropdown1 = dropdownss[i];
                                if (openDropdown1.classList.remove('active')) {
                                    openDropdown1.classList.contains('active');
                                }
                            }
                        }
                    }
                </script>
            </div>
			<div class="section group">
			<?php
			if(isset($_GET['actionid']) ){
				if( $_GET['actionid']=='hmv'){

					$productbycat=$cat->getproductdt_new($id);
		
				}else if($_GET['actionid']=='AZ'){
		
					$productbycat=$cat->getproductdtAZ($id);
		
				}else if($_GET['actionid']=='ZA'){
		
					$productbycat=$cat->getproductdtZA($id);
		
				}else if( $_GET['actionid']=='tang'){
		
					$productbycat=$cat->getproductdttang($id);
		
				}else if($_GET['actionid']=='giam'){
					$productbycat=$cat->getproductdtgiam($id);
				}
			}else{
					$productbycat = $cat->get_product_by_cat($id);
				}
	      	 if($productbycat){
	      	 	while($result = $productbycat->fetch_assoc()){
	      	?>
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

		}else{
			echo 'Danh mục hiện tại chưa có sản phẩm';
		}
			?>
        </div>
		 <div class="btn12">
				<style>
					a.phantrang:hover{
						background: #f59f6d; 
						color: #fff;
					}
					.btn12 p{
						margin-bottom:30px;
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
				$product_button = ceil($product_count/12);
				$i = 1;
				echo '<p>Trang </p>';
				for($i=1;$i<=$product_button;$i++){
					?>
					<a class="phantrang" <?php if($i==$trang){ echo 'style="background:orange"';} ?> style="margin:0 10px;" href="index.php?trang=<?php echo $i ?>"><span><?php echo $i ?></span></a>	
					<?php
				}
				?>
			</div>
    </div>
 </div>

<?php 
	include 'inc/footer.php';
	
 ?>


