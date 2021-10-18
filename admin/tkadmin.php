<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php
$brand = new brand();
if (isset($_GET['delid'])) {
    $id = $_GET['delid'];
    $deladmin = $brand->del_admin($id);
}
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $insertadmin = $brand->insert_admin($_POST, $_FILES);
}
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit1'])) {
    $id = $_POST['adminId'];
    $level = $_POST['level'];
    $updatetadmin = $brand->update_admin($id, $level);
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
                <?php
                if (isset($insertadmin)) {
                    echo $insertadmin;
                }
                ?>
                <form action="#" method="post">
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">Họ và tên</span>
                            <input type="text" name="adminName" placeholder="Enter your name" required>
                        </div>
                        <div class="input-box">
                            <div class="gender-details" style="width: 150px;">
                                <input type="radio" name="Gioitinh" id="dot-1" value="0">
                                <input type="radio" name="Gioitinh" id="dot-2" value="1">
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
                            <input type="date" name="Ngaysinh" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Tài khoản</span>
                            <input type="text" name="adminUser" placeholder="Enter your username" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Số điện thoại</span>
                            <input type="text" name="SDT" placeholder="Enter your number" required>
                        </div>

                        <div class="input-box">
                            <span class="details">Mật khẩu</span>
                            <input type="password" name="adminPass" placeholder="Enter your password" required>
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
                            <input type="password" name="adminPass1" placeholder="Confirm your password" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Email</span>
                            <input type="email" name="adminEmail" placeholder="@gmail.com" required>
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
            if (isset($deladmin)) {
                echo $deladmin;
            }
            ?>

            <table class="data display datatable" id="example">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên nhân viên</th>
                        <th>Email</th>
                        <th>Chức vụ</th>
                        <th>Chọn</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $show_brand = $brand->show_admin();
                    if ($show_brand) {
                        $i = 0;
                        while ($result = $show_brand->fetch_assoc()) {
                            $i++;
                    ?>
                    <tr class="odd gradeX">
                        <td><?php echo $i; ?></td>
                        <td><?php echo $result['adminName'] ?></td>
                        <td><?php echo $result['adminEmail'] ?></td>
                        <td><?php if ($result['level'] == 0) {
                                        echo 'Nhân viên';
                                    } else if ($result['level'] == 1) {
                                        echo 'Quản lý';
                                    } else if ($result['level'] == 2) {
                                        echo 'Quản trị viên';
                                    } ?></td>
                        <td>
                            <a class="custom-btn btn-4"
                                href="tkadmin.php?adminId=<?php echo $result['adminId'] ?>">Chọn</a>
                        </td>
                        <td><button class="custom-btn btn-4" onclick="openadmin()"
                                href="tkadmin.php?adminId=<?php echo $result['adminId'] ?>">Sửa</button> || <a
                                class="custom-btn btn-5" onclick="return confirm('Bạn có muốn xóa không ?')"
                                href="?delid=<?php echo $result['adminId'] ?>">Xóa</a></td>
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
<script>
function openadmin() {
    document.getElementById("myadmin").style.width = "1400px";
    document.getElementById("myadmin").style.height = "40%";
    document.getElementById("myadmin").style.padding = "25px 30px";
}

function closeadmin() {
    document.getElementById("myadmin").style.width = "0%";
    document.getElementById("myadmin").style.height = "0%";
    document.getElementById("myadmin").style.padding = "0px";
}
</script>
<div class="container1" id="myadmin">
    <div class="title">Sửa thông tin<a href="javascript:void(0)" class="closebtn" onclick="closeadmin()">&times;</a>
    </div>
    <div class="content">
        <?php
        if (isset($updatetadmin)) {
            echo $updatetadmin;
        }
        ?>
        <form action="#" method="post">
            <?php
            $id = $_GET['adminId'];
            $get_admin_id = $brand->show_admin_tt($id);
            if ($get_admin_id) {
                while ($result = $get_admin_id->fetch_assoc()) {
                    $i++;
            ?>
            <div class="user-details">
                <div class="input-box">
                    <span class="details">Họ và tên</span>
                    <input type="text" name="adminName" placeholder="Enter your name" required
                        value=" <?php echo $result['adminName'] ?>">
                    <input type="hidden" name="adminId" placeholder="Enter your name" required
                        value=" <?php echo $result['adminId'] ?>">
                </div>
                <div class="input-box">
                    <span class="details">Chức vụ</span>
                    <select name="level" id="select_level" required>
                        <?php if ($result['level'] == 0) { ?>
                        <option value="0">Nhân viên</option>
                        <option value="1">Quản lý</option>
                        <?php
                                } else if ($result['level'] == 1) { ?>
                        <option value="1">Quản lý</option>
                        <option value="0">Nhân viên</option>
                        <?php
                                }
                                ?>
                    </select>
                </div>
            </div>
    </div>
    <div class="custom-btn btn-4">
        <input class="btn-4" type="submit" name="submit1" value="Sửa">
    </div>
</div>
<?php }
            }
?>
</form>
<?php include 'inc/footer.html'; ?>