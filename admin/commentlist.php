<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classes/category.php'; ?>
<?php include '../classes/product.php'; ?>
<?php include '../classes/customer.php'; ?>
<?php include_once '../helpers/format.php'; ?>
<?php
$cs = new customer();
$fm = new Format();
if (isset($_GET['binhluanid'])) {
    $id = $_GET['binhluanid'];
    $delcomment = $cs->del_comment($id);
}
if (isset($_GET['binhluan'])) {
    $id_bl = $_GET['binhluan'];
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
        $binhluanad = $_POST['adminbl'];
        $updatecomment = $cs->update_comment($id_bl, $binhluanad);
    }
}

?>
<div id="myNav" class="overlay1">
    <h2 style="text-align: center;">Trả lời khách hàng<a href="javascript:void(0)" class="closebtn"
            onclick="closeNav()">&times;</a></h2>
    <div class="overlay-content">
        <div class="block">
            <?php
            if (isset($updatecomment)) {
                echo $updatecomment;
            }
            ?>
            <?php

            $cmlist = $cs->show_adminid($id_bl);
            if ($cmlist) {
                while ($result1 = $cmlist->fetch_assoc()) {
            ?>
            <form action="" method="post" enctype="multipart/form-data">
                <table class="form">
                    <tr>
                        <td>
                            <label>Tên khách hàng</label>
                        </td>
                        <td>
                            <label for=""><?php echo $result1['Tenkhachhang'] ?></label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Bình luận khách hàng</label>
                        </td>
                        <td>
                            <label for="" name="binhluansp"><?php echo $result1['binhluan'] ?></label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Bình luận admin</label>
                        </td>
                        <td>
                            <!-- <input type="text" name="adminbl" id="" cols="30" rows="10" class="medium" placeholder="Nhập slider..."> -->
                            <textarea name="adminbl" id="" cols="30" rows="10" class="medium"
                                placeholder="Nhập bình luận..."><?php echo $result1['binhluan_admin'] ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="update" value="Lưu">
                        </td>
                    </tr>

                </table>
            </form>
            <?php
                }
            }
            ?>
        </div>
    </div>
</div>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Bình luận</h2>
        <div class="block">
            <?php
            if (isset($delcomment)) {
                echo $delcomment;
            }
            ?>
            <table class="data display datatable" id="example">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Sản phẩm</th>
                        <th>Người bình luận</th>
                        <th>Bình luận</th>
                        <th>Bình luận admin</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $cmlist = $cs->show_comment_list();
                    if ($cmlist) {
                        $i = 0;
                        while ($result = $cmlist->fetch_assoc()) {
                            $i++;
                    ?>
                    <tr class="odd gradeX">
                        <td><?php echo $i ?></td>
                        <td><?php echo $result['productName'] ?></td>
                        <td><?php echo $result['Tenkhachhang'] ?></td>
                        <td><?php echo $result['binhluan'] ?></td>
                        <td><?php if ($result['binhluan_admin'] == "") { ?>
                            <a href="?binhluan=<?php echo $result['id_binhluan'] ?>">Chọn</a>
                            <?php
                                    } else { ?>
                            <a
                                href="?binhluan=<?php echo $result['id_binhluan'] ?>"><?php echo $result['binhluan_admin'] ?></a>
                            <?php
                                    } ?>
                        </td>
                        <td><button class="custom-btn btn-4" onclick="openNav()">Trả lời</button>|<button
                                class="custom-btn btn-5"
                                href="?binhluanid=<?php echo $result['id_binhluan'] ?>">Delete</button></td>
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
    document.getElementById("myNav").style.height = "50%";
}

function closeNav() {
    document.getElementById("myNav").style.width = "0%";
    document.getElementById("myNav").style.height = "0%";
}
</script>
<?php include 'inc/footer.html'; ?>