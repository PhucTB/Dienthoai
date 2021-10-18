<?php include '../classes/brand.php' ?>
<?php
$brand = new brand();
$id = Session::get('adminId');
$check = $brand->showlogin($id);
?>
<?php
$check = $brand->showlogin($id);
if ($check) {
    while ($result = $check->fetch_assoc()) {

?>
<div class="grid_2">
    <div class="box sidemenu">
        <div class="block" id="section-menu">
            <ul class="section menu">
                <?php if ($result['level'] == 2) {
                        ?>

                <li><a class="submenu" href="sliderlist.php">Slider</a>
                    <!-- <ul class="submenu">
                        <li><a href="slideradd.php">Thêm slider</a> </li>
                        <li><a href="sliderlist.php">Tất cả slider</a> </li>
                    </ul> -->
                </li>
                <li><a class="submenu" href="catlist.php">Danh mục sản phẩm</a>
                    <!-- <ul class="submenu">
                        <li><a href="catadd.php">Thêm danh mục</a> </li>
                        <li><a href="catlist.php">Danh sách sản phẩm</a> </li>
                    </ul> -->
                </li>
                <li><a href="brandlist.php" class="submenu">Thương hiệu sản phẩm</a>
                    <!-- <ul class="submenu">
                        <li><a href="brandadd.php">Thêm thương hiệu</a> </li>
                        <li><a href="brandlist.php">Danh sách thương hiệu</a> </li>
                    </ul> -->
                </li>
                <li><a href="khachhang.php" class="submenu">Quản lý Khách hàng</a>
                    <!-- <ul class="submenu">
                        <li><a href="khachhang.php">Danh sách khách hàng</a></li>
                    </ul> -->
                </li>
                <li><a class="submenu" href="productlist.php">Sản phẩm</a>
                    <!-- <ul class="submenu">
                        <li><a href="productadd.php">Thêm sản phẩm</a> </li>
                        <li><a href="productlist.php">Liệt kê sản phẩm</a> </li>
                    </ul> -->
                </li>
                <li><a class="submenu" href="tkadmin.php">Admin</a>
                    <!-- <ul class="submenu">
                        <li><a href="tkadmin.php">Thông tin</a> </li>
                    </ul> -->
                </li>
                <li><a class="submenu" href="inbox.php">Đơn hàng</a>
                    <!-- <ul class="submenu">
                        <li><a href="inbox.php">Liệt kê đơn hàng</a> </li>
                    </ul> -->
                </li>
                <li><a href="Hoadon.php">Hóa đơn</a>
                </li>
                <li><a class="submenu" href="commentlist.php">Bình luận</a>
                    <!-- <ul class="submenu">
                        <li><a href="commentlist.php">Liệt kê bình luận</a> </li>
                      
                    </ul> -->
                </li>
                <!-- <li><a class="submenu" href="Baocaodoanhthu.php">Báo cáo doanh thu</a>
                     <ul class="submenu">
                        <li><a href="Baocaodoanhthu.php">Lợi nhuận</a></li>
                        <li><a href="doanhthu.php">Doanh thu sản phẩm</a> </li>
                        <li><a href="tonkho.php">Báo cáo tồn kho</a> </li>
                    </ul>
                </li> -->
                <?php
                        } ?>
                <?php
                        if ($result['level'] == 1) {
                        ?>
                <li><a class="submenu" href="sliderlist.php">Slider</a>
                    <!-- <ul class="submenu">
                        <li><a href="slideradd.php">Thêm slider</a> </li>
                        <li><a href="sliderlist.php">Tất cả slider</a> </li>
                    </ul> -->
                </li>
                <li><a class="submenu" href="catlist.php">Danh mục sản phẩm</a>
                    <!-- <ul class="submenu">
                        <li><a href="catadd.php">Thêm danh mục</a> </li>
                        <li><a href="catlist.php">Danh sách sản phẩm</a> </li>
                    </ul> -->
                </li>
                <li><a href="brandlist.php" class="submenu">Thương hiệu sản phẩm</a>
                    <!-- <ul class="submenu">
                        <li><a href="brandadd.php">Thêm thương hiệu</a> </li>
                        <li><a href="brandlist.php">Danh sách thương hiệu</a> </li>
                    </ul> -->
                </li>
                <li><a href="khachhang.php" class="submenu">Quản lý Khách hàng</a>
                    <!-- <ul class="submenu">
                        <li><a href="khachhang.php">Danh sách khách hàng</a></li>
                    </ul> -->
                </li>
                <li><a class="submenu" href="productlist.php">Sản phẩm</a>
                    <!-- <ul class="submenu">
                        <li><a href="productadd.php">Thêm sản phẩm</a> </li>
                        <li><a href="productlist.php">Liệt kê sản phẩm</a> </li>
                    </ul> -->
                </li>
                <!-- <li><a class="menuitem">Admin</a>
                    <ul class="submenu">
                        <li><a href="tkadmin.php">Thông tin</a> </li>
                        <li><a href="changepassword.php">Đổi mật khẩu</a> </li>
                    </ul>
                </li> -->
                <li><a class="submenu" href="inbox.php">Đơn hàng</a>
                    <!-- <ul class="submenu">
                        <li><a href="inbox.php">Liệt kê đơn hàng</a> </li>
                    </ul> -->
                </li>
                <li><a href="Hoadon.php">Hóa đơn</a>
                </li>
                <!-- <li><a class="submenu" href="commentlist.php">Bình luận</a>
                    <ul class="submenu">
                        <li><a href="commentlist.php">Liệt kê bình luận</a> </li>
                      
                    </ul>
                </li> -->
                <!-- <li><a class="menuitem">Báo cáo</a>
                    <ul class="submenu">
                        <li><a href="Baocaodoanhthu.php">Lợi nhuận</a></li>
                        <li><a href="doanhthu.php">Doanh thu sản phẩm</a> </li>
                        <li><a href="tonkho.php">Báo cáo tồn kho</a> </li>
                    </ul>
                </li> -->
                <?php
                        }
                        ?>
                <?php
                        if ($result['level'] == 0) {
                        ?>
                <li><a class="submenu" href="catlist.php">Danh mục sản phẩm</a>
                    <!-- <ul class="submenu">
                        <li><a href="catadd.php">Thêm danh mục</a> </li>
                        <li><a href="catlist.php">Danh sách sản phẩm</a> </li>
                    </ul> -->
                </li>
                <li><a href="khachhang.php" class="submenu">Quản lý Khách hàng</a>
                    <!-- <ul class="submenu">
                        <li><a href="khachhang.php">Danh sách khách hàng</a></li>
                    </ul> -->
                </li>
                <li><a class="submenu" href="productlist.php">Sản phẩm</a>
                    <!-- <ul class="submenu">
                        <li><a href="productadd.php">Thêm sản phẩm</a> </li>
                        <li><a href="productlist.php">Liệt kê sản phẩm</a> </li>
                    </ul> -->
                </li>
                <li><a class="submenu" href="inbox.php">Đơn hàng</a>
                    <!-- <ul class="submenu">
                        <li><a href="inbox.php">Liệt kê đơn hàng</a> </li>
                    </ul> -->
                </li>
                <li><a href="Hoadon.php">Hóa đơn</a>
                </li>
                <li><a class="submenu" href="commentlist.php">Bình luận</a>
                    <!-- <ul class="submenu">
                        <li><a href="commentlist.php">Liệt kê bình luận</a> </li>
                      
                    </ul> -->
                </li>
                <?php
                        }
                        ?>
                <?php
                } ?>

            </ul>
        </div>
    </div>
</div>
<?php
}
    ?>