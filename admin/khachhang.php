<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classes/khachhang.php' ?>
<?php
$khachhang = new Khachhang();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $delcat = $cat->del_category($id);
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2 style="height:30px;">Danh sách Khách hàng</h2>
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
                        <th>Họ và tên</th>
                        <th>Giới tính</th>
                        <th>Ngày sinh</th>
                        <th>Thành phố</th>
                        <th>Địa chỉ</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $show_khachhang = $khachhang->show_Khachhang();
                    if ($show_khachhang) {
                        $i = 0;
                        while ($result = $show_khachhang->fetch_assoc()) {
                            $i++;
                            $so = strtotime($result['Ngaysinh']);
                            $date = date("d-m-Y", $so);

                    ?>
                    <tr class="odd gradeX">
                        <td><?php echo $i; ?></td>
                        <td><?php echo $result['Tenkhachhang'] ?></td>
                        <td><?php if ($result['Gioitinh'] == 0) {
                                        echo 'Nam';
                                    } else {
                                        echo 'Nữ';
                                    } ?></td>
                        <td><?php echo $date ?></td>
                        <td><?php echo $result['Thanhpho'] ?></td>
                        <td><?php echo $result['Diachi'] ?></td>
                        <td><?php echo $result['DT'] ?></td>
                        <td><?php echo $result['email'] ?></td>
                        <td><button class="custom-btn btn-5" onclick="return confirm('Are you want to delete?')"
                                href="?id=<?php echo $result['customer_id'] ?>">Delete</button></td>
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
<?php include 'inc/footer.html'; ?>