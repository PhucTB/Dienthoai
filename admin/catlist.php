<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php' ?>
<?php
    $cat = new category();
     if(isset($_GET['delid'])){
        $id = $_GET['delid']; 
        $delcat = $cat->del_category($id);
    }
	
?>
<?php
    $cat = new category();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $catName = $_POST['catName'];
        $insertCat = $cat->insert_category($catName);
        
    }
?>
<div id="myNav" class="overlay1">
    <h2>Thêm danh mục <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a></h2>
    <div class="overlay-content">
        <?php
                if(isset($insertCat)){
                    echo $insertCat;
                }
                ?>
        <form action="catlist.php" method="post">
            <table class="form">
                <tr>
                    <td>
                        <input type="text" name="catName" placeholder="Làm ơn thêm danh mục sản phẩm..."
                            class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="submit" Value="Save" />
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Danh sách sản phẩm
            <div class="button_submit">
                <button class="button_demo" onclick="openNav()">Thêm</button>
            </div>
        </h2>
        <div class="block">
            <?php

                if(isset($delcat)){
                    echo $delcat;
                }

                ?>
            <table class="data display datatable" id="example">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên sản phẩm</th>
                        <th>Hoạt động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
						$show_cate = $cat->show_category();
						if($show_cate){
							$i = 0;
							while($result = $show_cate->fetch_assoc()){
								$i++;
							
					?>
                    <tr class="odd gradeX">
                        <td><?php echo $i; ?></td>
                        <td><?php echo $result['catName'] ?></td>
                        <td><button class="custom-btn btn-4"
                                href="catedit.php?catid=<?php echo $result['catId'] ?>">Update</button> ||
                            <button class="custom-btn btn-5" onclick="return confirm('Are you want to delete?')"
                                href="?delid=<?php echo $result['catId'] ?>">Delete</button>
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
    document.getElementById("myNav").style.height = "300px";
}

function closeNav() {
    document.getElementById("myNav").style.width = "0%";
    document.getElementById("myNav").style.height = "0%";
}
</script>
<?php include 'inc/footer.html';?>