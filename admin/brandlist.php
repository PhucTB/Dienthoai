<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php
$brand = new brand();
if (isset($_GET['delid'])) {
    $id = $_GET['delid'];
    $delbrand = $brand->del_brand($id);
}
?>
<div id="myNav" class="overlay1">
    <h2>Them thuong hieu<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a></h2>

    <div class="overlay-content">
        <form action="" method="post">
            <input type="text" name="brandName" placeholder="Thêm thương hiệu sản phẩm..." class="medium" />
            <input type="submit" name="submit" Value="Save" />
        </form>
    </div>
</div>
<div class="grid_10">

    <div class="box round first grid">
        <h2>Thương hiệu
            <div class="button_submit">
                <button class="button_demo" onclick="openNav()">Thêm</button>
            </div>
        </h2>
        <div class="block">
            <?php

            if (isset($delbrand)) {
                echo $delbrand;
            }

            ?>
            <table class="data display datatable" id="example">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên hãng</th>
                        <th>Cài đặt</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $show_brand = $brand->show_brand();
                    if ($show_brand) {
                        $i = 0;
                        while ($result = $show_brand->fetch_assoc()) {
                            $i++;

                    ?>
                    <tr class="odd gradeX">
                        <td><?php echo $i; ?></td>
                        <td><?php echo $result['brandName'] ?></td>
                        <td><button class="custom-btn btn-4"
                                href="brandedit.php?brandid=<?php echo $result['brandId'] ?>">Update</button>||<button
                                class="custom-btn btn-5" onclick="return confirm('Bạn có muốn xóa không ?')"
                                href="?delid=<?php echo $result['brandId'] ?>">Delete</button></td>
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
    document.getElementById("myNav").style.width = "50%";
    document.getElementById("myNav").style.height = "200px";
}

function closeNav() {
    document.getElementById("myNav").style.width = "0%";
    document.getElementById("myNav").style.height = "0%";
}
</script>
<?php include 'inc/footer.html'; ?>