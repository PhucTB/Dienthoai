<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php
$brand = new brand();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $id = $_POST['adminId'];
    $adminPass = md5($_POST['adminPass']);
    $adminPass1 = md5($_POST['adminPass1']);
    $adminPass2 = md5($_POST['adminPass2']);
    $update = $brand->update_admin_pass($id, $adminPass, $adminPass1, $adminPass2);
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Change Password</h2>
        <div class="block">
            <?php
            if (isset($update)) {
                echo $update;
            }
            ?>
            <form action="" method="post">
                <table class="form">
                    <tr>
                        <td>
                            <label>Mật khẩu cũ</label>
                        </td>
                        <td>
                            <input type="hidden" placeholder="Enter Old Password..." name="adminId" class="medium"
                                value="<?php echo Session::get('adminId') ?>" />
                            <input type="password" placeholder="Enter Old Password..." name="adminPass"
                                class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Mật khẩu mới </label>
                        </td>
                        <td>
                            <input type="password" placeholder="Enter New Password..." name="adminPass1"
                                class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Nhập lại mật khẩu</label>
                        </td>
                        <td>
                            <input type="password" placeholder="Enter New Password..." name="adminPass2"
                                class="medium" />
                        </td>
                    </tr>

                    <tr>
                        <td>
                        </td>
                        <td>
                            <input type="submit" name="submit" Value="Update" />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
<?php include 'inc/footer.html'; ?>