<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/product.php';?>
<?php
	$product = new product();
	if(isset($_GET['type_slider']) && isset($_GET['type'])){
		$id = $_GET['type_slider'];
		$type = $_GET['type'];
		$update_type_slider = $product->update_type_slider($id,$type);

	}
	if(isset($_GET['slider_del'])){
		$id = $_GET['slider_del'];
		
		$del_slider = $product->del_slider($id);

	}
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['Luu'])) {
		$id = $_GET['slider_update'];
		$update_slider = $product->update_slider($_POST, $_FILES,$id);

	}
?>
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        $insertSlider = $product->insert_slider($_POST, $_FILES);  
    }
?>
<div id="myNav" class="overlay1">
    <h2>Thêm hình ảnh<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a></h2>
    <div class="overlay-content">
        <div class="block">

            <form action="sliderlist.php" method="post" enctype="multipart/form-data">
                <table class="form">
                    <tr>
                        <td>
                            <label>Tên sản phẩm</label>
                        </td>
                        <td>
                            <input type="text" name="sliderName" placeholder="Nhập slider..." class="medium" />
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label>Tải hình ảnh</label>
                        </td>
                        <td>
                            <input type="file" name="image" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Loại</label>
                        </td>
                        <td>
                            <select name="type">
                                <option value="1">On</option>
                                <option value="0">Off</option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" value="Lưu" />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Danh sách Slider
            <div class="button_submit">
                <button class="button_demo" onclick="openNav()">Thêm</button>
            </div>
        </h2>
        <div class="block">
            <?php
    if(isset($insertSlider)){
        echo $insertSlider;
    }
    ?>
            <?php
        if(isset($del_slider)){
        	echo $del_slider;
        }
        ?>
            <table class="data display datatable" id="example">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên sản phẩm</th>
                        <th>Hình ảnh</th>
                        <th>Loại</th>
                        <th>Hoạt động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
					$product = new product();
					$get_slider = $product->show_slider_list();
					if($get_slider){
						$i = 0;
						while($result_slider = $get_slider->fetch_assoc()){
							$i++;
						?>
                    <tr class="odd gradeX">
                        <td><?php echo $i; ?></td>
                        <td><?php echo $result_slider['sliderName'] ?></td>
                        <td><img src="uploads/<?php echo $result_slider['slider_image'] ?>" height="120px"
                                width="500px" /></td>
                        <td>
                            <?php
						if($result_slider['type']==1){
						?>
                            <a class="custom-btn btn-3"
                                href="?type_slider=<?php echo $result_slider['sliderId'] ?>&type=0">Off</a>
                            <?php
						 }else{
						?>
                            <a class="custom-btn btn-4"
                                href="?type_slider=<?php echo $result_slider['sliderId'] ?>&type=1">On</a>
                            <?php
						}
						?>

                        </td>
                        <td>
                            <button class="custom-btn btn-5" href="?slider_del=<?php echo $result_slider['sliderId'] ?>"
                                onclick="return confirm('Are you sure to Delete!');">Delete</button>
                            <!-- <a class="sua" href="?slider_update=<?php echo $result_slider['sliderId'] ?> ">Update</a> -->
                        </td>
                    </tr>
                    <?php
							}
						}

						 ?>
                </tbody>
            </table>

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
<script>
function openNav() {
    document.getElementById("myNav").style.width = "60%";
    document.getElementById("myNav").style.height = "400px";
}

function closeNav() {
    document.getElementById("myNav").style.width = "0%";
    document.getElementById("myNav").style.height = "0%";
}
</script>
<?php include 'inc/footer.html';?>