<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php
$brand = new brand();
if (isset($_GET['delid'])) {
    $id = $_GET['delid'];
    $delbrand = $brand->del_brand($id);
}
?>
<div class="grid_10">

    <div class="box round first grid">
        <h2>admin </h2>
        <button class="custom-btn btn-4 btn4_demo" onclick="openNav()">Tạo tài khoản</button>
        <div class="container1" id="myNav">
            <div class="title">Đăng kí<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            </div>
            <div class="content">
                <form action="#" method="post">
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">Họ và tên</span>
                            <input type="text" name="name" placeholder="Enter your name" required>
                        </div>
                        <div class="input-box">
                            <div class="gender-details" style="width: 150px;">
                                <input type="radio" name="gender" id="dot-1" value="0">
                                <input type="radio" name="gender" id="dot-2" value="1">
                                <span class="gender-title">Giới tính</span>
                                <div class="category">
                                    <label for="dot-1">
                                        <span class="dot one"></span>
                                        <span class="gender" name="gioitinh">Nam</span>
                                    </label>
                                    <label for="dot-2">
                                        <span class="dot two"></span>
                                        <span class="gender" name="gioitinh">Nữ</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="input-box">
                            <span class="details">Ngày sinh</span>
                            <input type="date" name="date" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Tài khoản</span>
                            <input type="text" name="taikhoan" placeholder="Enter your username" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Số điện thoại</span>
                            <input type="text" name="phone" placeholder="Enter your number" required>
                        </div>

                        <div class="input-box">
                            <span class="details">Mật khẩu</span>
                            <input type="password" name="password1" placeholder="Enter your password" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Chức vụ</span>
                            <select name="level" id="select_level" required>
                                <option value="0">Nhân viên</option>
                                <option value="1">Quản lý</option>
                                <option value="2">Quản trị viên</option>
                            </select>
                        </div>
                        <div class="input-box">
                            <span class="details">Nhập lại mật khẩu</span>
                            <input type="password" name="password2" placeholder="Confirm your password" required>
                        </div>





                    </div>
            </div>
            <div class="custom-btn btn-4">
                <input class="btn-4" type="submit" name="submit" value="Đăng kí">
            </div>
        </div>

        </form>
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
                        <th>Tên nhân viên</th>
                        <th>Email</th>
                        <th></th>
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
                        <td><a href="brandedit.php?brandid=<?php echo $result['brandId'] ?>">Sửa</a> || <a
                                onclick="return confirm('Bạn có muốn xóa không ?')"
                                href="?delid=<?php echo $result['brandId'] ?>">Xóa</a></td>
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
    document.getElementById("myNav").style.width = "1400px";
    document.getElementById("myNav").style.height = "60%";
    document.getElementById("myNav").style.padding = "25px 30px";
}

function closeNav() {
    document.getElementById("myNav").style.width = "0%";
    document.getElementById("myNav").style.height = "0%";
    document.getElementById("myNav").style.padding = "0px";
}
</script>
<?php include 'inc/footer.html'; ?>